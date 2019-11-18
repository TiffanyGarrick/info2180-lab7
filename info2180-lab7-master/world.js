// Javascript File
function lookup_f(){
    var q = document.getElementById("country").value;
    var request = new XMLHttpRequest();
//    request.open('GET', 'world.php');
//    request.send(null);
    request.onreadystatechange = function () { 
        if (request.readyState === 4) {
            document.getElementById('result').innerHTML = request.responseText;
            //alert(request.responseText);
            //document.getElementById('result').style.display = 'none';
        }
    };
    if(q!=null){
        var reply = "world.php?country="+q;
    }
    request.open("GET",reply,true);
    request.send("");
}