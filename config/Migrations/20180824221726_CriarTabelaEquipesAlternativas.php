<?php
use Migrations\AbstractMigration;

class CriarTabelaEquipesAlternativas extends AbstractMigration
{
    public function change()
    {
	    $table = $this->table("equipes_alternativas");
	    $table->addColumn("equipe_id", "integer")
		    ->addForeignKey("equipe_id", "equipes", "id")
		    ->addColumn("alternativa_id", "integer")
		    ->addForeignKey("alternativa_id", "alternativas", "id")
		    ->save();
    }
}
