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
        'country' => $_POST['country'],
        'city' => $_POST['city'],
        'zipcode' => $_POST['zipcode'],
        'adress' => $_POST['adress'],
        'tel' => $_POST['tel'],
        'password' => sha1($_POST['password'])
    ]);
    echo "Inscription réussie";
}
