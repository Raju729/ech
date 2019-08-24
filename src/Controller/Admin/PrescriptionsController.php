<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\View\Helper\FormHelper;
use Cake\Utility\Security;
use App\View\Helper\AdminHelper;


/**
 * Doctors Controller
 *
 *
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrescriptionsController extends AppController
{
    public function initialize()
    {
        $obj = new AdminHelper(new \Cake\View\View());
        $obj->isAdmin();
    }

    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('admin');
    }





    public function prescription()
    {
        $session = $this->request->session();
        $user = $session->read('Auth.User');
        $uid = $user['uid'];


        $op =$this->request->getQuery('op');
        if(!empty($op)){
            switch ($op) {
                case "review":
                    $this->get_prescription(0);
                    $active =array('r'=>'active');
                    $this->set(compact('active'));
                    break;
                case "pending":
                    $this->get_prescription(1);
                    $active =array('p'=>'active');
                    $this->set(compact('active'));
                    break;

                case "complete":
                   $this->get_prescription(2);
                    $active =array('c'=>'active');
                    $this->set(compact('active'));
                    break;

                case "cancel":
                    $this->get_prescription(3);
                    $active =array('cn'=>'active');
                    $this->set(compact('active'));
                    break;

            }
        }
        else{
            $table = $this->Prescriptions;
            $query = $table->find('all',array('order'=>array('Prescriptions.pres_id DESC')));
            $pres = $this->paginate($query);
            $this->set(compact('pres'));
        }
    }
    public function get_prescription($status){
        $table = $this->Prescriptions;
        $query = $table->find('all',array('order'=>array('Prescriptions.pres_id DESC')))
            ->where(['Prescriptions.status =' => $status]);
        $pres = $this->paginate($query);
        $this->set(compact('pres'));
        return;
    }

    public function updateStatus(){
        $id =$this->request->getQuery('id');
        $data['status']=$this->request->getQuery('status');
        $pres_old = $this->Prescriptions->get(['id' => $id]);
        if ($this->request->is(['get'])) {
            $pres = $this->Prescriptions->patchEntity($pres_old,  $data);
            if(count($pres->getErrors())>0)
            {
                $e = $this->cakeErrorToString($pres->getErrors());
                return $this->getFlashJson('failed', "Some fields are missing.", $e);
            }
            if ($this->Prescriptions->save($pres)) {
                return $this->getFlashJson("success","The Status is successfully Updated.");

            }
            return $this->getFlashJson("failed","The Status could not be Update. Please, try again.");
        }

    }




    public function view($pres_id){

        if(!is_numeric($pres_id)){echo 'Invalid Prescription ID.';exit;}

        $session = $this->request->getSession();
        $user = $session->read('Auth.User');
        $uid = $user['uid'];
        $pres= $this->Prescriptions->find('all')->where(['pres_id'=>$pres_id,'or'=>['eid'=>$uid,'did'=>$uid]])->limit(1);
        if($pres->count()==0){echo 'You do not have permission to view the prescriptions.';exit;}
        $this->set(compact('pres'));

    }




}
