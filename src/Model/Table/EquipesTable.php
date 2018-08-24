<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 24/08/2018
 * Time: 19:50
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class EquipesTable extends Table
{
	public function initialize(array $config)
	{
		$this->hasMany("Alternativas", [
			"joinTable" => "equipes_alternativas"
		]);

		$this->setTable("equipes");
	}
}
