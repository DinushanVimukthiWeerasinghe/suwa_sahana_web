
$(document).ready(function(){
    $('[data-bs-toggle="popover"]').popover();
});
$(document).ready(function () {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
});

function openDel(error=1,sqlerror) {
    if(error===1) {
        document.getElementById("ico").src = "../assests/images/admin.png";
    }else {
        document.getElementById("ico").src = "../assests/images/error.png";
    }
    document.getElementById("ico").style.width="10%";
    document.getElementById("ico").style.height="10%";
    document.getElementById("myNav").style.width = "100%";
    document.getElementById("msg").innerHTML="Query Execution Failed!";
    document.getElementById("Database_Error").innerHTML=sqlerror;
    document.getElementById("Database_Error").style.color="red";
}
function openRed(sqlerror) {
    document.getElementById("ico").src="../assests/images/dberror.png";
    document.getElementById("ico").style.width="10%";
    document.getElementById("ico").style.height="10%";
    document.getElementById("myNav").style.width = "100%";
    document.getElementById("msg").innerHTML="Query Execution Failed!";
    document.getElementById("Database_Error").innerHTML=sqlerror;
    document.getElementById("Database_Error").style.color="red";
}
function openNav(success,sqlerror) {
    document.getElementById("myNav").style.width = "100%";
    document.getElementById("ico").style.maxWidth = "10%";
    document.getElementById("ico").style.maxHeight = "10%";

    if(success===1)
    {
        document.getElementById("ico").src="../assests/images/success.png";
        document.getElementById("msg").innerHTML="Query Successfully Executed!";

    }else if(success===0)
    {
        document.getElementById("ico").src="../assests/images/error.png";
        document.getElementById("msg").innerHTML="Query Execution Failed!";
        document.getElementById("Database_Error").innerHTML=sqlerror;
        document.getElementById("Database_Error").style.maxWidth="100%";
        document.getElementById("Database_Error").style.top="10%";
        document.getElementById("Database_Error").style.color="pink";
    }
    else if(success===2){
        document.getElementById("ico").src="../assests/images/choice.png";
        document.getElementById("msg").innerHTML="";
    }


  }

  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }