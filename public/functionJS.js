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
		var tr = document.createElement('tr');
		var td = document.createElement('td');
		td.setAttribute('colspan', '3');
		td.innerHTML = "<input type='text' name='equipe" + lastNumber + "' id='equipe" + lastNumber + "' placeholder='Equipe " + lastNumber + "' />";
		tr.appendChild(td);

		equipe.push(tr);
		div.appendChild(tr);
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