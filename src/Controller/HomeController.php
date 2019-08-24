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

//use App\View\Helper\PublicHelper;

class HomeController extends AppController
{
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('public');
    }


    public function  home(){
        //$ph = new PublicHelper(new \Cake\View\View());
        //$ph->test();
        //exit; 

//        $exp_time = strtotime( date("m/d/Y h:i:s a", time() + 120));
//        $token = array('exp_time' => $exp_time);
//        $login_token = $this->encryptDecrypt(serialize($token),'e');
//        print_r($login_token);

    }



    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

}
