$(document).ready(function(){

    $("#lookup").click(function(){

        let c_name = $("#country").val();

        $.get("world.php", 
		{ 
		    country: c_name,
		    context: ""
		}).done(function(response){ 
		    let res = response; 
		    $('#result').html(res); 
		}).fail(function(){
            alert("There was an issue reaching the server");
        });
    });
    
    $("#lookup-cities").click(function(){
        let c_name = $("#country").val();
        let city = "cities"
        $.get("world.php", 
		{ 
		    country: c_name,
		    context: city
		}).done(function(response){ 
		    let res = response; 
		    $('#result').html(res); 
		}).fail(function(){
            alert("There was an issue reaching the server");
        });
    });
});