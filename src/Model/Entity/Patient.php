<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $pid
 * @property int $uid
 * @property string $f_name
 * @property string $l_name
 * @property string $dob
 * @property int $age
 * @property string $gender
 * @property string $m_status
 * @property string $occupation
 * @property string $religion
 * @property string $nid
 * @property string $mobile
 * @property string $address
 * @property string $thumb_url
 * @property \Cake\I18n\FrozenTime $created_ts
 * @property \Cake\I18n\FrozenTime $modified_ts
 */
class Patient extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'uid' => true,
        'pid' => true,
        'f_name' => true,
        'l_name' => true,
        'dob' => true,
        'age' => true,
        'gender' => true,
        'm_status' => true,
        'occupation' => true,
        'religion' => true,
        'nid' => true,
        'mobile' => true,
        'address' => true,
        'thumb_url' => true,
        'created' => true,
        'modified' => true
    ];
}
