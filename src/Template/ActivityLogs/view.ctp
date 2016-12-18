<?php echo $this->Html->css('CakeSimpleModelHistory.app'); ?>
<div class="mk-wrp">
    <h2 class="header">Details view of <strong style="color: #F3565D;"><?= $activityLog['model']?></strong> Model,<small> at <?= $activityLog['created'] ?></small></h2>
    <div class="row">
        <h4 style="font-weight: bold"><?= __('User Logs') ?></h4>
       <div class="col-md-12">
           <table class="table">
                <tbody>
                    <?php if($activityLog['user']['name_en']): ?>
                    <tr><th><?= __('User') ?></th><td><?= $activityLog['user']['name_en'] ?></td></tr>
                    <?php endif; ?>
                    <?php if($activityLog['user']['name_en']): ?>
                    <tr><th><?= __('User Group') ?></th><td><?= $activityLog['user_group']['title_en'] ?></td></tr>
                    <?php endif ?>
                    <tr><th><?= __('User IP') ?></th><td><?= $activityLog['ip_address'] ?></td></tr>
                    <tr><th><?= __('Url') ?></th><td><?= $activityLog['url'] ?></td></tr>
                    <tr><th><?= __('Action') ?></th><td><span class="label label-danger"><?= $activityLog['action'] ?></span></td></tr>
                </tbody>
           </table>
       </div>
       <h4 style="font-weight: bold"><?= __('Data Log Details') ?></h4>
        <div class="col-md-12">
            <?php
                $data = json_decode($activityLog['data'],TRUE);
                if(isset($data['new_data']))
                    echo $this->element('updateActionTbl',['data'=>$data]);
                else
                    echo $this->element('createActionTbl',['data'=>$data]);

            ?>
        </div>
    </div>
</div>