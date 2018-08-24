<?= $this->Html->css("index") ?>

<div class="text">
	<h1 id="BC"><strong>Blockchain Challenge</strong></h1>
</div>

<div class="lateral">
	<p id="part">Realização:</p>

	<div class="fiap">
		<img src="img/logo-fiap_branco.png" alt="Logo FIAP" class="logoF">
	</div>

	<div class="bomesp">
		<img src="img/download.png" alt="Logo BOMESP" class="logoB">
	</div>

	<div>
		<?=
			$this->Html->link(
				$this->Html->image($equipeImagem),
				[
					"controller" => "Jogo",
					"action" => "index",
					"equipe" => $this->request->getQuery("equipe")
				],
				[
					"id" => "button",
					"escape" => false
				]
			)
		?>
	</div>
</div>
