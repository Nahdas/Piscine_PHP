function getCookie(name){
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1){
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1){
            end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
}

$(function(){
    var myCookie = getCookie("todo");
    if (myCookie == null)
        return;
    else
    {
        $("#ft_list").html(myCookie);
        var TabDiv = $("#ft_list").children().on("click", function(){
            if (confirm("Do you really want to remove that item ?"))
            {
                this.remove();
                var n_myCookie = getCookie("todo");
                var n_d = new Date();
                n_d.setTime(n_d.getTime() + (1*24*60*60*1000));
                var n_expires = "expires="+ n_d.toGMTString();
                var n_cook = $("#ft_list").html();
                document.cookie = encodeURI("todo=" + n_cook + ";" + n_expires);
            }
            else
                return false;
        });
        }
    }
);

$(document).ready(function(){
    $("#butt").on("click",
    function (event){
    var task = prompt("Enter new todo item");
    if (task != null && task != ""){
        var $iDiv = $(document.createElement('div'));
        $iDiv.attr("class", "taski"); 
        $iDiv.text("-" + task);
        $iDiv.on("click", function(){
            if (confirm("Do you really want to remove that item ?"))
            {
                this.remove();
                var n_myCookie = getCookie("todo");
                var n_d = new Date();
                n_d.setTime(n_d.getTime() + (1*24*60*60*1000));
                var n_expires = "expires="+ n_d.toGMTString();
                var n_cook = $("#ft_list").html();
                document.cookie = encodeURI("todo=" + n_cook + ";" + n_expires);
            }
            else
                return false;
        });
        $("#ft_list").prepend($iDiv);
        var myCookie = getCookie("todo");
        if (myCookie == null)
        {
            var d = new Date();
            d.setTime(d.getTime() + (1*24*60*60*1000));
            var expires = "expires="+ d.toGMTString();
            var cook = $("#ft_list").html();
            document.cookie = encodeURI("todo=" + cook + ";" + expires);
        }
        else
        {
            var d = new Date();
            d.setTime(d.getTime() + (1*24*60*60*1000));
            var expires = "expires="+ d.toGMTString();
            var cook = $("#ft_list").html();
            document.cookie = encodeURI("todo=" + cook + ";" + expires);
        }
    }
    });
});