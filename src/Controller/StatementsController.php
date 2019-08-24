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


class StatementsController extends AppController
{
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('public');
    }

    public function statements()
    {
        $session = $this->request->session();
        $user = $session->read('Auth.User');
        $uid = $user['uid'];
        $table = $this->Statements;
        $query = $table->find('all',array('order'=>array('Statements.id DESC')))
            ->where(['uid'=>$uid]);
        $states = $this->paginate($query);
        $this->set(compact('states'));

    }


    public function view($id = null)
    {
        $statement = $this->Statements->get($id, [
            'contain' => ['Trs']
        ]);

        $this->set('statement', $statement);
    }




}
