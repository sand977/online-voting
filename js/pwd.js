
function myfun(){
    var x = document.getElementById("myInput");
    var y = document.getElementById("open");
    var z = document.getElementById("close");
    if(x.type === "password"){
        x.type = "text";
        y.style.display = "none";
        z.style.display = "block";
        
    
    }
     
    else{
        x.type = "password";
        y.style.display = "block";
        z.style.display = "none";
    }

}


