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

window.onload = display_todo;

function display_todo(){
    var myCookie = getCookie("todo");
    if (myCookie == null)
        return;
    else
    {
        document.getElementById("ft_list").innerHTML = myCookie;
        var TabDiv = document.getElementById("ft_list").children;
        for(var i = 0; i < TabDiv.length; i++){
            TabDiv[i].addEventListener("click", function(){
            if (confirm("Do you really want to remove that item ?"))
            {
                this.remove();
                var n_myCookie = getCookie("todo");
                var n_d = new Date();
                n_d.setTime(n_d.getTime() + (1*24*60*60*1000));
                var n_expires = "expires="+ n_d.toGMTString();
                var n_cook = document.getElementById("ft_list").innerHTML;
                document.cookie = encodeURI("todo=" + n_cook + ";" + n_expires);
            }
            else
                return false;
        });
        }
    }
}

function new_task(){
    var task = prompt("Enter new todo item");
    if (task != null && task != ""){
        var iDiv = document.createElement('div');
        iDiv.id = "task"; 
        iDiv.textContent = "-" + task;
        iDiv.addEventListener("click", function(){
            if (confirm("Do you really want to remove that item ?"))
            {
                this.remove();
                var n_myCookie = getCookie("todo");
                var n_d = new Date();
                n_d.setTime(n_d.getTime() + (1*24*60*60*1000));
                var n_expires = "expires="+ n_d.toGMTString();
                var n_cook = document.getElementById("ft_list").innerHTML;
                document.cookie = encodeURI("todo=" + n_cook + ";" + n_expires);
            }
            else
                return false;
        });
        document.getElementById("ft_list").prepend(iDiv);
        var myCookie = getCookie("todo");
        if (myCookie == null)
        {
            var d = new Date();
            d.setTime(d.getTime() + (1*24*60*60*1000));
            var expires = "expires="+ d.toGMTString();
            var cook = document.getElementById("ft_list").innerHTML;
            document.cookie = encodeURI("todo=" + cook + ";" + expires);
        }
        else
        {
            var d = new Date();
            d.setTime(d.getTime() + (1*24*60*60*1000));
            var expires = "expires="+ d.toGMTString();
            var cook = document.getElementById("ft_list").innerHTML;
            document.cookie = encodeURI("todo=" + cook + ";" + expires);
        }
    }
}