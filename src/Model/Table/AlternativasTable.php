<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 24/08/2018
 * Time: 20:43
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class AlternativasTable extends Table
{
	public function initialize(array $config)
	{
		$this->belongsToMany("Equipes", [
			"joinTable" => "equipes_alternativas"
		]);

		$this->belongsTo("Perguntas");

		$this->setTable("alternativas");
	}
}
