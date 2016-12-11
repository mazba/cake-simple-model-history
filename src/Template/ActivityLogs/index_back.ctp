<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Activity Log'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activityLogs index large-9 medium-8 columns content">
    <h3><?= __('Activity Logs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activityLogs as $activityLog): ?>
            <tr>
                <td><?= $this->Number->format($activityLog->id) ?></td>
                <td><?= h($activityLog->model) ?></td>
                <td><?= $activityLog->has('user') ? $this->Html->link($activityLog->user->id, ['controller' => 'Users', 'action' => 'view', $activityLog->user->id]) : '' ?></td>
                <td><?= $activityLog->has('user_group') ? $this->Html->link($activityLog->user_group->id, ['controller' => 'UserGroups', 'action' => 'view', $activityLog->user_group->id]) : '' ?></td>
                <td><?= h($activityLog->action) ?></td>
                <td><?= h($activityLog->ip_address) ?></td>
                <td><?= h($activityLog->url) ?></td>
                <td><?= h($activityLog->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $activityLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activityLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activityLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activityLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
