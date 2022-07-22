<?php
use Migrations\AbstractMigration;

class CreateTableUsers extends AbstractMigration
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
        $table = $this->table('users');
		$table->addColumn('username', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ])->addIndex('username', ['unique' => true]);
		$table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ])->addIndex('email', ['unique' => true]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 75,
            'null' => false,
        ]);
		$table->addColumn('bio', 'string', [
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
