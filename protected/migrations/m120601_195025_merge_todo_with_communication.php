<?php

class m120601_195025_merge_todo_with_communication extends CDbMigration
{
	public function up()
	{
        $this->addColumn('communication', 'todo_description', 'text null');
        $this->addColumn('communication', 'todo_date', 'datetime');
        $this->addColumn('communication', 'todo_user_id', 'int');
        $this->addColumn('communication', 'todo_done', 'boolean DEFAULT 0');
        $this->createIndex('commtodo_user_done', 'communication', 'todo_done, todo_user_id, todo_date', false);
	}

	public function down()
	{
        $this->dropIndex('commtodo_user_done', 'communication');
        $this->dropColumn('communication', 'todo_done');
        $this->dropColumn('communication', 'todo_user_id');
        $this->dropColumn('communication', 'todo_date');
        $this->dropColumn('communication', 'todo_description');
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
