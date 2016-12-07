<?php
namespace CakeSimpleModelHistory\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * ActivityLogs behavior
 */
class ActivityLogsBehavior extends Behavior
{
    public function initialize(array $config)
    {
        $this->activityLogs = TableRegistry::get('CakeSimpleModelHistory.ActivityLogs');
    }

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];


    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options){

    }
}
