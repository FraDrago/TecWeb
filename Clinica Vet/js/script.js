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

function check_telefono(t){
	var x=t.telefono.value;
	var filter=/^\d+$/;
	if(!filter.test(x) || (x.length>10 || x.length<9))
		t.telefono.value="";
}

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