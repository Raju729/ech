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

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Controller\Component\AuthComponent;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $prefix =  $this->request->getParam('prefix');

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        if($prefix=="admin")
        {
            $this->loadComponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'fields' => ['username' => 'username', 'password' => 'password']
                    ]
                ],
                'loginAction' => ['controller' => 'Home', 'action' => 'loginAction'],
                'loginRedirect' => ['controller' => 'Home', 'action' => 'loginRedirect'],
                'logoutRedirect' => ['controller' => 'Home', 'action' => 'logoutRedirect']
            ]);
        }
        else
        {
           
            $this->loadComponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'fields' => ['username' => 'username', 'password' => 'password']
                    ]
                ],
                'loginAction' => ['controller' => 'Authexs', 'action' => 'login'],
                'loginRedirect' => ['controller' => 'Profile', 'action' => 'profile'],
                'logoutRedirect' => ['controller' => 'Authexs', 'action' => 'login']
            ]);
        }

        $this->Auth->getConfig('authenticate', [
            AuthComponent::ALL => ['userModel' => 'users'], 'Form']);
    }



    /*
     * Enable the following components for recommended CakePHP security settings.
     * see https://book.cakephp.org/3.0/en/controllers/components/security.html
     */
    //$this->loadComponent('Security');
    //$this->loadComponent('Csrf');

    public function checkpermission($action)
    {
        $flag = false;
        $session = $this->request->session();

        if($session->check('Auth.User'))
        {
            $user = $session->read('Auth.User');
           
            $permissions = json_decode($user['permissions']);
            //$this->debugprint($permissions);
            if($permissions->access=='all')
            {
                $flag=true;/*You have all access like administrator*/
            }
            else if($permissions->access=='part')
            {
                $area = $permissions->area;
                if(isset($area->$action) and $area->$action)
                {
                    $flag = true;
                }
            }
        }

        if(!$flag)
        {
            echo 'You do not have permission. Contact with support.';
            exit;
            // $flag =false;
            // return $flag;
        }
    }
    public function getJson($data)
    {
        $resultJ = json_encode($data);
        $this->response->type('json');
        $this->response->body($resultJ);
        return $this->response;
    }

    public function getFlashJson($status,$msg,$e="")
    {
        $result = '<strong>'.$msg.'</strong>'.$e;
        $data = array("status"=>$status,"response"=>$result);
        return $this->getJson($data);
    }

    public function cakeErrorToString($errors=array())
    {
        $e = "";
        foreach ($errors as $key => $value) {
            foreach ($value as $k => $v) {
                $e = $e . '<li>' . $v . '</li>';
            }
        }
        return $e;
    }

    public function setFlash($status,$msg,$e="")
    {
        $this->Flash->message($msg.$e, [
            'key' => 'message','params' => ['status' => $status]
        ]);
    }

    public function getDataJson($status,$data)
    {
        $data = array("status"=>$status,"data"=>$data);
        return $this->getJson($data);
    }
    ///get doctor balance
    public function get_balance($id){
        $balance=$this->loadModel('Profiles');
        $get_bal = $balance->get($id);
        return $get_bal->balance ;
    }
    ///update doctor balance
    public function update_balance ($id,$amount,$op)
    {
        try
        {
            $profile=$this->loadModel('Profiles');
            $query = $profile->get($id);
            $get_bal= $query->balance;

            if($op=='add')
                $update_balance = $get_bal+$amount;
            else if($op=='sub')
                $update_balance = $get_bal-$amount;

            if(isset($update_balance))
            {
                $balc = array('balance'=>$update_balance);
                $query2 = $this->Profiles->patchEntity($query,  $balc);
                $this->Profiles->save($query2);
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(\Exception $e)
        {
            return false;
        }    

    }

    function encryptDecrypt( $string, $action = 'e' ) {
        // you may change these values to your own
        $secret_key = 'cake_enc_type';
        $secret_iv = 'cake_dec_type';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }
        return $output;
    }

}
