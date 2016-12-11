<?php
namespace CakeSimpleModelHistory\Controller;

use CakeSimpleModelHistory\Controller\AppController;

/**
 * ActivityLogs Controller
 *
 * @property \CakeSimpleModelHistory\Model\Table\ActivityLogsTable $ActivityLogs
 */
class ActivityLogsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
        $this->loadModel('CakeSimpleModelHistory.ActivityLogs');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    }

    /**
     * View method
     *
     * @param string|null $id Activity Log id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activityLog = $this->ActivityLogs->get($id, [
            'contain' => ['Users', 'UserGroups']
        ]);

        $this->set('activityLog', $activityLog);
        $this->set('_serialize', ['activityLog']);
    }

    public function ajax($action='index'){
        if($action=='index'){
            $logs = $this->ActivityLogs
                    ->find('all')
                    ->select(['id','model','action','ip_address','date'=>'created']);
            $this->response->body(json_encode($logs));
            return $this->response;
        }
    }
}
