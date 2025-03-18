<?php
session_start();

require("./server/db.php");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $sql1 = "SELECT * FROM utilisateur WHERE email='$email'";
    $r1 = mysqli_query($db, $sql1);

    if (mysqli_num_rows($r1) == 0) {
        $error = "Utilisateur n'existe pas";
    } else {
        $info = mysqli_fetch_array($r1);
        $hashed_password = $info[3];
        if (password_verify($pass, $hashed_password)) {
            $_SESSION['user_id'] = $info['id'];
            $_SESSION['user_email'] = $info['email'];
            $_SESSION['user_role'] = $info['role'];
            $_SESSION['user_nom'] = $info['nom'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Erreur d'authentification";
        }
    }
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/classes.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<style>
    .inscription-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
<body>
<section class="inscription-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="signup-wrapper text-center">
                    <div class="form-wrapper">
                        <h2 class="mb-15">Connexion</h2>
                        <p class="text-sm mb-25">Connectez-vous pour accéder à votre compte.</p>
                        <?php if ($error): ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                        <?php elseif ($success): ?>
                            <div class="alert alert-success">
                                <?php echo $success; ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Email" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label for="motdepasse">Mot de passe</label>
                                        <input type="password" id="motdepasse" name="pass" placeholder="Mot de passe" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="button-group d-flex justify-content-center">
                                        <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">
                                            Se connecter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="inscription-option pt-40">
                            <p class="text-sm text-medium text-dark text-center">
                                Pas encore de compte ? <a href="inscription.php">Créer un compte</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
