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
function check_telefono(t){
	var x=t.telefono.value;
	if(isNaN(x) || (x.length>10 || x.length<9))
		t.telefono.value="";
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