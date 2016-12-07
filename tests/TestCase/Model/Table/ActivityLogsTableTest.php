<?php
namespace CakeSimpleModelHistory\Test\TestCase\Model\Table;

use CakeSimpleModelHistory\Model\Table\ActivityLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeSimpleModelHistory\Model\Table\ActivityLogsTable Test Case
 */
class ActivityLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeSimpleModelHistory\Model\Table\ActivityLogsTable
     */
    public $ActivityLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_simple_model_history.activity_logs',
        'plugin.cake_simple_model_history.users',
        'plugin.cake_simple_model_history.user_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActivityLogs') ? [] : ['className' => 'CakeSimpleModelHistory\Model\Table\ActivityLogsTable'];
        $this->ActivityLogs = TableRegistry::get('ActivityLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActivityLogs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
