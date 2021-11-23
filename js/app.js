"use strict";
/*
   Achtung - wichtige Hinweise:
   -----------------------------------------------------------------------------
   1) Sollte VSC jQuery nicht kennen, dann müssen die Typen erst importiert werden
      Führen Sie dazu Folgendes im Terminal von VSC aus:
         npm install --save @types/jquery
   2) Fehlermeldung beim Ausführen von Ajax-Requests:
      "Quellübergreifende (Cross-Origin) Anfrage blockiert: Die Gleiche-Quelle-Regel verbietet das Lesen der externen Ressource ..."
      --> das passiert wenn Client und Server von unterschiedlichen Quellen kommen
          (z.B. Client: http://localhost:3000/...
                Server: http://localhost:80/... )
      --> dann muss für den Server angegeben werden, dass er das Ergebnis ausliefern darf
      --> Erstellen einer .htaccess - Datei im Verzeichnis der anzusprechenden PHP-Datei mit folgendem Inhalt:
          Header set Access-Control-Allow-Origin "*"
*/
// Settings: Server
var restServer = "http://localhost/SemesterprojektSS2021/Backend/serviceHandler.php";

function addItem() { //append list element
    $.getJSON(restServer, 
        { 'method': 'getAppointments' }, 
        function (data) {
           var key = 0;
            while(1)
            {
               if (data.hasOwnProperty(key))
               {
                  var result = data[key];
                  // here you have access to
                  var ort = result[0].ort;
                  var titel = result[0].titel;
                  var ablaufdatum = result[0].ablaufdatum;
                  var dauer = result[0].dauer;
                  var id = result[0].id;
               } else {
                   break;
               }
               key++;
               let currentdate = new Date();
               let checkDate = new Date(ablaufdatum);
               if(checkDate > currentdate) //grays out passed Appointments
               {
                $("ul").append("<li id='list" + id + "' class='list-group-item list-group-item-info'><div id=" + id + " onclick='showDetails(this.id);'<p>Titel: " + titel + "</p><p>Ort: " + ort + "</p><p>Ablaufdatum: " + ablaufdatum + "</p><p>Dauer: " + dauer + " min</p></div></li>");
                $("#list" + id).append("<div class='container' id='delteButton'><button type='button' id='deleteBtn' class='btn btn-danger' onclick='deleteApp("+id+");'>Delete Appointment</button></div>")
               }
               else
               {
                $("ul").append("<li id='list" + id + "' class='list-group-item list-group-item-dark'><div id=" + id + " onclick='showDetails(this.id);'<p>Titel: " + titel + "</p><p>Ort: " + ort + "</p><p>Ablaufdatum: " + ablaufdatum + "</p><p>Dauer: " + dauer + " min</p></div></li>");
                $("#list" + id).append("<div class='container' id='delteButton'><button type='button' id='deleteBtn' class='btn btn-danger' onclick='deleteApp("+id+");'>Delete Appointment</button></div>")
               }
               
            }
        }
    );
}
function showDetails(id){
    $("#" + id).attr("onclick","unshowDetails(this.id);");

    let AppId = null;

    //Hohlt die Beschreibung und erstellt das Termin-Div
    $.ajax(
        {
        url: restServer,
        async: false,
        dataType: "json",
        data: { method: "getAppointmentFromID", param: id },
        success: function (data) {
            var beschreibung = data[0].beschreibung;
            AppId = data[0].id;

            if(beschreibung){
                $("#list" + AppId).append("<div class='container' id='beschreibung" + id + "'><h5>Beschreibung:</h5><p>" + beschreibung + "</p></div>")
            }
            
            $("#list" + AppId).append("<div class='container' id='TermineDiv" + id + "'></div>")
            $("#TermineDiv" + AppId).append("<table class='table-responsive table' id='TermineTable" + id + "'><thead><tr id='1Tr"+id+"'><th></th>")

            //adds horizontal scrollbar to table
            $(document).ready(function () { $('#TermineTable').DataTable({"scrollX": true})})     
        }}
    );
    
    let terminCounter = null;
    /* Da die Tabelle nach Datum/Zeit sortiert wird (was dafür sorgen kann dass In der Reihenfolge z.B. TerminID 2 vor 1 steht, wenn dieser danach eingegeben wurde),
    muss für die InputCheckboxen registiert werden, in welcher Reigenfolge die Termine wirklich sind (von links nach rechts in der Tabelle). Dies wird durch das
    terminIDarray gespeichert */
    let terminIDarray = [];
    var TerminMax = 0;

    //create top tabel rows with date and time
    $.ajax(
        {
        url: restServer,
        async: false,
        dataType: "json",
        data: { method: "getTimeslotsForAppointments", param: id },
        success: function (data) {
            let key = 0;
            terminCounter = 0;

            //create top tabel rows with date and time
            while(1)
            {
                if (data.hasOwnProperty(key))
                {
                        let result = data[key];
                        let datum = result[0].datum;
                        let uhrzeit = result[0].uhrzeit;
                        let terminID = result[0].terminID;
                        if(terminID > TerminMax){
                            TerminMax = terminID
                        }
                        terminIDarray[key] = terminID;
                        terminCounter++;

                        $("#1Tr"+id).append("<th>"+datum+"<br>"+uhrzeit+"</th>")

                } else {
                    break;
                }
            key++;
            }

            $("#TermineTable" + id).append("</tr></thead><tbody>")
        }}
    );  

    //adds existing entries and create the checkboxes
    $.ajax(
        {
        url: restServer,
        async: false,
        dataType: "json",
        data: { method: "getVotes", param: id },
        success: function (data) {
            let key = 0;
            let trCounter = 2;
            let previousName = "testStringPleaseDoNotNameYourUserLikeThat";

            //create Checkboxes for each User
            while(1)
            {
                if (data.hasOwnProperty(key))
                {

                    let result = data[key];
                    let name = result[0].name;

                    if(previousName == name){
                        key++;
                        continue;
                    }
                    previousName = name;

                    let currentTerminIDarray = terminIDarray;
                    $("#TermineTable" + id).append("<tr id='"+trCounter+"Tr"+id+"'>")
                    $("#"+trCounter+"Tr"+id).append("<th>"+name+"</th>")
                    for(let i = 0; i < terminCounter;i++){
                        $("#"+trCounter+"Tr"+id).append("<th><input id='"+id+"row"+trCounter+"checkBox"+currentTerminIDarray[i]+"' disabled='disabled' type='checkbox'></th>")
                    }
                    trCounter++;
                    $("#TermineTable" + id).append("</tr>")

                } else {
                    break;
                }
                key++;
            }
            
            //fill the Checkboxes
            key = 0;
            trCounter = 2;
            while(1)
            {
                if (data.hasOwnProperty(key))
                {
                    let result = data[key];
                    let termin = result[0].terminID;
                    let name = result[0].name;
                    let currentTerminIDarray = terminIDarray;
                    for(let i = 0; i < terminCounter;i++){
                        if(currentTerminIDarray[i] == termin){
                            document.getElementById(id+"row"+trCounter+"checkBox"+currentTerminIDarray[i]).checked = true;
                            break;
                        } 
                    }

                    if(data[key+1] == null){
                        break;
                    }
                    let nextName = data[key+1];
                    nextName = nextName[0].name;

                    if(nextName == name){
                        //do nothing
                    } else{
                        trCounter++;
                    }

                } else {
                    break;
                }
                key++;
            }

        }}
    );

    //Gibt Textfeld für Username-eingabe und die leeren Checkoxen zu jedem Termin aus
    let trCounter = 2;
    let currentTerminIDarray = terminIDarray;
    let temp = document.getElementById("list"+id)
    $("#TermineTable" + id).append("<tr id='inputTr"+id+"'>")
    if(temp.classList.contains("list-group-item-dark"))
    {
        $("#inputTr"+id).append("<th>Name: <br><input id ='inputText"+id+"' type='text' class='form-control' disabled></th>")
        for(let i = 0; i < terminCounter;i++){
            $("#inputTr"+id).append("<th><br><input id='"+id+"rowInputcheckBox"+currentTerminIDarray[i]+"' type='checkbox' disabled></th>")
        }
    }
    else
    {
        $("#inputTr"+id).append("<th>Name: <br><input id ='inputText"+id+"' type='text' class='form-control'></th>")
        for(let i = 0; i < terminCounter;i++){
            $("#inputTr"+id).append("<th><br><input id='"+id+"rowInputcheckBox"+currentTerminIDarray[i]+"' type='checkbox'></th>")
        }
    }
    trCounter++;
    $("#TermineTable" + id).append("</tr>")

    //Gibt Textfeld fürs Kommentar an + saveChanges button   
    if(temp.classList.contains("list-group-item-dark"))
    {
        $("#list" + AppId).append("<div class='container' id='Kommentare" + id + "'></div>")
        $("#Kommentare" + AppId ).append("<label for='comment'>Kommentar(optional, up to 500 characters):</label><br><textarea rows='4' id='comment"+id+"' disabled class='form-control w-75'name='comment' maxlength='500'></textarea><button onclick='saveChanges("+AppId+","+TerminMax+")' type='button' class='btn btn-info CommentButton'>Änderungen speichern</button><br>")
    
    }
    else
    {
        $("#list" + AppId).append("<div class='container' id='Kommentare" + id + "'></div>")
        $("#Kommentare" + AppId ).append("<label for='comment'>Kommentar(optional, up to 500 characters):</label><br><textarea rows='4' id='comment"+id+"' class='form-control w-75'name='comment' maxlength='500'></textarea><button onclick='saveChanges("+AppId+","+TerminMax+")' type='button' class='btn btn-info CommentButton'>Änderungen speichern</button><br>")    
    }

    //Zeigt alle bisherigen Kommentare an
    $.ajax(
        {
        url: restServer,
        async: false,
        dataType: "json",
        data: { method: "getComments", param: id },
        success: function (data) {
            var key = 0;
            while(1)
            {
            if (data.hasOwnProperty(key))
            {
                let result = data[key];
                var name = result[0].Name;
                var text = result[0].Text;
            } else {
                break;
            }
            key++;
            $("#Kommentare" + id ).append("<div class='border border-dark rounded paddingComment'><p>Name: " + name + "</p><p>" + text + "</p></div>")
            }
        }}
    );

}

