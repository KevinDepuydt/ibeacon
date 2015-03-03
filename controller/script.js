$(function () {
    $("#inscriptionform").submit(function(){
            console.log("submitted");
            var verif = true;
            var zipcode = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
            var mail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
            var telephone = /^(\d\d\s){4}(\d\d)$/;
            var ville = /^[a-zéèêëàâîïôöûü-]+$/;

            alert("debut ok");
            if ($("#lastname").val()=="") {
                alert("Vous devez rentrer un nom.");
                verif = false;
            }

            if ($("#firstname").val()=="") {
                alert("Vous devez rentrer un prénom.");
                verif = false;
            }

            if (!zipcode.test($("#zipcode").val())) {
                alert("Code postale non valide.");
                verif = false;
            }

            if (!mail.test($("#email").val())) {
                alert("Adresse mail non valide.");
                verif = false;
            }

            if (!telephone.test($("#tel").val())) {
                alert("téléphone non valide.");
                verif = false;
            }

            if (!ville.test($("#city").val())) {
                alert("Ville non valide.");
                verif = false;
            }

            if ($("#password").val().length() < 6) {
                alert("Mot de passe trop court");
                verif = false;
            }

            if ($("#passwordverify").val() != $("#password").val()) {
                alert("vérification de mot de passe incorecte");
                verif = false;
            }

            if (verif) {
                alert("good");
            }

            return false;
    });
});
