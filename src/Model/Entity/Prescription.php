<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prescription Entity
 *
 * @property int $pres_id
 * @property int $eid
 * @property int $pid
 * @property int $did
 * @property string $did_info
 * @property string $eid_info
 * @property string $pid_info
 * @property string $pcommon_info
 * @property string $pres_info
 * @property int $serial
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $prescribe_date
 * @property \Cake\I18n\FrozenTime $modified
 */
class Prescription extends Entity
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
        'eid' => true,
        'pid' => true,
        'did' => true,
        'did_info' => true,
        'eid_info' => true,
        'pid_info' => true,
        'pcommon_info' => true,
        'pres_info' => true,
        'serial' => true,
        'status' => true,
        'created' => true,
        'prescribe_date' => true,
        'modified' => true
    ];
}
