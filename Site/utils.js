
function fetcher(call_name, target_id, argument="") {
    var xhttp = new XMLHttpRequest;
    if (argument != "") {
        argument = "&arg=" + argument;
    }
    xhttp.open("GET", "executor.php?" + call_name + "=true" + argument);
    document.getElementById(target_id).innerText = "Working";
    xhttp.onload = function() {
        document.getElementById(target_id).innerHTML = xhttp.responseText;
    }
    xhttp.send();
}
