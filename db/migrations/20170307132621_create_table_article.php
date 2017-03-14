<?php

use Phinx\Migration\AbstractMigration;

class CreateTableArticle extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $article = $this->table('articles');
        $article->addColumn('title', 'string')
                ->addColumn('content', 'string')
                ->addColumn('image', 'string')
                ->addColumn('user_id', 'integer')
                ->addColumn('publish_date', 'datetime')
                ->addColumn('created', 'timestamp')
                ->addColumn('updated', 'datetime')
                ->addForeignKey('user_id', 'users', 'id')
                ->save();
    }
}
