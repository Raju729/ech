<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Statement Entity
 *
 * @property int $id
 * @property int $uid
 * @property int $tr_id
 * @property string $type
 * @property float $last_bal
 * @property float $cur_bal
 * @property int $created
 * @property int $modified
 *
 * @property \App\Model\Entity\Tr $tr
 */
class Statement extends Entity
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
        'tr_id' => true,
        'type' => true,
        'amount'=> true,
        'status'=> true,
        'last_bal' => true,
        'cur_bal' => true,
        'created' => true,
        'modified' => true,
        'tr' => true
    ];
}
