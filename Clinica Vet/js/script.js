function scrollFunction() {

  if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

window.onscroll= scrollFunction;

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


function checkEmail() {
        var email = document.getElementById('Email');
        var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!filter.test(email.value)) {
            alert('Please provide a valid email address');
            email.focus;
            return false;
        }
    }

	
function validateInsertRegistrati() {

    result = true;
    mess1 = validateRegistrati()

    mess = ""

    if (mess1 != "") {

        mess += mess1 + "<br/>"
    }



    var element = errorAdd(mess)

    return result;
}	

function validateRegistrati() {
	var name = document.getElementById("name").value;
	var espressione = /^[a-z]+$/i;
	var surname = document.getElementById("surname").value;
	var telefono = document.getElementById("telefono").value;
	var filtro=/^\d+$/;
	var email = document.getElementById("email").value;
	var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var password = document.getElementById("password").value;
	var cpassword = document.getElementById("cpassword").value;
	
    message = "" ;

	if ( password == "" || password == undefined || password == null){
		message += "Il campo password è obbligatorio.<br/>";
        document.getElementById("password").focus();
	}
	if (cpassword == "" || cpassword == undefined || cpassword == null) {
        message += "Il campo di controllo è obbligatorio. <br/>";
        document.getElementById("cpassword").focus();
	}
	if (name && !espressione.test(name)) {
        message += "Immettere una nome valida.<br/>";
        document.getElementById("name").focus();
    }
    if (name == "" || name == undefined || name == null) {
        message += "Il campo nome è obbligatorio.<br/>";
        document.getElementById("name").focus();
	}
	if (surname && !espressione.test(surname)) {
        message += "Immettere una cognome valida.<br/>";
        document.getElementById("surname").focus();
    }
    if (surname == "" || surname == undefined || surname == null) {
        message += "Il campo cogmone è obbligatorio.<br/>";
        document.getElementById("surname").focus();
	}
	
    if (email && !filter.test(email)) {
        message += "Immettere una email valida.<br/>";
        document.getElementById("email").focus();
    }
    if (email == "" || email == undefined || email == null) {
        message += "Il campo Email è obbligatorio.<br/>";
        document.getElementById("email").focus();
	}
	if(telefono && (!filtro.test(telefono) || (telefono.length>10 || telefono.length<9))) {
        message += "Immettere un numero di telefono valido.<br/>";
        document.getElementById("telefono").focus();
    }
	if (telefono == "" || telefono == undefined || telefono == null) {
        message += "Il campo telefono è obbligatorio.<br/>";
        document.getElementById("telefono").focus();

    }

    return message;
}
	
function validateInsertME() {

    result = true;
    mess2 = validateModificaEmail()

    mess = ""

    if (mess2 != "") {

        mess += mess2 + "<br/>"
    }



    var element = errorAdd(mess)

    return result;
}

function validateModificaEmail() {

    var email = document.getElementById("email").value;
	var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
    message = ""


	if (email && !filter.test(email)) {
        message += "Immettere una email valida.<br/>";
        document.getElementById("email").focus();
    }
    if (email == "" || email == undefined || email == null) {
        message += "Il campo Email è obbligatorio.<br/>";
        document.getElementById("email").focus();

    }
	//message=checkEmail()

    return message;
}

function validateInsertMT() {

    result = true;
    mess2 = validateModificaTelefono()

    mess = ""

    if (mess2 != "") {

        mess += mess2 + "<br/>"
    }



    var element = errorAdd(mess)

    return result;
}


// /^[0-9]{3}-[0-9]{4}-[0-9]{4}$/
function validateModificaTelefono() {

    var telefono = document.getElementById("telefono").value;
	var filter=/^\d+$/;
	
	
    message = ""


	if(telefono && (!filter.test(telefono) || (telefono.length>10 || telefono.length<9))) {
        message += "Immettere un numero di telefono valido.<br/>";
        document.getElementById("telefono").focus();
    }
	if (telefono == "" || telefono == undefined || telefono == null) {
        message += "Il campo telefono è obbligatorio.<br/>";
        document.getElementById("telefono").focus();

    }

    return message;
}

	

function errorAdd(mess) {
	
	var element = document.getElementById("errorAdd");
    if (mess != "") {
        result = false;

        if (element) {
            document.getElementById('errorAdd').style.fontSize = '0.5em';
            element.innerHTML = mess;
            document.getElementById('errorAdd').style.display = 'block';
        }

    } else {

        if (element) {
            document.getElementById('errorAdd').style.display = 'none';
            element.innerHTML = "";
        }
    }
}


	

function validateModificaProfilo() {

    var email = document.getElementById("email").value;
	var telefono = document.getElementById("telefono").value;
	var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
    message = ""


	if (email && !filter.test(email)) {
        message += "Immettere una email valida.<br/>";
        document.getElementById("email").focus();
    }
    if (email == "" || email == undefined || email == null) {
        message += "Il campo Email è obbligatorio.<br/>";
        document.getElementById("email").focus();

    }
	//message=checkEmail()
	
	if (telefono == "" || telefono == undefined || telefono == null || telefono.length > 45) {
        message += "Il campo telefono non deve essere vuoto<br/>";
        document.getElementById("telefono").focus();

    }

    return message;
}

function checkEmail() {
    var email = document.getElementById('Email').value;
	message = ""
	
	
	
	return message;
}