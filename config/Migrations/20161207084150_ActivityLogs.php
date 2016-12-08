<?php
use Migrations\AbstractMigration;

class ActivityLogs extends AbstractMigration
{
    public function up()
    {

        $this->table('activity_logs', ['id'=>true,'primary_key' => ['id']])
            ->addColumn('model', 'string', [
                'comment' => 'name of the model',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('user_id','integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('user_group_id','integer', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('action', 'string', [
                'comment' => 'name of the action [add,edit,delete]',
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('data', 'text', [
                'comment' => 'json data of the entity',
                'default' => null,
                'limit' => 16777215,
                'null' => true,
            ])
            ->addColumn('ip_address', 'string', [
                'comment' => 'ip address of the user',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('user_input_data', 'text', [
                'comment' => 'json data of form input',
                'default' => null,
                'limit' => 16777215,
                'null' => true,
            ])
            ->addColumn('url', 'string', [
                'comment' => 'url of the request',
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('activity_logs');
    }
}
