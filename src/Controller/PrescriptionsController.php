<?php



namespace App\Controller;



use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\View\Helper\FormHelper;
use Cake\Utility\Security;
use App\View\Helper\PublicHelper;
use Dompdf\Dompdf;





/**

 * Doctors Controller

 *

 *

 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])

 */

class PrescriptionsController extends AppController

{



//    public function beforeRender(Event $event)
//
//    {
//        $this->viewBuilder()->setLayout('public');
//    }



    public function ajax()

    {





        if(1)

        {





            $op = $this->request->getQuery('op');

            $id = $this->request->getQuery('id');

            switch ($op) {



                case "save_prescription":

                    $json = $this->save_prescription($id);

                    break;

                     case "src_medicine":
                    $json = $this->search_medicine();
                    break;
                     case "src_test":
                    $json = $this->search_test();
                    break;





            }

        }

        else

        {

            $json = $this->getFlashJson("failed","Operation or ID are invalid.");

        }



        return $json;



    }

    public function search_test(){
          if ($this->request->is(['get'])) {
            $data = $this->request->getQuery('data');
            if(!empty($data)){
                $testtable = TableRegistry::get('test');
                $testtable = $testtable->find('all')
                    ->where("name LIKE '" . $data. "%'");
                return $this->getDataJson('success',$testtable);
            }
            else{
                return $this->getFlashJson("failed","Type Medicine Name.");
            }



        }

    }

      public function search_medicine(){
        if ($this->request->is(['get'])) {
            $data = $this->request->getQuery('data');
            if(!empty($data)){
                $meditable = TableRegistry::get('medicine');
                $meditable = $meditable->find('all')
                    ->where(
                        ['AND' => array(
                            'name LIKE' =>  $this->request->getQuery('data'). "%",
                            'type LIKE' => $this->request->getQuery('type') . "%"
                        )]);
                return $this->getDataJson('success',$meditable);
            }
            else{
                return $this->getFlashJson("failed","Type Medicine Name.");
            }



        }

    }



    public function save_prescription ($id){
        $this->viewBuilder()->setLayout('public');
        $viewid =$id;
        if ($this->request->is(['get', 'post', 'put'])) {

            $prescrip = $this->Prescriptions->get(['pres_id' => $id]);

            if($prescrip->status == 1){

                $pres_array=$this->request->getQuery();

                $pres_array['pres_info'] = json_encode($pres_array);

                $pres_array['status']= 2;

                $prescrip = $this->Prescriptions->patchEntity($prescrip,  $pres_array);

                if(count($prescrip->getErrors())>0)

                {

                    $e = $this->cakeErrorToString($prescrip->getErrors());
                    return $this->getFlashJson('failed', "Some Required fields are missing.", $e);

                }

                if ($this->Prescriptions->save($prescrip)) {

                    $this->loadModel('Transactions');

                    $table = $this->Transactions;

                    $query = $table->find('all')->where(['reff_id'=>$id]);

                    foreach ($query as $q){

                      $amount= $q->amount;

                       $trx_id=$q->id;

                    }



                    $session = $this->request->session();

                    $user = $session->read('Auth.User');

                    $uid = $user['uid'];



                    $this->loadModel('Statements');

                    $table = $this->Statements;



                    $last_cur_bal = $table->find('all',['order'=>'created DESC'])->where(['uid'=>$uid])->limit(1);

                     $count=$last_cur_bal->count();

                    if($count > 0){

                        foreach ($last_cur_bal as $b){

                            $last= $b->cur_bal;

                        }

                    }

                    else{

                        $last= 0;

                    }

                    $cur=  $last+$amount;

                    $stat_array['uid']=$uid;

                    $stat_array['tr_id']=$trx_id;

                    $stat_array['type']='Cr.';

                    $stat_array['amount']=$amount;

                    $stat_array['status']='Receive';

                    $stat_array['last_bal']=$last;

                    $stat_array['cur_bal']=$cur;

                    $new_stat = $table ->newEntity();

                    $stat = $table->patchEntity($new_stat,  $stat_array);

                    if(count($stat->getErrors())>0)

                    {

                        $e = $this->cakeErrorToString($stat->getErrors());

                        return $this->getFlashJson('failed', "Some Required fields are missing.", $e);

                    }

                    if ($table->save($stat)) {

                         return $this->getDataJson("success",$viewid);
                         

                    }



                    //return $this->redirect(['action' => 'index']);

                }

                return $this->getFlashJson("failed","The patient could not be Prescribed. Please, try again.");

            }

            else{

                return $this->getFlashJson("failed","The Patient is already Prescribed.");

            }





        }



    }



    public function prescriptionList()

