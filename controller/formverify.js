/**
 * Created by Kévin on 02/03/2015.
 */
$(document).ready(function(){
    $("#inscriptionform").submit(function(){

        console.clear();

        var verif = true;
        var zipcode = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
        var mail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
        var telephone = /(0|\\+33|0033)[1-9][0-9]{8}/;

        if ($("#lastname").val().length <= 2) {
            $("#errlastname").text("Vous devez rentrer un nom de plus de 2 caractères");
            verif = false;
        }

        if ($("#firstname").val().length <= 3) {
            console.log("Vous devez rentrer un prénom de plus de 3 caractères");
            verif = false;
        }

        if (!mail.test($("#email").val())) {
            console.log("Adresse mail non valide.");
            verif = false;
        }

        if ($("#adress").val().length < 8) {
            console.log("L'adresse semble trop courte");
            verif = false;
        }

        if (!zipcode.test($("#zipcode").val())) {
            console.log("Code postale non valide.");
            verif = false;
        }

        if ($("#tel").val().length > 0 && !telephone.test($("#tel").val())) {
            console.log("téléphone non valide.");
            verif = false;
        }

        if ($("#city").val().length < 3) {
            console.log("Ville non valide.");
            verif = false;
        }

        if ($("#password").val().length < 6) {
            console.log("Mot de passe trop court");
            verif = false;
        }

        if ($("#passwordverify").val() != $("#password").val()) {
            console.log("vérification de mot de passe incorecte");
            verif = false;
        }

        console.log("verif : "+verif);

        return verif;
    });
});
