<?= $this->Html->css("pergunta") ?>
<?= $this->Html->script("jogo") ?>

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

<div class="pergunta">
	<h1>1. This is a question?</h1>

	<form method="get" id="form">
		<div class="ra">
			<input type="radio" name="a" value="a">A. resposta A.
			<br>
		</div>

		<div class="rb">
			<input type="radio" name="a" value="a"> A. resposta A.
			<br>
		</div>

		<div class="rc">
			<input type="radio" name="a" value="a"> A. resposta A.
			<br>
		</div>

		<div class="rd">
			<input type="radio" name="a" value="a"> A. resposta A.
			<br>
		</div>

		<div class="re">
			<input type="radio" name="a" value="a"> A. resposta A.
			<br>
		</div>
	</form>

	<div class="button-play">
		<button type="button" onClick="window.open('gameover.html')" class="button"><h2>Proxima</h2></button>
	</div>
</div>
