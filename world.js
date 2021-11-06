window.addEventListener('load',(event)=>{
    const LOOKUP_BUTTON = $("#lookup");

    LOOKUP_BUTTON.on("click", e=>{
        let Fdata = {
            country: $("#country").val()
        };
        console.log(Fdata);
        $.ajax({
            type: "GET",
            url: "world.php",
            data: Fdata,
            dataType: "html"
        }).done(response =>{
            $("#result").empty();
            $("#result").append(response);
        }).fail(()=>{
                $("#result").empty();
                $("#result").append("<h3> Failed to fetch data from the server.</h3>");
                }
            )
            e.preventDefault();
    });

});