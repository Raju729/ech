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


/**
 * Doctors Controller
 *
 *
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{

    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('public');
    }
   

    public function ajax(){
        $op = $this->request->getQuery('op'); 
        switch ($op)
        {
            case "count":
//                $session = $this->request->getSession();
//                $user = $session->read('Auth.User');
//                $rid = $user['uid']; //from session
                $rid=$this->request->getQuery('rid');
                $json = $this->getcount($rid);
                break;
            case "messages":
                $conv_id = $this->request->getQuery('conv_id'); 
                $json = $this->getmessages($conv_id);
                break;
            case "send":

                $json = $this->sendmesseges();
                break;
            case "refresh":
                $conv_id = $this->request->getQuery('conv_id');
                $json = $this->refresh($conv_id);
                break;
        }

        return $json;
    }


    public function sendmesseges(){



        if ($this->request->is('POST')) {
            $session = $this->request->getSession();
            $user = $session->read('Auth.User');
            $info = $session->read('Auth.Info');
            $photo =$info->thumb_url;
            $did = $this->request->getData('did');
            $pid = $this->request->getData('pid');
            $p_name = $this->request->getData('p_name');
            $d_name = $this->request->getData('d_name');
//            $conv_id = $this->request->getData('conv_id');
//            $m_body = $this->request->getData('m_body');
            $this->loadModel('Messages');
            $msg = $this->Messages->newEntity();
            $user_array=$this->request->getData();
            if($user['type']==3){
                $user_array['sid']=$did;
                $user_array['rid']=$pid;
                $user_array['s_name']=$d_name;
                $user_array['r_name']=$p_name;
            }
            else{
                $user_array['sid']=$pid;
                $user_array['rid']=$did;
                $user_array['s_name']=$p_name;
                $user_array['r_name']=$d_name;
            }
            $user_array['thumb_url']=$photo;
            try{
                $table = $this->Messages;
                $query = $table->query();
                $query->update()
                    ->set(['thumb_url' =>$photo])
                    ->where(['sid' =>$user_array['sid']])
                    ->execute();
            }
            catch (\Exception $e){
                return $this->getFlashJson('failed', "all fields photo update problem.", $e);
            }

        //print_r($user_array);exit;

            $msg = $this->Messages->patchEntity($msg, $user_array);
            if(count($msg->getErrors())>0)
            {
                $e = $this->cakeErrorToString($msg->getErrors());
                return $this->getFlashJson('failed', "Some fields are missing.", $e);
            }
            if ($info = $this->Messages->save($msg)) {

                return $this->getDataJson("success",$info);

            }
            return $this->getFlashJson("failed"," Please, try again.");
        }
    }

    public function showconv()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth.User');
        $id = $user['uid'];
        $table = $this->Messages;
        $message= $table->find("all")->group('conv_id')->having(['status'=>0,'rid'=>$id])->order(['m_id'=>'DESC']);
//       foreach ($message as $m){
//           print_r($m);
//       }exit;
        $this->set(compact('message'));
    }

    public function getcount($rid)
    {
        //renew login token
        $session = $this->request->getSession();
        $user = $session->read("Auth.User");
        if($user['type']==3){
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
        }

        //renew login token
        $table = $this->Messages;
        try
        {
            $query = $table->find("all")->where(['rid'=>$rid,'status'=>0])->count();             
            return $this->getDataJson("success", $query);
        }
        catch(\Exception $e)
        {
            return $this->getFlashJson("failed", "Can not count right now.");
        }        
    }

    public function getmessages($conv_id)
    {
        $session = $this->request->getSession();
        $user = $session->read("Auth.User");
        $uid = $user['uid'];
        $conv_id =$conv_id;
        $this->status_update($conv_id);
        $this->loadModel("Prescriptions");
        $table = $this->Prescriptions;
        $query = $table->find("all",array('order'=>array('created DESC')))->where(['pres_id'=>$conv_id,'or'=>['eid'=>$uid,'did'=>$uid]]);
        $count = $query->count();


        if($count>0)
        {
            $table = $this->Messages;
            $query = $table->find("all")->where(['conv_id'=>$conv_id]);
            $json = $this->getDataJson('success',$query);
            return $json;        
        }
        else
        {
            echo 'You do not have permission to access.';
        }

        
        exit;
    }
    public function status_update($conv_id=""){
        $session = $this->request->getSession();
        $user = $session->read("Auth.User");
        $uid = $user['uid'];
        $this->loadModel("Messages");
        $table = $this->Messages;
        $query = $table->query();
        $query->update()
            ->set(['status' => 1])
            ->where(['conv_id' => $conv_id,'rid'=>$uid])
            ->execute();

    }
    public function refresh($conv_id){
        $session = $this->request->getSession();
        $user = $session->read("Auth.User");
        $uid = $user['uid'];
        $table = $this->Messages;
        $querys = $table->find("all")->where(['conv_id'=>$conv_id,'status'=>0,'rid'=>$uid]);
        $json = $this->getDataJson('success',$querys);
        $conv_id =$conv_id;
        $this->status_update($conv_id);
        return $json;
    }


    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }


}
