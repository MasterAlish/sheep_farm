$(document).ready(function(){
    initAutoRefreshing();
    initKillButtons();

    $killed = getcookie("killed_sheep_count");
    if($killed)
        $("#killed").text($killed);

    $("#init_db").click(function(){
        setcookie("killed_sheep_count",0);
    })
});

function  initAutoRefreshing(){
    $("#refresh_page").click(function(){
        $.ajax({
            dataType: 'text',
            url: '/sheep/refresh',
            success:function($newGeneration){
                var $new = JSON.parse($newGeneration);
                for($i=1;$i<=4;$i++){
                    raiseSheepCount($i,$new[$i]);
                    fixYardSheepCount();
                }
            }
        });
        return false;
    });

    window.setInterval(function(){$("#refresh_page").click();}, 10000);
}

function raiseSheepCount(yard,count){
    for($j=0;$j<count;$j++){
        $("#lamb_place"+yard).append("<div class='lamb'></div>");
    }
}

function initKillButtons(){
    $(".kill").click(function(){
        $.ajax({
            dataType: "text",
            url: '/sheep/kill?yard='+$(this).attr('id'),
            success:function($yard){
                if($yard!="error"){
                    $("#lamb_place"+$yard).html("");
                    raiseKilledSheep($("#count_yard"+$yard).text());
                    $("#count_yard"+$yard).text("0");
                }
            }
        });
    })
}

function raiseKilledSheep(count){
    $("#killed").text(parseInt($("#killed").text())+parseInt(count));
    setcookie("killed_sheep_count",$("#killed").text());
}

function setcookie(name, value, expires, path, domain, secure){
    document.cookie =    name + "=" + escape(value) +
        ((expires) ? "; expires=" + (new Date(expires)) : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

function getcookie(name){
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;

    if (cookie.length > 0)    {
        offset = cookie.indexOf(search);
        if (offset != -1)        {
            offset += search.length;
            end = cookie.indexOf(";", offset)

            if (end == -1)
                end = cookie.length;

            setStr = unescape(cookie.substring(offset, end));
        }
    }
    return(setStr);
}