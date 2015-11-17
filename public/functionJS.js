var equipe = [];
var lastNumber = 0;

$('document').ready(function(){
	addEquipe();
});

function changeNbEquipe()
{
	var val = document.getElementById('nbEquipe').value;
	if(val >= 2 && val <= 24)
	{
		if(val > lastNumber)
		{
			addEquipe(val);
		}
		else
		{
			removeEquipe(val);
		}
	}
}

function addEquipe(val)
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

function removeEquipe(val)
{
	var div = document.getElementById('equipeBox');
	var nbEquipe = document.getElementById('nbEquipe').value;

	while(lastNumber > nbEquipe)
	{
		lastNumber--;
		div.removeChild(equipe.pop());
	}
}

function changeGroupe()
{
	var type = document.getElementById('typeTournoi').value;

	if(type == 'Elimination direct')
	{
		document.getElementById('inputGroupe').style.display = 'hide';
	}
	else
	{
		document.getElementById('inputGroupe').style.display = 'block';
	}
}

$(function(){
	$('#typeTournoi').change(function(e){
		var type = document.getElementById('typeTournoi').value;

		console.log(type);
		if(type == 1)
		{
			document.getElementById('inputGroupe').style.display = 'none';
		}
		else
		{
			document.getElementById('inputGroupe').style.display = '';
		}
	});
});

function deleteTournament($id)
{
	var r = confirm("Etes-vous sûr de vouloir supprimer le tournoi ?");

	if (r == true) {
	    window.location.href = 'deleteTournament/' + $id;
	}
}