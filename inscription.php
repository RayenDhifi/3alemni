<?php
require("./server/db.php");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    $sql1 = "SELECT * FROM utilisateur WHERE email='$email'";
    $r1 = mysqli_query($db, $sql1);

    if (mysqli_num_rows($r1) != 0) {
        $error = "Email déjà utilisé";
    } else {
        $sql2 = "INSERT INTO utilisateur(nom, email, motDePasse, role) VALUES('$nom', '$email', '$pass', 'etudiant')";
        $r2 = mysqli_query($db, $sql2);
        if (mysqli_affected_rows($db) > 0) {
            $success = "Inscription réussie!";
            header("Location: connexion.php");
        } else {
            $error = "Erreur lors de l'inscription.";
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
    <style>
      .inscription-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
    </style>
  </head>
  <body>
    <section class="inscription-wrapper">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="signup-wrapper text-center">
              <div class="form-wrapper">
                <h2 class="mb-15">Inscription</h2>
                <p class="text-sm mb-25">Créez un compte pour utiliser la plateforme.</p>
                <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
                <?php if (!empty($success)) { echo "<p style='color:green;'>$success</p>"; } ?>

                <form method="post" action="">
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="nom">Nom et prénom</label>
                        <input type="text" id="nom" name="nom" placeholder="Nom" required />
                      </div>
                    </div>
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
                          S'inscrire
                        </button>
                      </div>
                    </div>
                  </div>
                </form>

                <div class="inscription-option pt-40">
                  <p class="text-sm text-medium text-dark text-center">
                    Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a>
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
