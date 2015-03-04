$(document).ready(function(){
    $("#inscriptionform").submit(function(){

        var verif = true;
        var zipcode = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
        var mail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
        var telephone = /(0|\\+33|0033)[1-9][0-9]{8}/;

        $(".errinscription").each(function () {
            $(this).text('');
        });

        if ($("#lastname").val().length <= 2) {
            $("#errlastname").text("Le nom est trop court");
            verif = false;
        }

        if ($("#firstname").val().length <= 3) {
            $("#errfirstname").text("Le prénom est trop court");
            verif = false;
        }

        if (!mail.test($("#email").val())) {
            $("#erremail").text("L'adresse mail n'est pas valide.");
            verif = false;
        }

        if ($("#adress").val().length < 8) {
            $("#erradress").text("L'adresse semble trop courte");
            verif = false;
        }

        if (!zipcode.test($("#zipcode").val())) {
            $("#errzipcode").text("Le code postal n'est pas valide.");
            verif = false;
        }

        if ($("#city").val().length < 3) {
            $("#errcity").text("Le nom de la ville est trop court");
            verif = false;
        }

        if ($("#tel").val().length > 0 && !telephone.test($("#tel").val())) {
            $("#errtel").text("Le téléphone n'est pas valide");
            verif = false;
        }


        if ($("#password").val().length < 6) {
            $("#errpassword").text("Le mot de passe trop court");
            verif = false;
        }

        if ($("#passwordverify").val() != $("#password").val()) {
            $("#errpasswordverify").text("Les mots de passe ne correspondent pas");
            verif = false;
        }

        return verif;
    });
});
