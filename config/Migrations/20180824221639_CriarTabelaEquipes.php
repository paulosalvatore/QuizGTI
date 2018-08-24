<?php
use Migrations\AbstractMigration;

class CriarTabelaEquipes extends AbstractMigration
{
    public function change()
    {
    	$table = $this->table("equipes");
    	$table->addColumn("nome", "string")
		    ->save();
    }
}
