
// "Opens" the page in the background and inserts html into main document node/tag/id
function fetcher(call_name, target_id, argument=[], callback=() => {/* do nothing */}) {
    var xhttp = new XMLHttpRequest;
    // Passes arguments where it makes sense
    var arg_mod = ""
    if (argument.length != 0) {
        for (a = 0; a < argument.length; a++){
            arg_mod = arg_mod + "&arg" + a + "=" + argument[a];
        }
    }
    xhttp.open("GET", "executor.php?" + call_name + "=true" + arg_mod);
    // Finds target element
    var target = document.getElementById(target_id);
    target.innerText = "Working";

    xhttp.onload = function() {
        // Exchanges temorary text for loaded html
        target.innerText = "";
        var part = document.createElement("part");
        part.innerHTML = xhttp.responseText;
        target.appendChild(part);
        // Run any script tags
        for (a of target.getElementsByTagName("script")) {
            eval(a.innerHTML);
        }
        callback();
    }
    xhttp.send();
    
}

function setCookie(cname, cvalue) {
  document.cookie = cname + "=" + cvalue + ";";
}

function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
