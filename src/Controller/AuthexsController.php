<?php
namespace App\Controller;

use App\Controller\AppController;
   use Cake\ORM\TableRegistry;
   use Cake\Datasource\ConnectionManager;
   use Cake\Event\Event;
   use Cake\I18n\Time;
   use Cake\Auth\DefaultPasswordHasher;
   use Cake\View\Helper\HtmlHelper;
   use App\View\Helper\PublicHelper;

   class AuthexsController extends AppController{

      var $components = array('Auth');

       public function beforeRender(Event $event)
        {
            $this->viewBuilder()->setLayout('public');
        }

//       public function initialize()
//       {
//           parent::initialize();
//           $this->loadComponent('Csrf');
//       }

      public function index(){
         echo 'You are successfully logged in. Redirecting to dashboard......';
           return $this->redirect('/');
      }

      public function login(){



         $session = $this->request->getSession();

         if($this->request->is('ajax'))
         {
//
            $user = $this->Auth->identify();
            // echo 'raju';exit;

            if($user and $user['user_active']==1)
            {
               $this->Auth->setUser($user);
                $uid = $user['uid'];
                $cur_time = strtotime( date("m/d/Y h:i:s a", time() + 120));
                $token['exp_time']=$cur_time;
                $login_token = $this->encryptDecrypt(serialize($token),'e');
                $this->loadModel('Users');
                $table = $this->Users;
                $query = $table->query();
                $query->update()
                    ->set(['login_token' =>$login_token])
                    ->where(['uid' => $uid])
                    ->execute();
               $users = TableRegistry::get('profiles');
               $query = $users->find();
               $query->where(['uid'=>$uid]);
               $query->limit(1);                  
               foreach($query as $q)
               {
                   $info = $q;
               }

               $session->write(['Auth.Info' => $info]);
               if($user['type']==1){
                   return $this->getFlashJson("admin","Logged In.");
               }

               return $this->getFlashJson("success","Logged In.");
            }
            else if($user and $user['user_active']==0)
            {
               return $this->getFlashJson("failed","Account is Pending For Approval.");
            }
            else
            {
              return $this->getFlashJson("failed","UserName or Password Is Invalid.");
            }
         }
         else if($session->check('Auth.User'))
         {
            //User logged already and redirect
            return $this->redirect($this->Auth->redirectUrl());
         }
      }


      public function logout(){
         $this->request->getSession()->destroy('Auth.Info');
         return $this->redirect($this->Auth->logout());
      }





      public function beforeFilter(Event $event) {
          parent::beforeFilter($event);
          $this->Auth->allow();
       }
       public function register ($type=null){

           if ($this->request->is('post')) {
               $user_array =$this->request->getData();
               if($user_array['password']==$user_array['cpassword']) {
                   if (strlen($user_array['password'])>=6){
                       if ($user_array['type'] == 3) {

                           $user_array['nice_name'] = 'Doctor';
                           $permissions = array(
                               'access' => 'part',
                               'area' => array(
                                   'doctor_list' => false,
                                   'getadoctor' => false,
                                   'homepage' => true,
                                   'contact' => true,
                                   'patient_search' => false,
                                   'patient_register' => false,
                                   'pay_beforegetadoctor' => false,
                                   'pay_free' => false,
                                   'prescribe' => true,
                                   'prescriptions' => true,
                                   'save_prescription' => true,
                                   'profile_view' => true,
                                   'profile_info_edit' => true,
                                   'profile_pass_edit' => true,
                                   'dashboard' => 1,
                                   'withdraw' => true,
                                   'statements' => true,
                                   'activity' => true,
                                   'doc_transactions' => true,
                                   'save_transactions' => true,

                               )

                           );
                           $user_array['permissions'] = json_encode($permissions);
                           $user_array['specialist'] = implode(',',$user_array['specialist']);
                           $user_array['degree'] = implode(',',$user_array['degree']);
                           $user_array['media_accounts'] = json_encode($user_array['media_accounts']);
                           $hashPswdObj = new DefaultPasswordHasher;
                           $user_array['password'] = $hashPswdObj->hash($this->request->getData('password'));
//                   print_r($user_array);exit;

                       }
                       elseif ($user_array['type'] == 4) {
                           $user_array['nice_name'] = 'Member';
                           $permissions = array(
                               'access' => 'part',
                               'area' => array(
                                   'doctor_list' => true,
                                   'getadoctor' => true,
                                   'homepage' => true,
                                   'contact' => true,
                                   'patient_search' => true,
                                   'patient_register' => true,
                                   'pay_beforegetadoctor' => false,
                                   'pay_free' => false,
                                   'prescribe' => false,
                                   'prescriptions' =>false,
                                   'save_prescription' => false,
                                   'profile_view' => true,
                                   'profile_info_edit' => true,
                                   'profile_pass_edit' => true,
                                   'dashboard' => true,
                                   'withdraw' => true,
                                   'statements' => false,
                                   'activity' => true,
                                   'doc_transactions' => false,
                                   'save_transactions' => false,
                               )

                           );
                           $user_array['permissions'] = json_encode($permissions);
                           $hashPswdObj = new DefaultPasswordHasher;
                           $user_array['password'] = $hashPswdObj->hash($this->request->getData('password'));


                       }
                   }
                   else{
                       return $this->getFlashJson('failed','Password must be greater than 6 character .');
                   }

               }
               else{
                   return $this->getFlashJson('failed','password & confirm password must be same.');
               }
               try{
                   $this->loadModel('Users');
                   $users = $this->Users->newEntity();
                   $users  = $this->Users->patchEntity($users,  $user_array);

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
                      $user_array['uid'] = $uid;
//                       print_r($user_array);exit;
                       $profile  = $this->Profiles->patchEntity($profiles,$user_array);
                       if(count($profile->errors())>0)
                       {
                           $e = $this->cakeErrorToString($profile->errors());
                           return $this->getFlashJson('failed', "Some fields are missing.", $e);
                       }
                        if ($this->Profiles->save($profile))
                           {

                               return $this->getFlashJson('success','User is successfully Registered.');
                           }

                           else
                           {
                               return $this->getFlashJson('failed','Can Not Registered Right Now.');
                           }

                       

                   }

               }
               catch (\Exception $e){
                   return $this->getFlashJson('failed','Can Not catch Registered Right Now.');
               }
           }
           if(isset($_GET['type'])){
               if($_GET['type']=='doctor'){
                   $sp = TableRegistry::get('specializations');
                   $sp = $sp->find('all');
                   $sp = $sp->all();

                   $dt = TableRegistry::get('doctorstype');
                   $dt = $dt->find('all');
                   $dt = $dt->all();

                   $dg = TableRegistry::get('degree');
                   $dg = $dg->find('all');
                   $dg = $dg->all();
                   $this->set(compact('dg'));
                   $this->set(compact('sp'));
                   $this->set(compact('dt'));
                   $this->render('doctor_register');
                   return;
               }
               elseif ($_GET['type']=='member'){
                   $this->render('member_register');
                   return;
               }
               else{
                   echo 'exit';exit;
               }
           }



       }
   }
?>