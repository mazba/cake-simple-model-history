<?php
namespace CakeSimpleModelHistory\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use CakeSimpleModelHistory\Model\Entity\ActivityLog;

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
    public function addActivity(Event $event,EntityInterface $entity,$data){
        $model = $entity->source();
        if (substr($model, -5) == 'Table') {
            $model = substr($model, 0, -5);
        }
        if($entity->isNew()){
            $action = ActivityLog::ACTION_ADD;
            $entity_jsonfy = json_encode($entity->toArray());
        }
        else{
            $action = ActivityLog::ACTION_EDIT;
            $entity_jsonfy = [
                'new_data'=>$entity->toArray(),
                'original_data'=>$entity->extractOriginal($entity->visibleProperties())
            ];
            $entity_jsonfy = json_encode($entity_jsonfy);
        }
//        echo '<pre>';
//        print_r($entity_jsonfy);die;
//        print_r($entity->toArray());
//        print_r($entity->extractOriginal($entity->visibleProperties()));die;
        $entity_data = [];
        $entity_data['model'] = $model;
        $entity_data['user_id'] = isset($data['logged_in_user_id'])?$data['logged_in_user_id']:'';
        $entity_data['user_group_id'] = isset($data['logged_in_user_group_id'])?$data['logged_in_user_group_id']:'';
        $entity_data['action'] = $action;
        $entity_data['data'] = $entity_jsonfy;
        $entity_data['ip_address'] = isset($data['user_ip'])?$data['user_ip']:'';;
        $entity_data['user_input_data'] = isset($data['user_input_data'])?json_encode($data['user_input_data']):'';
        $entity_data['url'] = isset($data['url'])?$data['url']:'';
//        echo '<pre>';print_r($entity_data);die;
        $newEntity = $this->newEntity($entity_data);
        $this->save($newEntity);

    }
}
