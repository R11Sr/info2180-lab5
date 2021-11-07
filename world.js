window.addEventListener('load',(event)=>{
    const LOOKUP_BUTTON = $("#lookup");
    const LOOKUP_CITIES_BUTTON = $("#lookup-cities");


    LOOKUP_BUTTON.on("click", e=>{
        let Fdata = {
            country: $("#country").val()
        };
        $.ajax({
            type: "GET",
            url: "world.php",
            data: Fdata,
            dataType: "html"
        }).done(response =>{
            $("#result").empty();
            $("#result").append(response);
            console.log("fetched look-up");
        }).fail(()=>{
                $("#result").empty();
                $("#result").append("<h3> Failed to fetch data from the server.</h3>");
                }
            )
            e.preventDefault();
    });

    LOOKUP_CITIES_BUTTON.on("click",e=>{
        let Fdata = {
            country: $("#country").val(),
            context: "cities"} // This to distingush this button. 

        console.log(Fdata);
        $.ajax({
            type: "GET",
            url: "world.php",
            data: Fdata,
            dataType: "html"
        }).done(response =>{
            $("#result").empty();
            $("#result").append(response);
            console.log("fetched look-up + cites");
        }).fail(()=>{
                $("#result").empty();
                $("#result").append("<h3> Failed to fetch data from the server.</h3>");
                }
            )
        e.preventDefault();

    });

});