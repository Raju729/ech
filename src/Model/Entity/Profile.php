<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


class Profile extends Entity
{

    protected $_accessible = [
        'uid' => true,
        'f_name' => true,
        'l_name' => true,
        'balance' => true,
        'specialist' => true,
        'mobile' => true,
        'degree' => true,
        'alt_mobile' => true,
        'chamber' => true,
        'visittime' => true,
        'address' => true,
        'doc_type' => true,
        'fee' => true,
        'nid' => true,
        'thumb_url' => true,
        'media_accounts' => true,
        'created' => true
    ];
}
