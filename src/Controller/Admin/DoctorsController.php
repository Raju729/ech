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
class DoctorsController extends AppController
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
public  function getAdoctor(){

}



    public function doctors()
    {
        $this->loadModel('Users');
        $table = $this->Users;

        $query = $table->find('all', 
           array('order'=>array('Users.uid DESC')));

        $query = $query->select(['p.f_name','p.l_name','p.mobile','p.address','p.degree','p.nid','p.thumb_url','p.specialist','p.chamber','p.visittime','user_active','username','email','uid','password','created']);
        $query->join([
            'p'=>[
                'table'=>'profiles',
                'type'=>'LEFT',
                'conditions'=>[
                    'p.uid' => new \Cake\Database\Expression\IdentifierExpression('Users.uid')
                ]
            ]
        ]);

        $query = $query->where(['type'=>3]);

           if ($this->request->is('GET')) {

            if (!empty($_GET['doc_src_name'])){
                $query = $query->where(['OR' => array(
                    'p.f_name LIKE' => "%" . $this->request->getQuery('doc_src_name'). "%",
                    'p.l_name LIKE' => "%" . $this->request->getQuery('doc_src_name'). "%"
                )]);
                
            $doctors = $this->paginate($query);
            $this->set(compact('doctors'));
            }
           

        }
        
            $doctors = $this->paginate($query);
            $this->set(compact('doctors')); 
        
        
       
    }

     public function ajax()
    {


        if(1)
        {

            $op = $this->request->getQuery('op');
            $id = $this->request->getQuery('id');
            switch ($op) {

                  case "add":

                    $json = $this->add();
                    break;

                case "update":
                    $json = $this->ajaxupdate($id);
                    break;

                case "delete":
                    $json = $this->ajaxDelete($id);
                    break;
            }
        }
        else
        {
           $json = $this->getFlashJson("failed","Operation or ID are invalid.");
        }

        return $json;

    }

    public function dctr_search(){

    }
 

   
    public function add()
    { 

        if ($this->request->is('post')) 

        {   
            

            $this->loadModel('Users');
            $users = $this->Users->newEntity();
            $users_array = $this->request->getData();
            $sp=json_encode($users_array['specialist']);

             $sp = implode(',',$users_array['specialist']);
            // echo $sp;exit;
            // echo "<pre>";
            // print_r($users_array);

            // echo "</pre>";exit;
            $users_array['specialist']=$sp;
            $users_array['user_active'] = 1;
            $users_array['permissions'] = 1;
            $users_array['type'] = 3;
            $users_array['nice_name'] = "Doctor";
            $password = $users_array['password'];
            $key = 'abcdefghijklmnopqrstuvwxyzabcdehghijklmnopqrstuvwxyz';
           $password= Security::encrypt($password, $key, $hmacSalt = null);
           $users_array['password']=$password;
           // $password= Security::decrypt($password, $key, $hmacSalt = null);
           
            $users  = $this->Users->patchEntity($users,  $users_array); 

            if(count($users->errors())>0)
            {
                $e = $this->cakeErrorToString($users->errors());
                return $this->getFlashJson('failed', "Some fields are missing.", $e);
            }


            if ($this->Users->save($users)) 
            {
                $this->loadModel('Profiles');
                $profiles = $this->Profiles->newEntity();
                $uid=$users->uid;
                $users_array['uid'] = $uid;
                
                $profile  = $this->Profiles->patchEntity($profiles,  $users_array); 

                if ($this->Profiles->save($profile)) 
                {

                     return $this->getFlashJson('success','Doctor is successfully saved.');
                    
                    
                }

                else
                {
                    return $this->getFlashJson('failed','Can Not Saved Right Now.');
                }
            }

        }
        else{


            $sp = TableRegistry::get('specializations');
        $sp = $sp->find('all');
        $sp = $sp->all();

        $dt = TableRegistry::get('doctorstype');
        $dt = $dt->find('all');
        $dt = $dt->all();
       $this->set(compact('sp'));
       $this->set(compact('dt'));
        }
    }

       public function view($id = null)
            {
                $doctor = $this->Doctors->get($id, [
                    'contain' => []
                ]);

                $this->set('doctor', $doctor);
            }

    /**
     * Edit method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function ajaxupdate($id )
    {

        if($this->request->is('get')){

            $this->loadModel('Users');
            $user= $this->Users->get(['uid' => $id]);
            $password=$this->request->getQuery('password');
            if(!empty( $password)){
                $key = 'abcdefghijklmnopqrstuvwxyzabcdehghijklmnopqrstuvwxyz';
                $password= Security::encrypt($password, $key, $hmacSalt = null);

                $user->username = $this->request->getQuery('username');
                $user->email = $this->request->getQuery('email');
                $user->password = $password;
            }
            $user->username = $this->request->getQuery('username');
            $user->email = $this->request->getQuery('email');
            $user->user_active= $this->request->getQuery('user_active');

            if($this->Users->save($user)){


                $this->loadModel('Profiles');

                $users = $this->Profiles->get(['uid' => $id]);
                $users->f_name = $this->request->getQuery('f_name');
                $users->l_name = $this->request->getQuery('l_name');
                $users->mobile = $this->request->getQuery('mobile');
                $users->degree = $this->request->getQuery('degree');
                $users->chamber = $this->request->getQuery('chamber');
                $users->visittime= $this->request->getQuery('visittime');
                $users->thumb_url= $this->request->getQuery('thumb_url');


                // if($thumb_url!=""){$user->thumb_url = $thumb_url;}

                if ($this->Profiles->save($users)) {
                    return $this->getFlashJson('success','Doctor is successfully Updated.');

                }

            }



            return $this->getFlashJson('failed','Can Not Updated Right Now.');
        }







//        if ($this->request->is(['patch', 'post', 'put'])) {
//            $user = $this->Profiles->patchEntity($user, $this->request->getData());
//            if ($this->Profiles->save($user)) {
//                $this->Flash->success(__('The user has been saved.'));
//
//                return $this->redirect(['action' => 'users']);
//            }
//            $this->Flash->error(__('The user could not be saved. Please, try again.'));
//        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    private function ajaxdelete($id )
    {
          $this->loadModel('Profiles');
        $this->loadModel('Users');
        $this->request->allowMethod(['get', 'delete']);
        $s1=0;$s2=0;
        $tmp_profile = null;
        try
        {
            $tmp_profile = $profile = $this->Profiles->get(['uid' => $id]);
            $user = $this->Users->get(['uid' => $id]);
            $s1 = $this->Profiles->delete($profile);            
            $s2 = $this->Users->delete($user);

            return $this->getFlashJson("success","Record is successfully deleted.");
        }
        catch (\Exception $e)
        {
            if($s2!=1 and $s1==1)
            {
                $restore_profile = $this->Profiles->newEntity();
                $restore_profile = $this->Profiles->patchEntity($restore_profile,  json_decode(json_encode($tmp_profile), true));
                $this->Profiles->save($restore_profile);
            }
            return $this->getFlashJson("failed","Can not delete this record.");
        }
    }
}
