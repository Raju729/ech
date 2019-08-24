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
class DoctorsController extends AppController
{

    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('public');
    }

    public function ajax()
    {


        if(1)
        {

            $op = $this->request->getQuery('op');
            $id = $this->request->getQuery('id');
            switch ($op) {

                case "getData":
                    $json = $this->getPatientData($id);
                    break;


            }
        }
        else
        {
            $json = $this->getFlashJson("failed","Operation or ID are invalid.");
        }

        return $json;

    }


    public function getPatientData($id){

    }

  


 public function doctorList()
    {

        $sp = TableRegistry::get('specializations');
        $sp = $sp->find('all');
        $sp = $sp->all();
        $this->set(compact('sp'));

        $this->loadModel('Users');
        $table = $this->Users;

        $query = $table->find('all',
            array('order'=>array('Users.uid DESC')));

        $query = $query->select(['p.f_name','p.l_name','p.mobile','p.degree','p.doc_type','p.fee','p.address','p.nid','p.thumb_url','p.specialist','p.chamber','p.visittime','user_active','username','email','uid','password','created','login_token']);
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
        $query = $query->where(['user_active'=>1]);

        if ($this->request->is('GET')) {

            if (!empty($_GET['doc_src_name'])){
                $query = $query->where(['OR' => array(
                    'p.specialist LIKE' => "%" . $this->request->getQuery('doc_src_name'). "%",
                    'p.f_name LIKE' => "%" . $this->request->getQuery('doc_src_name'). "%",
                    'p.l_name LIKE' => "%" . $this->request->getQuery('doc_src_name'). "%",
                     'p.address LIKE' => "%" . $this->request->getQuery('doc_src_name'). "%"
                )]);
                if(!empty($_GET['doc_src_tp'])){
                    $query = $query->where(['p.doc_type LIKE' => "%" . $this->request->getQuery('doc_src_tp'). "%"]);
                }
                if(!empty($_GET['doc_src_status'])){
                    $query = $query->where(['p.doc_type LIKE' => "%" . $this->request->getQuery('doc_src_status'). "%"]);
                }

         
            }
               $doctors = $this->paginate($query);
            $this->set(compact('doctors'));
           

        }
      
            $doctors = $this->paginate($query);
            $this->set(compact('doctors'));
       





    }



    public function getadoctor($id=null){
        $session = $this->request->getSession();
            $user = $session->read('Auth.User');
        if(isset($user)){
             $this->checkpermission('getadoctor');

        $pay_method = TableRegistry::get('payment_methods');
        $pay_method = $pay_method->find('all')
            ->where('status='. '1')
            ->limit(2);
        $this->set(compact('pay_method'));

        $this->loadModel('Profiles');
        $doctor = $this->Profiles->get($id);
        $this->set('doctor', $doctor);
        }
        else{
            $this->setFlash('failed','Must be log in to get a Doctor');
            return $this->redirect(
            ['controller' => 'Authexs', 'action' => 'login']
        );
        }
           
       
//        $this -> render('A/index');

    }


//
//    public function view($id = null)
//    {
//        $doctor = $this->Doctors->get($id, [
//            'contain' => []
//        ]);
//
//        $this->set('doctor', $doctor);
//    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }


}
