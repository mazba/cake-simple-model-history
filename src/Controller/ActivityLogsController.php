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
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'UserGroups']
        ];
        $activityLogs = $this->paginate($this->ActivityLogs);

        $this->set(compact('activityLogs'));
        $this->set('_serialize', ['activityLogs']);
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

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activityLog = $this->ActivityLogs->newEntity();
        if ($this->request->is('post')) {
            $activityLog = $this->ActivityLogs->patchEntity($activityLog, $this->request->data);
            if ($this->ActivityLogs->save($activityLog)) {
                $this->Flash->success(__('The activity log has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity log could not be saved. Please, try again.'));
            }
        }
        $users = $this->ActivityLogs->Users->find('list', ['limit' => 200]);
        $userGroups = $this->ActivityLogs->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('activityLog', 'users', 'userGroups'));
        $this->set('_serialize', ['activityLog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity Log id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activityLog = $this->ActivityLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activityLog = $this->ActivityLogs->patchEntity($activityLog, $this->request->data);
            if ($this->ActivityLogs->save($activityLog)) {
                $this->Flash->success(__('The activity log has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity log could not be saved. Please, try again.'));
            }
        }
        $users = $this->ActivityLogs->Users->find('list', ['limit' => 200]);
        $userGroups = $this->ActivityLogs->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('activityLog', 'users', 'userGroups'));
        $this->set('_serialize', ['activityLog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity Log id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activityLog = $this->ActivityLogs->get($id);
        if ($this->ActivityLogs->delete($activityLog)) {
            $this->Flash->success(__('The activity log has been deleted.'));
        } else {
            $this->Flash->error(__('The activity log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
