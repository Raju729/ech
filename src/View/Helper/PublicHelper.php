<?php
namespace App\View\Helper;

use Cake\View\Helper;

class PublicHelper extends Helper
{
    public $GENDER=array("M"=>"Male", "F"=>"Female", "O"=>"Others");
    public $RELIGION = array("I"=>"Islam","H"=>"Hindu","C"=>"Christian","B"=>"Buddhism","O"=>"Others");
    public $M_STATUS = array('M'=>'Married','U'=>'Unmarried','O'=>'Others');
    public $OCCUPATION = array('ST'=>'Student','SE'=>'Service','BU'=>'Business','HO'=>'Housewife','OT'=>'Others');

    public function encryptDecrypt( $string, $action = 'e' ) {
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
    public function test(){
        echo 'saiful';exit;
    }
    public function isDoctor()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth.User');
        if($user and $user['type']==3)
        {
            return true;

        }
        else
        {
            echo "You don't have Doctor access";
            exit;
        }
    }
}