//Versteckt die Details für das gewählte, bereits geöffnete Appointment
function unshowDetails(id)
{
    $("#" + id).attr("onclick","showDetails(this.id);"); //löscht alle Details
    if(document.getElementById("beschreibung"+ id))
    {
        var node= document.getElementById('beschreibung' + id );
        node.remove();
    }
    
    var otherNode2 = document.getElementById('TermineTable' + id);
    var otherNode3 = document.getElementById('TermineDiv' + id);
    var otherNode = document.getElementById('Kommentare' + id);
    
    otherNode2.remove();
    otherNode3.remove();
    otherNode.remove();
    
}

var counter1;
function addAppointment()
{
    counter1 = 1;
    $("#add").append("<label for='titel'>Titel: </label><input type='text' id='titel' name='titel'><br><label for='ort'>Ort:</label><input type='text' id='ort' name='ort'><br><label for='ablaufdatum'>Ablaufdatum:</label><input type='datetime-local' id='ablaufdatum' name='ablaufdatum'>")
    $("#add").append("<br><label for='dauer'>Dauer (in minutes):</label><input type='number' id='dauer' name='dauer'><br><label for='beschreibung'>Beschreibung</label><br><textarea rows='10' cols='30' id='beschreibung' name='beschreibung' maxlength='5000'></textarea>")
    newTimeslot();
    $("#newAppointment").attr("onclick","wegDamit()");
} 

