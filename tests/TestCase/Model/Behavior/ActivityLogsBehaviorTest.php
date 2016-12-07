<?php
namespace CakeSimpleModelHistory\Test\TestCase\Model\Behavior;

use CakeSimpleModelHistory\Model\Behavior\ActivityLogsBehavior;
use Cake\TestSuite\TestCase;

/**
 * CakeSimpleModelHistory\Model\Behavior\ActivityLogsBehavior Test Case
 */
class ActivityLogsBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeSimpleModelHistory\Model\Behavior\ActivityLogsBehavior
     */
    public $ActivityLogs;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ActivityLogs = new ActivityLogsBehavior();
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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
