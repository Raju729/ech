<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property string $token
 * @property string $uid
 * @property string $created_by
 * @property string $details
 * @property int $amount
 * @property int $trx_status
 * @property string $trx_name
 * @property int $refund_status
 * @property string $type
 * @property int $last_bal
 * @property int $cur_bal
 * @property int $reff_id
 * @property string $reff_name
 * @property string $w_method
 * @property string $w_account
 * @property string $w_details
 * @property string $pay_method
 * @property string $pay_info
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Reff $reff
 */
class Transaction extends Entity
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
        'token' => true,
        'uid' => true,
        'created_by' => true,
        'created_for' => true,
        'modified_by' => true,
        'details' => true,
        'amount' => true,
        'comments' => true,
        'trx_status' => true,
        'trx_name' => true,
        'refund_status' => true,
        'type' => true,
        'last_bal' => true,
        'cur_bal' => true,
        'pay_trx_id' => true,
        'reff_id' => true,
        'reff_name' => true,
        'w_method' => true,
        'w_account' => true,
        'w_details' => true,
        'pay_method' => true,
        'pay_info' => true,
        'created' => true,
        'modified' => true,

    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token'
    ];
}
