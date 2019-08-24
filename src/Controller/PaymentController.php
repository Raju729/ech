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

/**
 * Payment Controller
 *
 *
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentController extends AppController
{
    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->setLayout('public');
    }

    public function ajax()
    {
        $json ="";

        if(1)
        {

            $op = $this->request->getQuery('op');

            switch ($op) {

                case "before_getadoctor":
                    $json = $this->beforeGetADoctor();
                    break;

                case "data_token":
                    $json = $this->bkash($op);
                    break;


            }
        }
        else
        {
            $json = $this->getFlashJson("failed","Operation or ID are invalid.");
        }

        return $json;

    }

    public function beforeGetADoctor()
    {
        if ($this->request->is('post')) {
            $session = $this->request->session();
            $info = $session->read('Auth.Info');
            $user = $session->read('Auth.User');
            //user_info
            $user['f_name']=$info['f_name'];
            $user['l_name']=$info['l_name'];

            $eid = $user['uid'];
            $user['permissions']='';
            $eid_info=json_encode($user);


            $pid= $_POST['pid'];
            
            $fee= $_POST['fee'];

            $this->loadModel('Patients');
            $p_info = $this->Patients->get(['uid' => $pid]);
            $pid_info = json_encode($p_info);


            //did_info
            $did= $_POST['did'];
            $this->loadModel('Profiles');
            $doctor_p = $this->Profiles->get(['uid' => $did]);
            $did_info = json_encode($doctor_p);

            //pcommon
            $pcommon_info = json_encode($_POST);

            $data_array = array(
              "eid"=>$eid,
                "did"=>$did,
                "pid"=>$pid,
                "eid_info"=>$eid_info,
                "did_info"=>$did_info,
                "pid_info"=>$pid_info,
                "pcommon_info"=>$pcommon_info,
            );



            $pres_table = TableRegistry::get('prescriptions');
            $pres = $pres_table->newEntity();

            $prec_save = $pres_table->patchEntity($pres, $data_array);

            if (count($prec_save->errors()) > 0) {
                $e = $this->cakeErrorToString($prec_save->errors());
                return $this->setFlash('failed', "Some fields are missing.", $e);
            }

                if ($pres_table->save($prec_save)) {

                    if ($_POST['pay_method'] =='bkash'){
                        $pres_id=$prec_save->pres_id;
                        $cur_time =strtotime(date('Y-m-d H:i:s'));
                        $exp_time = strtotime( date("m/d/Y h:i:s a", time() + 3000));
                        $token['pres_id'] = $pres_id;
                        $token['amount'] = $fee;
                        $token['pay_method'] ='bkash';
                        $token['cur_time'] = $cur_time;
                        $token['exp_time'] = $exp_time;
                        $Etoken = $this->encryptDecrypt(serialize($token),'e');
                        $url =$Etoken;
                        return $this->getDataJson('success',$url);
                    }
                    elseif ($_POST['pay_method'] =='rocket'){
                        $pres_id=$prec_save->pres_id;
                        $token['pres_id'] = $pres_id;
                        $token['amount'] = 50;
                        $Etoken = base64_encode(serialize($token));
                        $url =$Etoken;
                        return $this->getDataJson('success',$url);
                    }
                    elseif ($_POST['pay_method'] =='free'){
                        $pres_id=$prec_save->pres_id;
                        $cur_time =strtotime(date('Y-m-d H:i:s'));
                        $exp_time = strtotime( date("m/d/Y h:i:s a", time() + 3000));
                        $token['pres_id'] = $pres_id;
                        $token['amount'] = 0;
                        $token['pay_method'] = 'free';
                        $token['cur_time'] = $cur_time;
                        $token['exp_time'] = $exp_time;
                        $Etoken = $this->encryptDecrypt(serialize($token),'e');
                        $url =$Etoken;
                        return $this->getDataJson('free',$url);
                    }

                } else {
                    return $this->getFlashJson('failed', 'Can Not Saved Right Now.');
                }



                return $this->getFlashJson("failed", "Can not Saved the Data.");





        }
    }

    public function bkash($op='')
    {

        if($op =='data_token'){

           $data= $this->encryptDecrypt($_POST['token'],'d');
            $token_data=(unserialize($data));
            $token_data['pay_trx_id']=$_POST['pay_trx_id'];
            $token_data['m_account']=$_POST['m_account'];
            $token= $this->encryptDecrypt(serialize($token_data),'e');
            return $this->getDataJson('success',$token);
        }


        $token = $this->request->getQuery('token');
        $resp = $this->checkToken($token);
        if($resp!=""){
            echo $resp;exit;
        }

        $pay_method = TableRegistry::get('payment_methods');
        $bkash = $pay_method->find('all')
            ->where('method_name ='. "'bkash'")
            ->limit(1);
        $this->set(compact('bkash'));
        $dtoken = $this->encryptDecrypt($token,'d');
        $dtoken=(unserialize($dtoken));

        $this->set('dtoken',$dtoken);
    }
                                                                    //free method
    public  function free(){
        $token = $this->request->getQuery('token');
        $resp = $this->checkToken($token);
        if($resp!=""){
            echo $resp;exit;
        }
        return $this->redirect(['controller' => 'Transactions', 'action' => 'store','?'=>['token'=>$token]]);
    }

    public function dbbl()
    {
        echo 'my name is dbbl';exit;

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

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

//        return $this->redirect(['action' => 'index']);




}
