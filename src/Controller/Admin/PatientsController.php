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
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 *
 * @method \App\Model\Entity\Patient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PatientsController extends AppController
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
    public function patients()
    {
        $patients = $this->paginate($this->Patients);

        $this->set(compact('patients'));
    }

    /**
     * View method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $patient = $this->Patients->get($id, [
            'contain' => []
        ]);

        $this->set('patient', $patient);
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
    public function add()
    {
        $session = $this->request->session();
        $info = $session->read('Auth.Info');
        $user = $session->read('Auth.User');
        if ($this->request->is('post')) {

            $patient = $this->Patients->newEntity();
            $user_array=$this->request->getData();
            $user_array['uid']=$info->uid;


            $patient = $this->Patients->patchEntity($patient, $user_array);
            if(count($patient->getErrors())>0)
            {
                $e = $this->cakeErrorToString($patient->getErrors());
                return $this->getFlashJson('failed', "Some fields are missing.", $e);
            }
            if ($this->Patients->save($patient)) {

                return $this->getFlashJson("success","The Patient is successfully Saved.");

            }
            return $this->getFlashJson("failed","The patient could not be saved. Please, try again.");
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function ajaxupdate($id )
    {



        $patient = $this->Patients->get(['pid' => $id]);
        $user_array=$this->request->getQuery();
//        $user_array['uid']='1001';
        if ($this->request->is(['get', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient,  $user_array);
            if(count($patient->getErrors())>0)
            {
                $e = $this->cakeErrorToString($patient->getErrors());
                return $this->getFlashJson('failed', "Some fields are missing.", $e);
            }
            if ($this->Patients->save($patient)) {
                return $this->getFlashJson("success","The Patient is successfully Updated.");

                return $this->redirect(['action' => 'index']);
            }
            return $this->getFlashJson("failed","The patient could not be saved. Please, try again.");
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ajaxdelete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $patient = $this->Patients->get(['pid' => $id]);
        if ($this->Patients->delete($patient)) {
            return $this->getFlashJson("success","Record is successfully deleted.");
        } else {
            return $this->getFlashJson("failed","Can not delete this record.");
        }

        return $this->redirect(['action' => 'index']);
    }
}
