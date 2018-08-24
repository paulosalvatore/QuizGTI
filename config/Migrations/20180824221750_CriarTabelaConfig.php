<?php
use Migrations\AbstractMigration;

class CriarTabelaConfig extends AbstractMigration
{
    public function change()
    {
	    $table = $this->table("config");
	    $table->addColumn("liberado", "boolean")
		    ->addColumn("finalizado", "boolean")
		    ->save();
    }
}
