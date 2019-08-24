<?php
namespace App\View\Helper;

use Cake\View\Helper;

class AdminHelper extends Helper
{

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

    public function isAdmin()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth.User');
        if($user and $user['type']==1)
        {
            
        }
        else
        {
            echo "You don't have admin access";
            exit;
        }
    }
    public function test(){
        echo 'saiful';exit;
    }

}
