<?php
use Migrations\AbstractMigration;

class CriarTabelaPerguntas extends AbstractMigration
{
    public function change()
    {
	    $table = $this->table("perguntas");
	    $table->addColumn("enunciado", "text")
		    ->addColumn("ordem", "integer")
		    ->save();
    }
}
