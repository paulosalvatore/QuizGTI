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

		$this->loadModel("Perguntas");
		$perguntas = $this->Perguntas->pegar();
		$this->set("perguntas", json_encode($perguntas));

		// Definir a equipe como conectada

		// O AJAX checa a conexão das três equipes e
		// dispara o início do jogo
		// Detecta em qual pergunta está para retomar o progresso
	}

	public function ajax()
	{
		$this->loadModel("Equipes");

		$equipeId = $this->request->getQuery("equipe");
		$equipeSelecionada = $this->Equipes->pegarId($equipeId);

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

		$this->loadModel("Perguntas");
		$perguntas = $this->Perguntas->pegar();
		$quantidadePerguntas = count($perguntas);

		$jogoFinalizado = false;

		foreach ($equipes as $equipe) {
			$perguntasEquipe = [];
			foreach ($equipe->alternativas as $alternativa) {
				if (!in_array($alternativa->pergunta->id, $perguntasEquipe)) {
					$perguntasEquipe[] = $alternativa->pergunta->id;
				}
			}

			$jogoFinalizado = count($perguntasEquipe) == $quantidadePerguntas;

			if ($jogoFinalizado)
				break;
		}

		$resultado = [
			"equipesConectadas" => $equipesConectadas,
			"equipeSelecionada" => $equipeSelecionada,
			"jogoFinalizado" => $jogoFinalizado
		];
		echo json_encode($resultado);
		die();
	}

	public function ajaxResposta()
	{
		$this->loadModel("Perguntas");
		$perguntaId = (int)$this->request->getQuery("perguntaId");
		$pergunta = $this->Perguntas->pegarId($perguntaId);

		$perguntas = $this->Perguntas->pegar();
		$quantidadePerguntas = count($perguntas);

		$alternativaOrdem = $this->request->getQuery("alternativa");
		$alternativa = $pergunta["alternativas"][$alternativaOrdem - 1];

		$this->loadModel("Equipes");
		$equipeId = $this->request->getQuery("equipe");
		$equipe = $this->Equipes->pegarId($equipeId);

		$alternativasEquipe = [$alternativa->id];
		foreach ($equipe->alternativas as $alternativaEquipe)
		{
			$alternativasEquipe[] = $alternativaEquipe->id;
		}

		$equipe = $this->Equipes->patchEntity($equipe, [
			"alternativas" => [
				"_ids" => $alternativasEquipe
			]
		]);

		$equipe = $this->Equipes->save($equipe);

		$equipes = $this->Equipes->pegar();

		$resultado = [
			"perguntaId" => $perguntaId,
			"pergunta" => $pergunta,
			"alternativaSelecionada" => $alternativaOrdem,
			"alternativa" => $alternativa,
			"equipe" => $equipe,
			"proximaPergunta" => $perguntaId < $quantidadePerguntas
		];
		echo json_encode($resultado);
		die();
	}

	public function desconectarEquipes()
	{
		$this->loadModel("Equipes");

		for ($i = 1; $i <= 3; $i++) {
			$equipe = $this->Equipes->get($i);

			$equipe->alternativas = [];
			$equipe->conectada = false;
			$this->Equipes->save($equipe);
		}

		echo "Equipes desconectadas e limpas com sucesso.";

		die();
	}
}
