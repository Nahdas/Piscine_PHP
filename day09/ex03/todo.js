    var maxid = 0;
    $(function(){
        $.ajax({
            type: "GET",
            url: "select.php",
            dataType: "json",
        }).done(function(data){
        var myItems = new Array();
        myItems = data;
        if (myItems == null)
            return;
        else
        {
            for(var i = 0; i < myItems.length; i++){
                var item = document.createElement('div');
                item.id = myItems[i][0];
                if (parseInt(myItems[i][0]) > maxid)
                    maxid = myItems[i][0];
                item.className = "task";
                item.textContent = myItems[i][1];
                item.addEventListener("click", function(){
                    if (confirm("Do you really want to remove that item ?"))
                    {
                        var id = this.id;
                        $.ajax({
                            type: "GET",
                            url: "delete.php",
                            data: {id:id},
                        });
                        this.remove();
                    }
                    else
                        return false;
                });
                $("#ft_list").prepend(item);
            }
            maxid++;
        }});
        $(document).ready(function add(){
        $("#butt").on("click",
        function (event){
        var task = prompt("Enter new todo item");
        if (task != null && task != ""){
            var $iDiv = $(document.createElement('div'));
            $iDiv.attr("id", maxid);
            $iDiv.attr("class", "task");
            $iDiv.text("-" + task);
            $iDiv.on("click", function(){
                if (confirm("Do you really want to remove that item ?"))
                {
                    var id = this.id;
                    $.ajax({
                        type: "GET",
                        url: "delete.php",
                        data: {id:id},
                    });
                    this.remove();
                }
                else
                    return false;
            });
            maxid++;
            var numb =  $iDiv.attr("id");
            var item = $iDiv.text();
            $("#ft_list").prepend($iDiv);
            $.ajax({
                type: "POST",
                url: "insert.php",
                dataType: "json",
                data: {id: numb, name: item},
                }).done(function (){
                    return(true);
                }
            );
        }
        });
    })});