var equipesConectadas = false;
var jogoIniciado = false;
var perguntaAtualId = 1;
var perguntaAtual;

var jogo;

function iniciarJogo() {
	if (jogoIniciado)
		return;

	jogoIniciado = true;

	// console.log("Iniciar Jogo");
	// console.log(perguntas);

	jogo.show();

	$("#aguardando_equipes").hide();

	exibirPergunta();
}

function exibirPergunta() {
	$.each(perguntas, function (index, value) {
		if (value.id === perguntaAtualId) {
			perguntaAtual = value;
			return false;
		}
	});

	$("#pergunta").text(perguntaAtual.enunciado);

	var radio = jogo.find("form").find("label");
	radio.each(function (index, value) {
		$(this).text(perguntaAtual.alternativas[index].descricao);
	});
}

function checarEquipesConectadas() {
	// console.log("checarEquipesConectadas: " + equipesConectadas);
	$.ajax({
		url: url + "jogo/ajax",
		dataType: "json",
		data: {
			"equipe": equipeId
		}
	}).done(function (result) {
		console.log(result);
		equipesConectadas = result.equipesConectadas;

		var jogoFinalizado = result.jogoFinalizado;

		if (jogoFinalizado) {
			$("body").remove();
		}
		// console.log(equipesConectadas);

		$.each(result.alternativas, function (index, value) {
			// console.log(index, value);
		});

		exibirPergunta();

		if (equipesConectadas) {
			iniciarJogo();
		}

		setTimeout(checarEquipesConectadas, 100);
	});
}

$(function () {
	jogo = $("#jogo");

	checarEquipesConectadas();

	$("#proxima").click(function () {
		var form = $("form").serializeArray();

		// Apenas durante testes
		// form = [
		// 	{
		// 		value: 1
		// 	}
		// ];

		// Checa se tem uma alternativa selecionada
		if (form.length > 0) {
			var alternativaSelecionada = form[0].value;
			console.log(alternativaSelecionada);

			$.ajax({
				url: url + "jogo/ajaxResposta",
				dataType: "json",
				data: {
					"perguntaId": perguntaAtualId,
					"equipe": equipeId,
					"alternativa": alternativaSelecionada
				}
			}).done(function (result) {
				console.log(result);

				var proximaPergunta = result.proximaPergunta;
				if (proximaPergunta) {
					perguntaAtualId++;
					exibirPergunta();
				} else {
					$("body").remove();
				}
			});
		}
	// .click() durante testes
	});
});
