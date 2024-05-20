
<div id="main">
    <div id="header">
        <h1>Dynamic Dependent Select Box in<br> PHP & jQuery Ajax</h1>
    </div>
    <div id="content">
        <form method="">
            <label>Country : </label>
            <select id="country">
                <option value="">Select Country</option>
            </select>
            <br><br>
            <label>State : </label>
            <select id="state">
                <option value=""></option>
            </select>
            <br><br>
            <label>City : </label>
            <select id="city">
                <option value=""></option>
            </select>
        </form>
    </div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        function loadData(type, category_id){
            $.ajax({
                url : "load-cs.php",
                type : "POST",
                data: {type : type, id : category_id},
                success : function(data){
                    if(type == "stateData"){
                        $("#state").html(data);
                        $("#city").html(""); // Reset city dropdown when changing state
                    } else if(type == "cityData"){
                        $("#city").html(data);
                    } else {
                        $("#country").append(data);
                    }
                }
            });
        }

        loadData();

        $("#country").on("change",function(){
            var country = $("#country").val();

            if(country != ""){
                loadData("stateData", country);
            } else {
                $("#state").html("");
                $("#city").html("");
            }
        });

        $("#state").on("change",function(){
            var state = $("#state").val();

            if(state != ""){
                loadData("cityData", state);
            } else {
                $("#city").html("");
            }
        });
    });
</script>

