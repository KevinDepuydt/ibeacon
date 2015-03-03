<?php
/**
 * Created by PhpStorm.
 * User: Kévin
 * Date: 02/03/2015
 * Time: 17:06
 */
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
    echo "Inscription réussie";
} else {
    echo "<br>Merci de remplir les champs suivants puis de valider";
    ?>
    <form action="" method="post" id="inscriptionform">
        <input type="hidden" name="send" id="send">
        <table>
            <tr>
                <td><label for="lastname">Nom</label></td>
                <td><input type="text" name="lastname" id="lastname"></td>
                <td id="errlastname"></td>
            </tr>
            <tr>
                <td><label for="firstname">Prénom</label></td>
                <td><input type="text" name="firstname" id="firstname"></td>
            </tr>
            <tr>
                <td><label for="email">Mail</label></td>
                <td><input type="text" name="email" id="email" placeholder="Votre identifiant"></td>
            </tr>
            <tr>
                <td><label for="adress">Adresse</label></td>
                <td><input type="text" name="adress" id="adress"></td>
            </tr>
            <tr>
                <td><label for="zipcode">Code Postal</label></td>
                <td><input type="text" name="zipcode" id="zipcode"></td>
            </tr>
            <tr>
                <td><label for="city">Ville</label></td>
                <td><input type="text" name="city" id="city"></td>
            </tr>
            <tr>
                <td><label for="tel">Téléphone</label></td>
                <td><input type="text" name="tel" id="tel" placeholder="(optionnel)"></td>
            </tr>
            <tr>
                <td><label for="password">Mot de passe</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><label for="passwordverify">Vérification</label></td>
                <td><input type="password" name="passwordverify" id="passwordverify"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    <?php
}
