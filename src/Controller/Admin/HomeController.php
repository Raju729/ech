<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use App\View\Helper\AdminHelper;

class HomeController extends AppController
{

    public function initialize()
    {
        $obj = new AdminHelper(new \Cake\View\View());
        $obj->isAdmin();
    }

    public function home()
    {
        $pres = $this->loadModel('Prescriptions');
        $prof = $this->loadModel('Profiles');
        $pat =  $this->loadModel('Patients');
        $user = $this->loadModel('Users');

        $query = $pres->find('all');
        $total_pres = $query->count();

        $query = $pat->find('all');
        $total_pat = $query->count();

        $query = $user->find('all')->where(['type'=>4]);
        $total_doc = $query->count();

        $query = $user->find('all')->where(['type'=>3]);
        $total_mem = $query->count();
        $data['pres']=$total_pres;
        $data['pat']=$total_pat;
        $data['doc']=$total_doc;
        $data['mem']=$total_mem;
        $this->set(compact('data'));



    }

    public function loginAction()
    {
    	$this->redirect("/login");
    }

    public function loginRedirect()
    {
    	$this->redirect("/admin/");
    }

    public function logoutRedirect()
    {
    	$this->redirect("/");
    }

    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('admin');
    }
}
