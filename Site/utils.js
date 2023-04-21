
function fetcher(call_name, target_id, argument=[]) {
    var xhttp = new XMLHttpRequest;
    arg_mod = ""
    if (argument.length != 0) {
        for (a = 0; a < argument.length; a++){
            arg_mod = arg_mod + "&arg" + a + "=" + argument[a];
        }
    }
    xhttp.open("GET", "executor.php?" + call_name + "=true" + arg_mod);
    document.getElementById(target_id).innerText = "Working";
    xhttp.onload = function() {
        document.getElementById(target_id).innerHTML = xhttp.responseText;
    }
    xhttp.send();
    console.log("a:" + arg_mod);
}
