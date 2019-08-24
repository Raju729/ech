<?php
namespace App\Controller;

use App\Controller\AppController;
use Aura\Intl\Exception;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\View\Helper\FormHelper;
use Cake\Utility\Security;


class PatientsController extends AppController
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

            switch ($op) {

                case "getpatient":
                    $json = $this->getPatient();
                    break;

                case "register":
                    $json = $this->register();
                    break;
            }
        }
        else
        {
            $json = $this->getFlashJson("failed","Operation or ID are invalid.");
        }

       return $json;

    }

    public function getPatient()
    {
        $this->checkpermission('patient_search');
        $id = $this->request->getQuery('id');
        try
        {
            
            $patient = $this->Patients->get(['pid' => $id]);
            return $this->getDataJson("success", $patient);
        }
        catch(\Exception $e)
        {
            return $this->getFlashJson("failed", "Can not find the Patient.");
        }        
    }


    public function register(){
        $this->checkpermission('patient_register');
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

            try
            {
                $patient = $this->Patients->save($patient);
                $pid=$patient->pid;
                return $this->getDataJson('success',$pid);

            }
            catch (\Exception $e){
                return $this->getFlashJson('failed', "The patient could not be saved.",$e->getMessage());
            }

        }
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

}
