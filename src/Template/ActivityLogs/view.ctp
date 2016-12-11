<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Activity Log'), ['action' => 'edit', $activityLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Activity Log'), ['action' => 'delete', $activityLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activityLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Activity Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Groups'), ['controller' => 'UserGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Group'), ['controller' => 'UserGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="activityLogs view large-9 medium-8 columns content">
    <h3><?= h($activityLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($activityLog->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $activityLog->has('user') ? $this->Html->link($activityLog->user->id, ['controller' => 'Users', 'action' => 'view', $activityLog->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Group') ?></th>
            <td><?= $activityLog->has('user_group') ? $this->Html->link($activityLog->user_group->id, ['controller' => 'UserGroups', 'action' => 'view', $activityLog->user_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($activityLog->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip Address') ?></th>
            <td><?= h($activityLog->ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($activityLog->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($activityLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($activityLog->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Data') ?></h4>
        <?= $this->Text->autoParagraph(h($activityLog->data)); ?>
    </div>
    <div class="row">
        <h4><?= __('User Input Data') ?></h4>
        <?= $this->Text->autoParagraph(h($activityLog->user_input_data)); ?>
    </div>
</div>
