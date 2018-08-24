<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 24/08/2018
 * Time: 19:33
 */

namespace App\Controller;


class JogoController extends AppController
{
	function index()
	{
		// Marca a equipe como conectada
		$this->loadModel("Equipes");
		$equipe = $this->Equipes->get($this->equipe);
		$equipe->conectada = true;
		$this->Equipes->save($equipe);

		// Definir a equipe como conectada

		// O AJAX checa a conexão das três equipes e
		// dispara o início do jogo
		// Detecta em qual pergunta está para retomar o progresso
	}

	public function ajax()
	{
		$this->loadModel("Equipes");

		$equipeId = $this->request->getQuery("equipe");
		$equipe = $this->Equipes->pegarId($equipeId);

		// Checar se todos estão conectados
		$this->loadModel("Equipes");
		$equipes = $this->Equipes->pegar();

		$equipesConectadas = true;

		foreach ($equipes as $equipe)
		{
			if (!$equipe->conectada)
			{
				$equipesConectadas = false;
				break;
			}
		}

		$resultado = [
			"equipesConectadas" => $equipesConectadas,
			"equipe" => $equipe
		];
		echo json_encode($resultado);
		die();
	}

	public function desconectarEquipes()
	{
		$this->loadModel("Equipes");

		for ($i = 1; $i <= 3; $i++) {
			$equipe = $this->Equipes->get($i);

			$equipe->conectada = false;
			$this->Equipes->save($equipe);
		}

		echo "Equipes desconectadas com sucesso.";

		die();
	}
}
