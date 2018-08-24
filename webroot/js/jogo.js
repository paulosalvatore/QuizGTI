var equipesConectadas = false;

function iniciarJogo()
{
	$("#jogo").show();
	$("#aguardando_equipes").hide();
}

function checarEquipesConectadas()
{
	// console.log("checarEquipesConectadas: " + equipesConectadas);
	$.ajax({
		url: url + "jogo/ajax",
		// dataType: "json",
		data: {
			"equipe": equipeId
		}
	}).done(function(result) {
		console.log(result);
		equipesConectadas = result.equipesConectadas;
	});

	if (equipesConectadas)
	{
		iniciarJogo();
	}
	else
	{
		setTimeout(checarEquipesConectadas, 100);
	}
}

$(function(){
	checarEquipesConectadas();
});
