<?php
namespace CakeSimpleModelHistory\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActivityLogs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 *
 * @method \CakeSimpleModelHistory\Model\Entity\ActivityLog get($primaryKey, $options = [])
 * @method \CakeSimpleModelHistory\Model\Entity\ActivityLog newEntity($data = null, array $options = [])
 * @method \CakeSimpleModelHistory\Model\Entity\ActivityLog[] newEntities(array $data, array $options = [])
 * @method \CakeSimpleModelHistory\Model\Entity\ActivityLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeSimpleModelHistory\Model\Entity\ActivityLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeSimpleModelHistory\Model\Entity\ActivityLog[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeSimpleModelHistory\Model\Entity\ActivityLog findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActivityLogsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('activity_logs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'CakeSimpleModelHistory.Users'
        ]);
        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'className' => 'CakeSimpleModelHistory.UserGroups'
        ]);
    }
   
}