//Entfernt die Eingabemaske von addAppointment nach Bestätigung
function wegDamit()
{
    let node = document.getElementById("add")
    while(node.lastElementChild)
    {
        node.removeChild(node.lastElementChild);
    }
    $("#newAppointment").attr("onclick","addAppointment()");
}

//Fügt eine neue Timeslot Eingabemöglichkeit hinzu
function newTimeslot()
{
    if(counter1 > 1)
    {
        let temp = counter1 - 1;
        let node1 = document.getElementById("uploadBtn")
        let node2 = document.getElementById("newTime"+temp)
        node1.remove()
        node2.remove()
    }
    $("#add").append("<p>Termin "+counter1+"</p>")
    $("#add").append("<label for='termin'>Datum: </label><input type='date' name='termin' id='termin"+ counter1 +"'><br><label for='starttime'>Startzeit: </label><input type='time' name='starttime' id='starttime"+ counter1+"'><br><button type='button' onclick='newTimeslot()' class='btn btn-dark' id='newTime"+counter1+"'>New Timeslot</button>")
    $("#add").append("<br><button type='button' onclick='upload()' class='btn btn-success' id='uploadBtn'>Submit Appointment</button>")
    counter1++
}

//Upload Appointment
function upload(){
    let title = document.getElementById("titel").value;
    let ort = document.getElementById("ort").value;
    let ablaufdatum = document.getElementById("ablaufdatum").value;
    let dauer = document.getElementById("dauer").value;
    let beschreibung = document.getElementById("beschreibung").value;

    if(title == "" || ort == "" || ablaufdatum == "" || dauer == ""){
        alert("Bitte überprüfen Sie ihre Angaben auf Korrektheit !");
        return;
    }

    //Checkt ein Timeslot eingegeben wurde
    let datum = document.getElementById("termin1").value;
    let uhrzeit = document.getElementById("starttime1").value;
    if (!datum) {  
        alert("Bitte geben Sie einen Timeslot an !");            
        return;
    } else if (!uhrzeit){
        alert("Bitte geben Sie einen Timeslot an !");  
        return;
    }

    let jsonthing = '{"appid": 0, "titel": "'+title+'", "ort": "'+ort+'", "ablaufdatum": "'+ablaufdatum+'", "status": 1, "beschreibung": "'+beschreibung+'", "dauer": '+dauer+'}';
    var appIDadd = 0;

    $.ajax(
        {
        url: restServer,
        async: false,
        data: { method: "addAppointment", param: jsonthing },
        success: function (result) {
            $.ajax(
                {
                url: restServer,
                async: false,
                dataType: "json",
                data: { method: "getLatest", param: jsonthing },
                success: function (data) {
                    let ort2 = data[0].ort;
                    let titel2 = data[0].titel;
                    let ablaufdatum2 = data[0].ablaufdatum;
                    let dauer2 = data[0].dauer;
                    let id2= data[0].id;
                    appIDadd = id2;
                    $("ul").prepend("<li id='list" + id2 + "' class='list-group-item list-group-item-info'><div id=" + id2 + " onclick='showDetails(this.id);'<p>Titel: " + titel2 + "</p><p>Ort: " + ort2 + "</p><p>Ablaufdatum: " + ablaufdatum2 + "</p><p>Dauer: " + dauer2 + " min</p></div></li>");
                    $("#list" + id2).append("<div class='container' id='delteButton'><button type='button' id='deleteBtn' class='btn btn-danger' onclick='deleteApp("+id2+");'>Delete Appointment</button></div>")
                }
            });
        }
    });

    //Looped durch alle Termine und fügt sie in die Datenbank ein
    let coolerCounter = 0;
    while(coolerCounter < counter1){
        coolerCounter++;
        if(!document.getElementById("termin"+coolerCounter))
        {
            break;
        }
        let datum = document.getElementById("termin"+coolerCounter).value;
        let uhrzeit = document.getElementById("starttime"+coolerCounter).value;
        if (!datum) {              
            continue;
        } else if (!uhrzeit){
            continue;
        }

        jsonthing = '{"datum": "'+datum+'", "uhrzeit": "'+uhrzeit+'", "appid": "'+appIDadd+'"}';

        $.ajax(
            {
            url: restServer,
            async: false,
            data: { method: "addTimeslot", param: jsonthing },
        });
    }
    wegDamit();
}

