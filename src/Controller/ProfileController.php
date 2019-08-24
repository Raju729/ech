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
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;
use Cake\Utility\Hash;
use Cake\Controller\Component\AuthComponent;

class ProfileController extends AppController
{
    
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('public');
    }

    public function dashboard(){
        
        $session = $this->request->session();
        $user = $session->read('Auth.User');
        $uid = $user['uid'];


        $balance = $this->get_balance($uid);


        $this->loadModel('Statements');
        $query = $this->Statements->find();
        $sum = $query->select(['wd_sum' => $query->func()->sum('amount')])
            ->where(['Statements.uid' =>$uid,'Statements.status'=>'Withdraw'])
            ->first();

        $wd_balance =$sum->wd_sum;
        $income = $wd_balance+$balance;


        $this->loadModel('Prescriptions');
        $table = $this->Prescriptions;
        $query = $table->find('all')->where(['did'=>$uid]);
        $total_pres = $query->count();

        $query = $table->find('all')->where(['did'=>$uid,'status'=>0]);
        $pending_pres = $query->count();

        $query = $table->find('all')->where(['did'=>$uid,'status'=>1]);
        $complete_pres = $query->count();

        $recent_pres = $table->find('all',['order'=>'pres_id DESC'])->where(['did'=>$uid])->orWhere(['eid'=>$uid])->limit(5);



        
        $this->loadModel('Transactions');
        $table = $this->Transactions;
        $recent_trans = $table->find('all',['order'=>'id DESC'])->where(['created_for'=>$uid])->orWhere(['created_by'=>$uid])->limit(5);

 /*       $get_bal = $this->Statements->find('all', array('order'=>array('Statements.id DESC')))
              ->select(['cur_bal'])
             ->where(['Statements.uid' =>$uid])
             ->limit(1);
        foreach ($get_bal as $i){
            $get_bal=$i->cur_bal;
        }
*/
        $data = array(
            'balance'=>$balance,
            'income'=>$income,
            'withdraw'=>$wd_balance,
            'total_pres'=>$total_pres,
            'pending_pres'=>$pending_pres,
            'complete_pres'=>$complete_pres,
            'recent_pres'=>$recent_pres,
            'recent_trans'=>$recent_trans
        );
        
        $this->set(compact('data'));
    }

    public function profile(){
        $session = $this->request->getSession();
        $user = $session->read('Auth.User');
        $uid =$user['uid'];
        $profile=$this->loadModel('Profiles');
        $profile = $profile->get($uid);
        $user=$this->loadModel('Users');
        $user = $user->get($uid);
        $this->set(compact('user'));
        $this->set(compact('profile'));


    }
    public function update(){
        try{
            if ($this->request->is('post')) {
                $this->loadModel('Profiles');
                $id = $this->request->getData('uid');
                $old_profile =$this->Profiles->get(['uid' => $id]);
                $old_img = $old_profile->thumb_url;
                $update_array =$this->request->getData();
                if(empty($update_array['thumb_url'])){
                    $update_array['thumb_url']=$old_img;
                }
                $up_profile = $this->Profiles->patchEntity($old_profile, $update_array);
                if ($this->Profiles->save($up_profile)) {
                    return $this->getFlashJson('success','Your Profile is successfully Updated.');
                }
                return $this->getFlashJson('failed','Can Not Update Right Now.');

            }
        }
        catch (\Exception $e){
            return $this->getFlashJson('success','Something is missing.');
        }

    }
    public function resetpassword(){
        if ($this->request->is('post')) {
            $hashPswdObj = new DefaultPasswordHasher;
             $this->loadModel('Users');
             $id = $this->request->getData('puid');
             $olddata =$this->Users->get(['uid' => $id]);
             $oldhash_pass=$olddata->password;
             $string_pass =$this->request->getData('old_pass');
             $data_array = $this->request->getData();
             $hasher  = new DefaultPasswordHasher;
            if($hasher->check($string_pass,$oldhash_pass)){
                if($data_array['password']!=$data_array['confirm_pass']){
                    return $this->getFlashJson('failed','Password doesn`t match.');
                }
                $hashnewpassword = $hashPswdObj->hash($this->request->getData('password'));
                $olddata->password = $hashnewpassword;
                if ($this->Users->save($olddata)) {
                    return $this->getFlashJson('success','Password is successfully Updated.');

                }
                else
                    return $this->getFlashJson('failed','Can not update right now.');
            }

            else
                return $this->getFlashJson('failed','Can not match  old password.');



        }
    }

   

    public function beforeFilter(Event $event) {
          parent::beforeFilter($event);
          $this->Auth->allow();
       }


}
