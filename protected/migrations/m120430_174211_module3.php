<?php

class m120430_174211_module3 extends CDbMigration
{
	public function up()
	{
        $this->createTable('client_mandate', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'text',
            'gp_id' => 'int',
        ));
        
        $this->createIndex('cm_gp_id', 'client_mandate', 'gp_id', false);
        
        $this->createTable('client_mandate_lp', array(
            'client_mandate_id' => 'int NOT NULL',
            'lp_id' => 'int  NOT NULL',
            ));
        $this->createIndex('cm_lp', 'client_mandate_lp', 'client_mandate_id, lp_id', false);
        $this->createIndex('cm_lp_id', 'client_mandate_lp', 'lp_id', false);

        $this->createTable('communication', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'text',
            'gp_id' => 'int',
            'client_mandate_id' => 'int',
            'user_id' => 'int',
            'employees_id' => 'int',
        ));
        $this->createIndex('comm_gp_id', 'communication', 'gp_id', false);
        $this->createIndex('comm_employees_id', 'communication', 'employees_id', false);

        $this->createTable('tag', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
        ));

        $this->createTable('communication_tag', array(
            'tag_id' => 'int',
            'communication_id' => 'int',
        ));
        $this->createIndex('communication_tag_id', 'communication_tag', 'tag_id', false);
        $this->createIndex('communication_comm_id', 'communication_tag', 'communication_id', false);
        
        
        $this->createTable('todo', array(
            'id' => 'pk',
            'description' => 'text',
            'user_id' => 'int',
            'create_at' => 'date',
            'date' => 'datetime',
            'communication_id' => 'int',
            'done' => 'boolean DEFAULT 0',
        ));
        $this->createIndex('todo_user_done', 'todo', 'user_id, done, date', false);
        $this->createIndex('todo_comm_id', 'todo', 'communication_id', false);

	}

	public function down()
	{
        $this->dropTable('todo');
        $this->dropTable('client_mandate_lp');
        $this->dropTable('communication_tag');
		$this->dropTable('client_mandate');
        $this->dropTable('tag');
        $this->dropTable('communication');

	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
