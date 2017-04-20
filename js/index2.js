/**
 * Created by ADMIN on 20/04/2017.
 */
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
}
