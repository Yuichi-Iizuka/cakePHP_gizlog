<?php
use Migrations\AbstractMigration;

class CreateQuestions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('questions');
        $table->addColumn('user_id', 'integer');
        $table->addColumn('tag_category_id', 'integer');
        $table->addColumn('title', 'string');
        $table->addColumn('content', 'text');
        $table->addTimestamps();
        $table->addForeignKey('user_id', 'users', 'id');
        $table->addForeignKey('tag_category_id', 'tags', 'id');
        $table->create();
    }
}
