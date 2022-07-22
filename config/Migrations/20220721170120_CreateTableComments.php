<?php
use Migrations\AbstractMigration;

class CreateTableComments extends AbstractMigration
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
        $table = $this->table('comments');
		$table->addColumn('user_id', 'integer', [
            'default' => null,
            'null' => true,
        ])->addIndex('user_id');
		$table->addColumn('post_id', 'integer', [
            'default' => null,
            'null' => true,
        ])->addIndex('post_id');
        $table->addColumn('description', 'string', [
            'default' => null,
            'limit' => 250,
            'null' => false,
        ]);
		$table->addColumn('image', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->create();
    }
}
