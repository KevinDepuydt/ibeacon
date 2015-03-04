<?php
/**
 * Created by PhpStorm.
 * User: Kévin
 * Date: 03/03/2015
 * Time: 20:20
 */
?>
    <div id="formconnection">
    <?php
        if (isset($_POST['connect'])) {
            $req = $bdd->prepare('SELECT * FROM users WHERE email = :account AND password = :password');
            $req->execute([
                'account' => $_POST['account'],
                'password' => sha1($_POST['password'])
            ]);
            $result = $req->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                unset($result['password']);
                echo "<p class='text success'>Vous êtes connecté en tant que ".$result['firstname']."<p>";
                $_SESSION['user'] = $result;
            } else {
                echo "<p class='text error'>Les identifiants sont incorrects</p>";
                ?>
                <form action="" method="post">
                    <input type="hidden" name="connect" id="connect">
                    <table>
                        <tr>
                            <td><input type="text" name="account" id="account" placeholder="Email" class="champform"></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" id="password" placeholder="Mot de passe" class="champform"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Connexion" class="boutonform"></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
        } else {
    ?>
        <p class="text">Veuillez saisir vos identifiants</p>
        <form action="" method="post">
            <input type="hidden" name="connect" id="connect">
            <table>
                <tr>
                    <td><input type="text" name="account" id="account" placeholder="Email" class="champform"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" id="password" placeholder="Mot de passe" class="champform"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Connexion" class="boutonform"></td>
                </tr>
            </table>
        </form>
    </div>
<?php
}