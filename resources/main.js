function check(form, max)
{
	var used = new Array();
	var status = new Array();

	for(var i=1; i<=max; i++)
	{
		used[i] = document.getElementById('ranking_'+i).value;
	}

	for(var i=1; i<=max; i++)
	{
		status[i] = 'good';
		for(var z=1; z<=max; z++)
		{
			if(i != z)
			{
				if(used[i] == used[z])
				{
					status[i] = 'bad';
					status[z] = 'bad';
				}
			}
		}
	}

	var allOk = true;
	for(var i=1; i<=max; i++)
	{
		if(status[i] != 'good')
		{
			allOk = false;
			document.getElementById('status_'+i).innerHTML = "Duplicate";
		}
		else
		{
			document.getElementById('status_'+i).innerHTML = "";
		}
	}

	if(allOk)
	{
		changeStatus("OK to Submit");
	}
	else
	{
		changeStatus("Some Duplicates");
	}
}

function changeStatus(status)
{
	document.getElementById('allStatus').innerHTML = status;
}
