<?php 

require("db.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['formation_id']) && isset($_POST['user_id'])) {
        $formation_id = $_POST['formation_id'];
        $user_id = $_POST['user_id'];
            $sql = "INSERT INTO formation_etudiant VALUES ('$user_id', '$formation_id')";
        if (mysqli_query($db, $sql)) {
            header("Location: ../index.php");
            exit();

        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}
?>