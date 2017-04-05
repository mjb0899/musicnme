
$("button#loginbtn").click( function() {

    if( $("#exampleInputEmail1").val() == "" || $("#exampleInputPassword1").val() == "" )
        $("div#ack").html("Please enter both username and password");
    else
        $.post( $("#myform").attr("action"),
            $("#myform :input").serializeArray(),
            function(data) {
                $("div#ack").html(data);
            });

    $("#myform").loginbtn( function() {
        return false;
    });

});
