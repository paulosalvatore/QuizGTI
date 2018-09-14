<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 24/08/2018
 * Time: 19:50
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class PerguntasTable extends Table
{
	public function initialize(array $config)
	{
		$this->hasMany("Alternativas");

		$this->setTable("perguntas");
	}

	public function pegar()
	{
		return $this
			->find()
			->contain([
				"Alternativas"
			])
			->toArray();
	}

	public function pegarId($id)
	{
		return $this
			->find()
			->where([
				"Perguntas.id" => $id
			])
			->contain([
				"Alternativas"
			])
			->first();
	}
}
