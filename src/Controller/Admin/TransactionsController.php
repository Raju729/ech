<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Auth;
use Cake\Core\InstanceConfigTrait;
use Cake\Utility\Security;
use App\View\Helper\AdminHelper;

/**
 * Transactions Controller
 *
 *
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
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

    public function ajax(){
        $op = $this->request->getQuery('op');
        $id = $this->request->getQuery('id');
        switch ($op){
            case 'updatetrx':
                $json = $this->updatestatus();
                break;
        }
        return $json;
    }

    public function updatestatus()
    {

        $id =$this->request->getData('id');
        $status =$this->request->getData('status');
        $comment =$this->request->getData('comments');
        $session = $this->request->session();
        $user = $session->read('Auth.User');

        $trx_old = $this->Transactions->get(['id' => $id]);
        $trx_array['trx_status']=$status ;
        $trx_array['modified_by']=$user['uid'];
        $trx_array['comments']=$comment;

//        $user_array['uid']='1001';
        if ($this->request->is(['get', 'post', 'put'])) {
            $trx = $this->Transactions->patchEntity($trx_old,  $trx_array);
            if(count($trx->getErrors())>0)
            {
                $e = $this->cakeErrorToString($trx->getErrors());
                return $this->getFlashJson('failed', "Some fields are missing.", $e);
            }
            if ($this->Transactions->save($trx)) {
                return $this->getFlashJson("success","The Status is successfully Updated.");

            }
            return $this->getFlashJson("failed","The Status could not be Update. Please, try again.");
        }

    }

    public function alltrx(){
            $trx = $this->loadModel('Transactions');
            $alltrx = $trx->find('all', array('order'=>array('Transactions.id DESC')));
            $alltrx = $this->paginate($alltrx);
            $this->set(compact('alltrx'));
    //        foreach ($alltrx as $u){
    //
    //            print_r($u);
    //        } exit;
    }
    public function refund(){

    }






}
