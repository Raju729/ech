<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Mailer\Email;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('public');
    }
    public function about(){

    }
    public function gallery(){

    }

    public function contact(){

        if ($this->request->is('post')) {
            $this->loadModel('Contacts');
            $contact = $this->Contacts->newEntity();
            $contact_array=$this->request->getData();
//            print_r($contact_array);exit;
//            echo 'raju';exit;
            //for sending mail
            try{
                $email = new Email('default');
                $email->setFrom([$contact_array['email'] =>'user email' ])
                    ->setTo('rajud6140@gmail.com')
                    ->setSubject($contact_array['subject'])
                    ->setSender($contact_array['email']);
            }
            catch (\Exception $e){
                return $this->getFlashJson('failed', "The message could not be sent to mail.",$e->getMessage());
            }
            //sending mail



            $contact = $this->Contacts->patchEntity($contact, $contact_array);
            if(count($contact->getErrors())>0)
            {
                $e = $this->cakeErrorToString($contact->getErrors());
                return $this->getFlashJson('failed', "Some fields are missing.", $e);
            }

            try
            {
                $this->Contacts->save($contact);
                return $this->getFlashJson('success','your message sent succcessfully');

            }
            catch (\Exception $e){
                return $this->getFlashJson('failed', "The message could not be sent.",$e->getMessage());
            }

        }


    }

    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }
}
