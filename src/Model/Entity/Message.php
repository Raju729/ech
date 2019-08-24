<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $m_id
 * @property int $status
 * @property int $conv_id
 * @property int $eid
 * @property int $did
 * @property string $name
 * @property string $m_body
 * @property string $thumb_url
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Conv $conv
 */
class Message extends Entity
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
        'status' => true,
        'conv_id' => true,
        'sid' => true,
        'rid' => true,
//        'name' => true,
        'm_body' => true,
        'thumb_url' => true,
        'created' => true,
        'modified' => true,

    ];
}
