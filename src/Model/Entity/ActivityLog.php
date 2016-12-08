<?php
namespace CakeSimpleModelHistory\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActivityLog Entity
 *
 * @property int $id
 * @property string $model
 * @property int $user_id
 * @property int $user_group_id
 * @property string $action
 * @property string $data
 * @property string $ip_address
 * @property \Cake\I18n\Time $created
 *
 * @property \CakeSimpleModelHistory\Model\Entity\User $user
 * @property \CakeSimpleModelHistory\Model\Entity\UserGroup $user_group
 */
class ActivityLog extends Entity
{
    const ACTION_ADD = 'create';
    const ACTION_EDIT = 'update';
    const ACTION_DELETE = 'delete';
    const ACTION_VIEW = 'view';
    const ACTION_REPORT_VIEW = 'report view';

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
        '*' => true,
        'id' => false
    ];
}
