<?php
use Migrations\AbstractMigration;

class CriarTabelaAlternativas extends AbstractMigration
{
    public function change()
    {
	    $table = $this->table("alternativas");
	    $table->addColumn("pergunta_id", "integer")
		    ->addForeignKey("pergunta_id", "perguntas", "id")
		    ->addColumn("descricao", "text")
		    ->addColumn("correto", "boolean")
		    ->save();
    }
}
