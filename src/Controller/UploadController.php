<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;

class UploadController extends  AppController
{
    public function save()
    { 
        if ($this->request->is('ajax')) 
        { 

            $tmparray = $_FILES['file'];  
            $tmpname = $tmparray['name'];
            if(!empty($tmpname))
            {
                $ext = substr(strtolower(strrchr($tmpname, '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif','png');
                if(in_array($ext, $arr_ext))
                {    $tmpid = uniqid();
                     $tmpname = $tmpid.'.'.$ext;
                    move_uploaded_file($tmparray['tmp_name'], WWW_ROOT . 'img/uploads/' . $tmpname);
                    $thumb_url = 'uploads/' . $tmpname;                    

                    if($this->request->getQuery('saveid'))
                    {
                        //For single profile image upload part                    
                        if($this->saveUserThumb($this->request->getQuery('saveid'),$thumb_url))
                            $json = $this->getJson(array('status'=>'success','name'=>$tmpname,'response'=>$thumb_url));
                        else
                            $json = $this->getJson(array('status'=>'failed','name'=>$tmpname,'response'=>'Image can not be saved now.'));
                    }
                    else
                    {
                        $json = $this->getJson(array('status'=>'success','name'=>$tmpname,'response'=>$thumb_url));
                    }
                    
                }
                else
                {
                      $json = $this->getJson(array('status'=>'failed','response'=>'Invalid file mormat'));
                }
            }
            else
            {
                  $json = $this->getJson(array('status'=>"failed","response"=>'No file is sleected'));
            }
        }
        else
        {
           $json = $this->getJson(array('status'=>'failed','response'=>'Invalid request.'));
        }
        
        return $json;

    }
    public function saveUserThumb($id,$thumb_url)
    {
        $this->loadModel('Profiles');

        try{
            $user = $this->Profiles->get(['uid'=>$id]);
            $user->thumb_url = $thumb_url;
            $this->Profiles->save($user);
            return true;
        }
        catch(\Exception $e){

            return false;
        }

    }
    public function test()
    {
        echo 'saif';


        exit;
    }

    public function getJson($data=array())
    {
        $resultJ = json_encode($data);
        $this->response->type('json');
        $this->response->body($resultJ);
        return $this->response;
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }
}

?>