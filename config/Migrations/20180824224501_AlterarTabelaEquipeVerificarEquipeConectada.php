<?php
use Migrations\AbstractMigration;

class AlterarTabelaEquipeVerificarEquipeConectada extends AbstractMigration
{
    public function change()
    {
    	$table = $this->table("equipes");
    	$table->addColumn("conectada", "boolean")
		    ->save();
    }
}
