
function fetcher(call_name, target_id) {
    var xhttp = new XMLHttpRequest;
    xhttp.open("GET", "executor.php?" + call_name + "=true");
    document.getElementById(target_id).innerText = "Working";
    xhttp.onload = function() {
        document.getElementById(target_id).innerHTML = xhttp.responseText;
    }
    xhttp.send();
}
