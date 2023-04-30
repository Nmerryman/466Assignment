
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

function show_current_login() {
    var e = document.getElementById("nav_area");
    if (!e) {
        return;
    }
    e.innerHTML = "";

    var login_state;
    if (getCookie("uid")) {
        login_state = "Logged in as " + getCookie("uname") + "(" + getCookie("uid") + ")";
    } else {
        login_state = "Not logged in";
    }

    var header = document.createElement("template");
    var skeleton = `
    <div class="nav_header">
        <div id="link_div">
        <a class="button nav_button" href="https://students.cs.niu.edu/~z1963771/466Assignment/Site/index.html">Home Page</a>
        <a class="button nav_button" href="https://students.cs.niu.edu/~z1963771/466Assignment/Site/user.html">Request Songs</a>
        <a class="button nav_button" href="https://students.cs.niu.edu/~z1963771/466Assignment/Site/dj.html">DJ Interface</a>
        </div>
        <div id="login_div">
        ${login_state}
        <input class="nav_button" type="button" value="Login" onclick="to_login()">
        <input class="nav_button" type="button" value="Logout" onclick="delete_cookies()">
        </div>
    </div>`;
    header.innerHTML = skeleton.trim();
    
    e.appendChild(header.content.firstChild);
}

function delete_cookies() {
    setCookie("uid", "");
    setCookie("uname", "");
    setCookie("prev_page", "");
    show_current_login();
}

function to_login() {
    setCookie("prev_page", window.location.href);
    window.location.href = "https://students.cs.niu.edu/~z1963771/466Assignment/Site/login.html";
}

function select_t_row(tid, row_num) {
    var rules = document.styleSheets[0]
    for (var i = 0; i < rules.cssRules.length; i++) {
        if (rules.cssRules[i].selectorText.startsWith(`#${tid} tbody tr td.row`, 0)) {
            rules.deleteRule(i);
        }
    }
    // console.log(rules.cssRules[0].selectorText.startsWith(`#${tid} tbody tr td.row`));
    rules.insertRule(`#${tid} tbody tr td.row${row_num} {background: blue;}`)
    selected = [tid, row_num];
    // console.log(document.styleSheets);
}

function get_t_row() {
    var temp = document.getElementById(selected[0]);
    var options = temp.childNodes[1].childNodes;
    for (var i = 0; i < options.length; i++) {
        // console.log(options[i].childNodes[0].className, options[i].childNodes[0].className.startsWith(`row${selected[1]}`));
        if (options[i].childNodes[0].className.startsWith(`row${selected[1]}`)) {
            return options[i].childNodes;
        }
    }
}
