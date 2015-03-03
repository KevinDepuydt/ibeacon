$(function(){
	$("#inscriptionform").submit(function(event){
		var verif = true;
		var zipcode = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
		// \d{2}[ ]?\d{3}
		var mail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
		var telephone = \^(\d\d\s){4}(\d\d)$\;
		var ville = ^[a-zéèêëàâîïôöûü-]+$;


		if ($("#lastname").val()=="") {
			alert("Vous devez rentrer un nom.");
			verif = false;
		}

		if ($("#firstname").val()=="") {
			alert("Vous devez rentrer un prénom.");
			verif = false;
		}

		if ($("#zipcode").val()== var zipcode) {
			alert("Code postale non valide.")
			verif = false;
		}

		if ($("#email").val()== var mail) {
			alert("Adresse mail non valide.")
			verif = false;
		}

		if ($("#tel").val()== var telephone) {
			alert("téléphone non valide.")
			verif = false;
		}

		if ($("#city").val()== var ville) {
			alert("Ville non valide.")
			verif = false;
		}

		if ($("#password").length() < 6) {
			alert("Mot de passe trop court")
			verif = false;
		}

		if ($("passwordverify").val() != $("#password")) {
			alert("vérification de mot de passe incorecte")
			verif = false;
		}

		return verif;
	})
})
