function checkEmail() {
    const target = document.querySelector('#email');

    // reset the form
    let all = document.querySelectorAll("*");
    for (let i = 0; i < all.length; i++) {
        all[i].style = "";
    }


    let warning = document.querySelectorAll(".warn");
    for (let i = 0; i < warning.length; i++) {
        warning[i].parentNode.removeChild(warning[i]);
    }


    // check email
    var email = document.getElementById("email").value;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        return true;
    } else {
        let warnElement = document.createElement("div");
        warnElement.classList.add("warn");
        warnElement.innerHTML = "❌ Email address should be non empty with the format xyx@xyz.xyz.";
        target.parentNode.appendChild(warnElement);
        target.style.borderColor = "red";
        return false;
    }
}


function checkLoginName() {
    const target = document.querySelector('#login');
    if (target.parentNode.childElementCount > 2) {
        target.style.borderColor = "grey";
        target.parentNode.removeChild(target.parentNode.lastElementChild);
    }
    // target.childNodes.remove;
    // check login name
    var loginName = document.getElementById("login").value;
    if (loginName == "" || loginName.length > 20) {
        let warnElement = document.createElement("div");
        warnElement.classList.add("warn");
        warnElement.innerHTML = "❌ User name should be non-empty, and within 20 characters long.";
        target.parentNode.appendChild(warnElement);
        target.style.borderColor = "red";
        return false;
    } else {
        loginName = loginName.toLowerCase();
        document.getElementById("login").value = loginName;
        return true;
    }

}

function checkPassword() {

    const target = document.querySelector('#pass');
    if (target.parentNode.childElementCount > 2) {
        target.style.borderColor = "grey";
        target.parentNode.removeChild(target.parentNode.lastElementChild);
    }

    // check password format
    var password = document.getElementById("pass").value;
    if ((/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{6,}$/).test(password)) {
        return true;
    } else {
        let warnElement = document.createElement("div");
        warnElement.classList.add("warn");
        warnElement.innerHTML = "❌ Password should be at least 6 characters: 1 uppercase, 1 lowercase.";
        target.parentNode.appendChild(warnElement);
        target.style.borderColor = "red";
        return false;
    }
}

function passEqual() {

    const target = document.querySelector('#pass2');
    if (target.parentNode.childElementCount > 2) {
        target.style.borderColor = "grey";
        target.parentNode.removeChild(target.parentNode.lastElementChild);
    }

    // check retyped password format  
    var password = document.getElementById("pass").value;
    var password2 = document.getElementById("pass2").value;
    if (password != password2 || password2 == "") {
        let warnElement = document.createElement("div");
        warnElement.classList.add("warn");
        warnElement.innerHTML = "❌ Please retype password.";
        target.parentNode.appendChild(warnElement);
        target.style.borderColor = "red";
        return false;
    } else {
        return true;
    }
}

function termAgree() {
    const target = document.querySelector('#terms');
    if (target.parentNode.childElementCount > 2) {
        target.parentNode.removeChild(target.parentNode.lastElementChild);
    }

    let subCheckbox = document.getElementById("terms");
    if (subCheckbox.checked) {
        return true;
    } else {
        let warnElement = document.createElement("span");
        warnElement.classList.add("warn");
        warnElement.innerHTML = "<br>❌ Please accept the terms and conditions.";
        target.parentNode.appendChild(warnElement);
        return false;
    }

}

function registerValidate() {

    var emailSuccess = checkEmail();
    var loginSuccess = checkLoginName();
    var passSuccess = checkPassword();
    var pass2Success = passEqual();
    var termSuccess = termAgree();

    if (emailSuccess == false || loginSuccess == false || passSuccess == false || pass2Success == false || termSuccess == false) {
        return false;
    } else {
        return true;
    }
}