//Upload von Terminauswahl + (optionales)Kommentar des Users
function saveChanges(id,TerminMax){
    let comment = document.getElementById("comment"+id).value;
    let user = document.getElementById("inputText"+id).value;
    let jsonthing;

    if(!user){
        alert("Keine Eingabe zum User vorhanden !");
        return;
    }

    var counter = 0;
    while(counter < TerminMax){
        counter++
        if ($("#"+id+"rowInputcheckBox"+counter).length > 0) {
            if(document.getElementById(id+"rowInputcheckBox"+counter).checked){
                jsonthing = '{"appid": '+id+', "terminid": '+counter+', "name": "'+user+'"}';
                $.ajax(
                    {
                    url: restServer,
                    async: false,
                    data: { method: "saveVote", param: jsonthing },
                });
            }
        } 
    }

    if(comment){
        jsonthing = '{"appid": '+id+', "kommid": 0, "name": "'+user+'", "text": "'+comment+'"}';

        $.ajax(
            {
            url: restServer,
            async: false,
            data: { method: "addComment", param: jsonthing },
        });
    }

    unshowDetails(id)
    showDetails(id)
}

//Löscht das gewählte Appointment
function deleteApp(id)
{
    $.getJSON(restServer, 
        { param : id, 'method': 'deleteAppointment' }, 
        function (data) {
            
        }
    );
    $("#list" + id).remove();
}
