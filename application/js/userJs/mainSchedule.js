/*
* FROM USER ID, GET THE CONFERENCE ID, GET THE CONFERENCE INFORMATION
*/

$(document).ready(init);

async function init () 
{
  // Get the id and Name of the conference
  await startMainTable();
  await startUserTable();
}

function startMainTable()
{
	valuesToSelect = ["*"];
	tableNames = ["conference"];
	attrs = [];
	values = [];

	getRecord(valuesToSelect,tableNames,attrs,values,gotMainConference,"json","false")
}

function gotMainConference(data)
{
    var mainObj = {};
    for(i = 0; i<data.length;i++)
    {
        mainObj[i] = {
          id: data[i].conference_id,
          name: data[i].conference_name,
          dayStart: data[i].conference_startdate,
          dayEnd: data[i].conference_enddate
        }; 
    }

    var header1 = document.getElementById("h1");
    header1.textContent = mainObj[0].name;


    valuesToSelect = ["*"];
  	tableNames = ["event"];
	  attrs = ["conference_id"];
	  values = [mainObj[0].id];
    
    console.log(mainObj[0].id);

  	getRecord(valuesToSelect,tableNames,attrs,values,gotEventData,"json","false");
}

function gotEventData(data)
{
    console.log(data);

    if(data != null)
    {
      for( i = 0; i < data.length; i++)
      {
        var id = data[i].event_id;
        $("<tr><td>" + data[i].event_name + "</td><td>" + data[i].event_starttime + "</td><td>" + data[i].event_endtime + "</td><td><button type=\"Button\" onclick=\"onAddClick(" + id + ")\"> + </button></td></tr>").appendTo("#Conference tbody");
      }
    }
}

function onAddClick(data)
{
  var map = 
    {
      table_name: "user_schedule",
      attrs: ["event_id","conference_id"],
      values: [data,1001]
    };
 
    $.post("proxies/postProxy.php",map,successPost);
}

function successPost(data)
{
  console.log(data);
  startUserTable();
}