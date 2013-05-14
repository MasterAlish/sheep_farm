$(document).ready(function(){
    initConsole();
    $("#console").focus();
});

function initConsole(){
    $("#console").keypress(function(e){
        if((e.keyCode|| e.which) == 13)
        {
            var kill = $("#kill").val();
            var from = $("#from").val();
            var to = $("#to").val();
            var yard = $("#yard").val();
            var move = $("#move").val();
            var create = $("#create").val();
            var into = $("#in").val();
            var youngest = $("#youngest").val();
            var oldest = $("#oldest").val();
            var refresh = $("#refresh").val();

            var killCommand = new RegExp(kill+'\\s+(?:(oldest|youngest)?\\s+|)(\\d+)\\s+'+from+'\\s+'+yard+'\\s+(\\d+)\\s*$', 'i');
            var moveCommand = new RegExp(move+'\\s+(\\d+)\\s+'+from+'\\s+'+yard+'\\s+(\\d+)\\s+'+to+'\\s+'+yard+'\\s+(\\d+)\\s*$', 'i');
            var createCommand = new RegExp(create+'\\s+(\\d+)\\s+'+into+'\\s+'+yard+'\\s+(\\d+)\\s*$', 'i');
            var refreshCommand = new RegExp(refresh+'\\s*$');

            var command = $(this).val();

            var found = command.match(killCommand);
            if(found) killFunction(found[1],found[2],found[3],command);else{
            found = command.match(moveCommand);
            if(found) moveFunction(found[1],found[2],found[3],command);else{
            found = command.match(createCommand);
            if(found) createFunction(found[1],found[2],command);else{
            found = command.match(refreshCommand);
            if(found) refreshFunction(); else{
            errorFunction();
            }}}}
        }
    })
}

function killFunction(age,count,yard, command){
    if(age == undefined) age="oldest";
    if(count>getYardLength(yard)) count= getYardLength(yard);
    $.ajax({
        dataType:'text',
        url:'/sheep/console/kill',
        data:{'age':age, 'count':count, 'yard':yard},
        success:function(result){
            if(result!="error"){
               $("#lamb_place"+yard).find(".lamb:nth-last-child(-n+"+count+")").remove();
               showSuccessMessage(command+" ("+count+")");
               fixYardSheepCount();
               raiseKilledSheep(count);
            }
        }
    })
}

function moveFunction(count,yard1,yard2, command){
    var yardCapacity =55;
    if(parseInt((count))>parseInt(getYardLength(yard1))) count= getYardLength(yard1);
    if(parseInt(count)+parseInt(getYardLength(yard2))>yardCapacity) count = yardCapacity-getYardLength(yard2);
    $.ajax({
        dataType:'text',
        url:'/sheep/console/move',
        data:{'count':count, 'from':yard1, 'to':yard2},
        success:function(result){
            if(result!="error"){
                $("#lamb_place"+yard1).find(".lamb:nth-last-child(-n+"+count+")").remove();
                raiseSheepCount(yard2,count);
                showSuccessMessage(command+" ("+count+")");
                fixYardSheepCount();
            }
        }
    })
}

function createFunction(count,yard, command){
    var yardCapacity =55;
    if(parseInt(count)+parseInt(getYardLength(yard))>yardCapacity) count = yardCapacity-getYardLength(yard);
    $.ajax({
        dataType:'text',
        url:'/sheep/console/create',
        data:{'count':count, 'yard':yard},
        success:function(result){
            if(result!="error"){
                raiseSheepCount(yard,count);
                showSuccessMessage(command+" ("+count+")");
                fixYardSheepCount();
            }
        }
    })
}

function refreshFunction(){
    $("#refresh_page").click();
}

function errorFunction(){
    showErrorMessage($("#incorrect_command").val());
}

function getYardLength(yard){
    return $("#lamb_place"+yard).children(".lamb").length;
}

function fixYardSheepCount(){
    for(var i=0;i<=4;i++){
        var label=  $("#count_yard"+i)
        label.text(label.parents(".yard").children(".lamb_place").children(".lamb").length);
    }
}

function showSuccessMessage(msg){
    $("#msg").removeClass();
    $("#msg").addClass("success");
    $("#msg").text(msg);
}

function showErrorMessage(msg){
    $("#msg").removeClass();
    $("#msg").addClass("error");
    $("#msg").text(msg);
}