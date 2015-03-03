<?php
/**
 * Created by PhpStorm.
 * User: Kévin
 * Date: 03/03/2015
 * Time: 20:20
 */
if (isset($_POST['connect'])) {
    $req = $bdd->prepare('SELECT * FROM users WHERE email = :account AND password = :password');
    $req->execute([
        'account' => $_POST['account'],
        'password' => sha1($_POST['password'])
    ]);
    $result = $req->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        unset($result['password']);
        echo "Vous êtes connecté en tant que ".$result['firstname']."<br>";
        $_SESSION['user'] = $result;
        var_dump($_SESSION);
    }
    else echo "Les identifiants sont incorrects<br>";
} else {
    echo "<br>Merci de remplir les champs suivants puis de valider";
    ?>
    <form action="" method="post" id="connectionform">
        <input type="hidden" name="connect" id="connect">
        <table>
            <tr>
                <td><label for="account">Mail</label></td>
                <td><input type="text" name="account" id="account"></td>
            </tr>
            <tr>
                <td><label for="password">Mot de passe</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
<?php
}