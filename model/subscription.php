<div id="forminscription">
<?php
if (isset($_POST['send'])) {
    $req = $bdd->prepare('INSERT INTO users (lastname, firstname, email, country, city, zipcode, adress, tel, password) VALUES (:lastname, :firstname, :email, :country, :city, :zipcode, :adress, :tel, :password)');
    $req->execute([
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'email' => $_POST['email'],
        'country' => "France",
        'city' => $_POST['city'],
        'zipcode' => $_POST['zipcode'],
        'adress' => $_POST['adress'],
        'tel' => $_POST['tel'],
        'password' => sha1($_POST['password'])
    ]);
    echo "<p class='text'>Inscription réussie</p>";
} else {
    echo "<p class='text'>Veuillez remplir les champs suivants pour vous inscrire</p>";
    ?>
    <form action="" method="post" id="inscriptionform">
        <input type="hidden" name="send" id="send">

        <input type="text" name="lastname" id="lastname" placeholder="Nom" class="champform">
        <div class="errinscription" id="errlastname"></div>

        <input type="text" name="firstname" id="firstname" placeholder="Prenom" class="champform">
        <div class="errinscription" id="errfirstname"></div>

        <input type="text" name="email" id="email" placeholder="Email ( votre identifiant )" class="champform">
        <div class="errinscription" id="erremail"></div>

        <input type="text" name="adress" id="adress" placeholder="Adresse" class="champform">
        <div class="errinscription" id="erradress"></div>

        <input type="text" name="zipcode" id="zipcode" placeholder="Code postal" class="champform">
        <div class="errinscription" id="errzipcode"></div>

        <input type="text" name="city" id="city" placeholder="Ville" class="champform">
        <div class="errinscription" id="errcity"></div>

        <input type="text" name="tel" id="tel" placeholder="Téléphone ( facultatif )" class="champform">
        <div class="errinscription" id="errtel"></div>

        <input type="password" name="password" id="password" placeholder="Mot de passe" class="champform">
        <div class="errinscription" id="errpassword"></div>

        <input type="password" name="passwordverify" id="passwordverify" placeholder="Vérification du mot de passe" class="champform">
        <div class="errinscription"  id="errpasswordverify"></div>

        <input type="submit" value="Inscription" class="boutonform">
    </form>
    </div>
<?php
}
