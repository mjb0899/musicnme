
//Tab links in artist profile
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

if (jQuery('#exampleInputFile').val() == '') {
    $('#file_responder').html("Please Attach File");
}else {
    alert('File Not accepted');
}
//ajax function to edit profile
function chk() {
    var firstname=document.getElementById('firstname').value;
    var lastname=document.getElementById('lastname').value;
    var email=document.getElementById('email').value;
    var psw=document.getElementById('psw').value;
    var dataString='firstname='+firstname+'&lastname='+lastname+'&email='+email+'&psw='+psw;
    $.ajax({
            type:"post",
            url:"updateProfile.php",
            data: dataString,
            cache:false,
            success:function (d) {
                if(d>0){
                    $("#test").html("Your changes have been saved.");
                    setTimeout(function(){
                            location.reload();
                        }
                        ,2000);
                }else if(d==0){
                    $("#test").html("Check Fields");
                }
                else{
                    $("#test").html("Not saved.");
                }
            }
        }
    );
    return false
}
//save status
/*
function savepost() {
    var status=document.getElementById('status_area').value;
    var dataString='status='+status;
    $.ajax({
            type:"post",
            url:"savepost.php",
            data: dataString,
            cache:false,
            success:function (d) {
                if(d>0){
                    alert("posted")
                }
                else{
                    alert("not posted")
                }
            }
        }
    );
    return false
}*/


function validate_password(){

    if(!document.getElementById("pwd").value==document.getElementById("rep_pwd").value)alert("Passwords do no match");
    return document.getElementById("pwd").value==document.getElementById("rep_pwd").value;
    return false;
}

