<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{

    protected $_accessible = [
        'nice_name' => true,
        'username' => true,
        'password' => true,
        'email' => true,
        'type' => true,
        'login_token'=>true,
        'user_active' => true,
        'permissions' => true,
        'created' => true,
        'created_ip' => true,
        'modified' => true,
        'last_login_ts' => true,
        'last_login_ip' => true,
        'failed_login_ts' => true,
        'failed_login_ip' => true,
        'total_fails' => true,
        'created' => true
    ];

    protected $_hidden = [
        'password'
    ];
}
