
function disable(){


    document.getElementById('userId').disabled = true;
    document.getElementById('realName').disabled = true;
    document.getElementById('birthDate').disabled = true;
    document.getElementById('Email').disabled = true;
    document.getElementById('phone').disabled = true;
    document.getElementById('fax').disabled = true;
    document.getElementById('address').disabled = true;
    document.getElementById('cardNum').disabled = true;
    document.getElementById('expDate').disabled = true;
    document.getElementById('cardName').disabled = true;
    document.getElementById('bank').disabled = true;

    document.getElementById('submitBut').style.display = 'block';

}


function enable(){

    document.getElementById('userId').disabled = false;
    document.getElementById('realName').disabled = false;
    document.getElementById('birthDate').disabled = false;
    document.getElementById('Email').disabled = false;
    document.getElementById('phone').disabled = false;
    document.getElementById('fax').disabled = false;
    document.getElementById('address').disabled = false;
    document.getElementById('cardNum').disabled = false;
    document.getElementById('expDate').disabled = false;
    document.getElementById('cardName').disabled = false;
    document.getElementById('bank').disabled = false;

    document.getElementById('submitBut').style.display = 'none';

}

function showEAccount(Show){
    document.getElementById('E-account').style.display = Show.toString();

}

function valid() {
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");
    var vald = document.getElementById("validaty");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            vald.innerHTML = 'Passwords Don\'t Match';
        } else {
            vald.innerHTML = 'Passwords Match';
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
}
