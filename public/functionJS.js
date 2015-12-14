var equipe = [];
var lastNumber = 0;

/* Ajout ou supprime champ d'ajout d'équipe */
function changeNbEquipe()
{
	var val = document.getElementById('nbEquipe').value;
	if(val >= 2 && val <= 32)
	{
		if(val > lastNumber)
		{
			addEquipeToTournament(val);
		}
		else
		{
			removeEquipeFromTournament(val);
		}
	}
}

/* Ajout de champs création d'équipe */
function addEquipeToTournament(val)
{
	var nbEquipe = document.getElementById('nbEquipe').value;
	var div = document.getElementById('equipeBox');

	while(nbEquipe > lastNumber)
	{
		lastNumber++;

		var input = document.createElement('input');
		input.setAttribute('type', 'text');
		input.setAttribute('id', 'equipe'+lastNumber);
		input.setAttribute('name',  'equipe[]');//'equipe'+lastNumber);
		input.setAttribute('placeholder', 'Equipe '+lastNumber);

		equipe.push(input);
		div.appendChild(input);
	}
}

/* Supprime champs création d'équipe */
function removeEquipeFromTournament(val)
{
	var div = document.getElementById('equipeBox');
	var nbEquipe = document.getElementById('nbEquipe').value;

	while(lastNumber > nbEquipe)
	{
		lastNumber--;
		div.removeChild(equipe.pop());
	}
}

/* Cacher certains champs selon le type de tournoi */
function changeGroupe()
{
	var type = document.getElementById('typeTournoi').value;
	var display = 'block';

	if(type == 'Elimination direct')
		display = 'hide';

	document.getElementById('inputGroupe').style.display = display;
	document.getElementById('inputNbTerrains').style.display = display;
	document.getElementById('inputTypeFinale').style.display = display;
}

$(function(){
	$('#typeTournoi').change(function(e){
		var type = document.getElementById('typeTournoi').value;
		var display = '';

		if(type == 1)
			display = 'none';

		document.getElementById('inputGroupe').style.display = display;
		document.getElementById('inputNbTerrains').style.display = display;
		document.getElementById('inputTypeFinale').style.display = display;
	});
});

/* Sauvegarde du score du match */
function saveGame(idTournament, team1, team2, gameNb, timeStart, timeEnd)
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	var score1 = document.getElementById('matchIDHome'+gameNb).value;
	var score2 = document.getElementById('matchIDAway'+gameNb).value;

	if(score1 == "" || score2 == "")
	{
		alert("Veuillez insérer les scores !");
		return;
	}

	$.ajax({ url: '/saveScoreTeam',
			 data: {tournament_id : idTournament,
			 		equipe1 : team1,
			 		equipe2 : team2,
			 		score1 : score1,
			 		score2 : score2,
			 		heureMatchDebut : timeStart,
			 		heureMatchFin : timeEnd,
			 		_token: CSRF_TOKEN
			 },
			 type: 'post',
        success: function (data) {
	        alert(data);
	    }
	});
}