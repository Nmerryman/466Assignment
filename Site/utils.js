
function fetcher(call_name, target_id, argument=[]) {
    var xhttp = new XMLHttpRequest;
    var arg_mod = ""
    if (argument.length != 0) {
        for (a = 0; a < argument.length; a++){
            arg_mod = arg_mod + "&arg" + a + "=" + argument[a];
        }
    }
    xhttp.open("GET", "executor.php?" + call_name + "=true" + arg_mod);
    var target = document.getElementById(target_id);
    target.innerText = "Working";
    xhttp.onload = function() {
        target.innerText = "";
        var part = document.createElement("div");
        part.innerHTML = xhttp.responseText;
        target.appendChild(part);
    }
    xhttp.send();
    console.log("a:" + arg_mod);
}