    {
        $this->viewBuilder()->setLayout('public');
        $session = $this->request->session();
        $user = $session->read('Auth.User');
        $uid = $user['uid'];
        $op =$this->request->getQuery('op');
        if(!empty($op)){
            switch ($op) {
                case "pending":
                    $table = $this->Prescriptions;
                    $query = $table->find('all',array('order'=>array('Prescriptions.pres_id DESC')))
                                          ->where(['Prescriptions.status =' => 1,'did'=>$uid])->orWhere(['Prescriptions.status =' => 2,'eid'=>$uid]);
                    $pres = $this->paginate($query);
                    $this->set('title','PENDING');
                    $this->set(compact('pres'));
                    break;

                case "complete":

                    $table = $this->Prescriptions;

                    $query = $table->find('all',array('order'=>array('Prescriptions.pres_id DESC')))

                        ->where(['Prescriptions.status =' => 2,'did'=>$uid])->orWhere(['Prescriptions.status =' => 2,'eid'=>$uid]);

                    $pres = $this->paginate($query);

                    $this->set('title','COMPLETE');

                    $this->set(compact('pres'));

                    break;



                case "cancel":

                    $table = $this->Prescriptions;

                    $query = $table->find('all',array('order'=>array('Prescriptions.pres_id DESC')))

                        ->where(['Prescriptions.status =' => 3,'did'=>$uid])->orWhere(['Prescriptions.status =' => 3,'eid'=>$uid]);
                    $pres = $this->paginate($query);
                    $this->set('title','CANCEL');
                    $this->set(compact('pres'));
                    break;

            }
        }
        else{

            $table = $this->Prescriptions;

            $query = $table->find('all',array('order'=>array('Prescriptions.pres_id DESC')))

                           ->where(['did'=>$uid])->orWhere(['eid'=>$uid]);







            $pres = $this->paginate($query);

            $this->set('title','ALL');

            $this->set(compact('pres'));

        }







    }





    public function prescribe($pres_id)

    {
        $this->viewBuilder()->setLayout('public');

        $this->viewBuilder()->setLayout('public');

        $obj = new PublicHelper(new \Cake\View\View());

        $obj->isDoctor();

        $session = $this->request->session();

        $user = $session->read('Auth.User');

        $uid = $user['uid'];

        $test = TableRegistry::get('test');
        $test = $test->find('all');
        $test = $test->all();
        $this->set(compact('test'));

//        $medi = TableRegistry::get('medicine');
//        $medi = $medi->find('all');
//        $medis = $medi->all();
//
//        $this->set(compact('medis'));

        $medis = TableRegistry::get('medicine');
         $medis=$medis->find('all',  array(
                         'fields'=>array('type'),
                         'group'=> 'type')
                         );

         $this->set(compact('medis'));



        $table = $this->Prescriptions;

        $query = $table->find('all',array('order'=>array('Prescriptions.pres_id DESC')));

        $query = $query->where(['pres_id'=>$pres_id,'did'=>$uid]);

        $this->set(compact('query'));

        foreach ($query as $q){

            $status = $q->status;

        }

        if($status == 2){

            echo 'Already Prescribed';exit;



        }

        elseif ($status == 0){

            echo 'Prescription in review';exit;

        }

        if( ($count = $query->count())==0)

            $this->redirect('/');







        if($this->request->is('post'))

        {

            $e=array();

            if($this->request->data('diseases')===null)

            {

                $e[]="Patient diseases field is empty.";

            }

            if($this->request->data('medicines')===null)

            {

                $e[]="Rx field is empty.";

            }

            $pres_info = json_encode($this->request->data(),true);



            $pres= $this->Prescriptions->get(['pres_id' => $pres_id]);

            if($pres->status == 1)

            {

                $pres->pres_info = $pres_info;

                $pres->status = 2;



                if($this->Prescriptions->save($pres))

                {

                    $this->setFlash("success","Successfully prescribed");

                    $this->redirect("/");

                }

                else

                {

                    $this->setFlash("failed","Can not prescribed right now.");

                }

            }

            else

            {

                $this->setFlash("failed","This patient is already prescribed.");

            }

        }

    }



    public function view($pres_id){
        $this->viewBuilder()->setLayout('pdf');
        if(!is_numeric($pres_id)){echo 'Invalid Prescription ID.';exit;}
        $session = $this->request->getSession();

        $user = $session->read('Auth.User');

        $uid = $user['uid'];

        $pres= $this->Prescriptions->find('all')->where(['pres_id'=>$pres_id,'or'=>['eid'=>$uid,'did'=>$uid]])->limit(1);

        if($pres->count()==0){echo 'You do not have permission to view the prescriptions.';exit;}

        $this->set(compact('pres'));



    }
    public  function pdf($id=null){
        $this->viewBuilder()->setLayout('pdf');
        $session = $this->request->getSession();
        $user = $session->read('Auth.User');
        $uid = $user['uid'];
        $data = $this->Prescriptions->find('all')->where(['pres_id'=>$id,'or'=>['eid'=>$uid,'did'=>$uid]])->limit(1);
         $builder = $this->viewBuilder();
//        $builder->enableAutoLayout(false);
        $builder->Template('/Prescriptions/pdf');
        $view = $builder->build(['pres' => $data]);
        $viewContent = $view->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($viewContent);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream();

    }









}

