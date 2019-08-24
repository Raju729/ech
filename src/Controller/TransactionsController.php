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
 * Transactions Controller
 *
 *
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
{
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('public');
    }
    public function transactions(){
//        $this->checkpermission('doctor_list');
        $session = $this->request->session();
        $user = $session->read('Auth.User');
        $uid = $user['uid'];
        $table = $this->Transactions;
        $query = $table->find('all',array('order'=>array('Transactions.id DESC')))
            ->where(['created_for'=>$uid])->orWhere([['created_by'=>$uid]]);
        $tran = $this->paginate($query);
        $this->set(compact('tran'));

    }


    public function store()
    {
        $session = $this->request->session();
        $info = $session->read('Auth.Info');
        $user = $session->read('Auth.User');
        $token = $_GET['token'];
        $resp = $this->checkToken($token);
        if($resp!=""){
            echo $resp;exit;
        }
        $this->loadModel('Transactions');
        $transaction = $this->Transactions->newEntity();
        if ($this->request->is('get')) {

            //take token from url & decrypt....................................................................
            $dtoken=$this->encryptDecrypt($token,'d');
            $dtoken =unserialize($dtoken);
            $pres_id =$dtoken['pres_id'];

            $pres=$this->loadModel('Prescriptions');
            $get_doc = $pres->get(['pres_id'=>$pres_id], [
                'finder' => 'all',
            ]);
            //get doctor id using pres id & extra necesssary field..............................................
            $get_doc = $get_doc->did;
            $dtoken['token'] = $_GET['token'] ;
            $dtoken['created_for'] = $get_doc ;
            $dtoken['created_by'] =$user['uid'];
            $dtoken['details'] = 'prescription request';
            $dtoken['trx_name'] = 'receive';
            $dtoken['reff_name'] = 'pres';
            $dtoken['type'] = 'credit';
            $dtoken['reff_id'] = $dtoken['pres_id'];


            //save in Transaction table......................................................................
            $transaction = $this->Transactions->patchEntity($transaction,$dtoken);
            if (count($transaction->errors()) > 0) {
                $e = $this->cakeErrorToString($transaction->errors());
                return $this->setFlash('failed', "Some fields are missing.", $e);
            }
            if ($this->Transactions->save($transaction)) {
                $this->setFlash('success', "Thank you for your Payment.");
                return $this->redirect(['action' => 'thankyou']);
            }
            return $this->setFlash('failed', "The transaction could not be saved. Please, try again.");

        }
        else{
            $this->setFlash('failed','Can Not Saved Right Now');
            return $this->redirect(array('controller' => 'Doctors', 'action' => 'doctorList'));
        }



    }
    public  function thankyou(){

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

    public function checkToken($token)
    {
        $out = "";
        try{
            $d = $this->encryptDecrypt($token,'d');
            if($d) {
                $a = unserialize($d);
                $exp= $a['exp_time'];
                $cur=strtotime(date('Y-m-d H:i:s'));
                if($exp<=$cur) {
                    $out= 'Token is expired.';
                }
                $pres_id = $a['pres_id'];
                $trx = $this->loadModel('Transactions');
                $c = $trx->find('all')->where(['reff_id'=>$pres_id])->count();
                if($c>0){
                    $out = 'Token is invalid.';
                }
            }
            else{
                $out= 'Token is invalid.';
            }
        }
        catch (Exception $e){
            $out= $e->getMessage();
        }
        return $out;
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

}
