<?= $this->Html->css("pergunta") ?>
<?= $this->Html->script("jogo") ?>

<script>
	var equipeId = <?= $equipe ?>;
	var perguntas = <?= $perguntas ?>;
</script>

<div class="lateral">
	<p>
		<?=
			$this->Html->image(
				$equipeImagem,
				[
					"class" => "coin"
				]
			)
		?>
	</p>
	<div class="codigo">
		<span id="minuto">10:</span>
		<span id="segundo">00</span><br>
	</div>

	<div class="logo">
		<?=
			$this->Html->image(
				"logo-fiap_branco.png",
				[
					"class" => "coin"
				]
			)
		?>
	</div>
</div>

<div id="aguardando_equipes">
	Aguardando equipes...
</div>

<div id="jogo">
	<h1 id="pergunta">1. This is a question?</h1>

	<form method="get" id="form">
		<div class="ra">
			<input type="radio" id="alternativa_1" name="alternativas" value="1" checked>
			<label for="alternativa_1">A. resposta A.</label>
			<br>
		</div>

		<div class="rb">
			<input type="radio" id="alternativa_2" name="alternativas" value="2">
			<label for="alternativa_2">A. resposta A.</label>
			<br>
		</div>

		<div class="rc">
			<input type="radio" id="alternativa_3" name="alternativas" value="3">
			<label for="alternativa_3">A. resposta A.</label>
			<br>
		</div>

		<div class="rd">
			<input type="radio" id="alternativa_4" name="alternativas" value="4">
			<label for="alternativa_4">A. resposta A.</label>
			<br>
		</div>

		<div class="re">
			<input type="radio" id="alternativa_5" name="alternativas" value="5">
			<label for="alternativa_5">A. resposta A.</label>
			<br>
		</div>
	</form>

	<div class="button-play">
		<button id="proxima" type="button" class="button">Proxima</button>
	</div>
</div>
