<!DOCTYPE html>
<head>
    <title>Panel Admin</title>
    <link href="admin.css" rel="stylesheet">
</head>
<html>
<body>
<div class="divProject">
<form class="box" method="post">
<h1>Panel admin</h1>
<input type="text" name="login" placeholder="Utilisateur">
<input type="password" name="pwd" placeholder="Mot de passe">
<input type="submit" value="Connexion">
</form>
<?php

require 'db.php';

if (isset($_POST['login']) && isset($_POST['pwd'])) {

    $username = md5($_POST['login']);
    $password = md5($_POST['pwd']);

    $sth = $pdo->prepare("SELECT * from users WHERE user = :username AND password= :password ");
    $sth->bindParam(':username', $username);
    $sth->bindParam(':password', $password);
    $sth->execute();
    if($sth->rowCount() > 0){
        session_start();
        echo '<style type="text/css">
        .box {
            display: none;
        }
        </style>';
        echo ' <form class="boxFichier" action="" method="post" enctype="multipart/form-data"> ';
        echo ' <input type="text" minlength="2" name="name" placeholder="Nom"> ';
        echo ' <input type="number" name="niveau" placeholder="Niveau"> ';
        echo ' <select name="select"> ';
        echo ' <option value="competence">Competence</option> ';
        echo ' <option value="project">Projet</option> ';
        echo ' </select> ';
        echo ' <input type="file" name="upload" id="upload"> ';
        echo ' <input type="submit" value="Envoyer" name="submit"> ';
        echo ' </form>  ';
        echo '<h1> Message(s)</h1>';
        $sth = $pdo->query("SELECT * from message");
        if($sth->rowCount() > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Prénom</th>";
                  echo "<th>Nom</th>";
                  echo "<th>Email</th>";
                  echo "<th>Sujet</th>";
              echo "</tr>";
          while($row = $sth->fetch()){
              echo "<tr>";
                  echo "<td>" . $row['firstname'] . "</td>";
                  echo "<td>" . $row['lastname'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['subject'] . "</td>";
              echo "</tr>";
          }

     }
    } else {
		echo '<body onLoad="alert(\'Membre non reconnu, dehors !\')">';
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
}


?>





<?php

require 'db.php';

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$target_dir = "logo/";
$name = $_POST['name'];
$niveau = $_POST['niveau'];
$select = $_POST['select'];

$target_file = $target_dir . basename($_FILES["upload"]["name"]);
$link = 'logo/' . $_FILES["upload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["upload"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
        echo '<style type="text/css">
        .box {
            display: none;
        }
        </style>';
        echo "Le fichier ". basename( $_FILES["upload"]["name"]). " à bien été uploader.";
        if ($select == 'project') { $sth = $pdo->prepare("INSERT INTO project(libelle, logo, niveau) VALUES(:name, :logo, :niveau); "); }
        else {$sth = $pdo->prepare("INSERT INTO competence(libelle, logo, niveau) VALUES(:name, :logo, :niveau); ");}
        $sth->bindParam(':name', $name);
        $sth->bindParam(':logo', $link);
        $sth->bindParam(':niveau', $niveau);
        $sth->execute();
        echo ' <form class="boxFichier" action="" method="post" enctype="multipart/form-data"> ';
        echo ' <input type="text" minlength="2" name="name" placeholder="Nom"> ';
        echo ' <input type="number" name="niveau" placeholder="Niveau"> ';
        echo ' <select name="select"> ';
        echo ' <option value="competence">Competence</option> ';
        echo ' <option value="project">Projet</option> ';
        echo ' </select> ';
        echo ' <input type="file" name="upload" id="upload"> ';
        echo ' <input type="submit" value="Envoyer" name="submit"> ';
        echo ' </form>  ';
        echo '<h1> Message(s)</h1>';
        $sth = $pdo->query("SELECT * from message");
        if($sth->rowCount() > 0){
          echo "<table>";
              echo "<tr>";
                  echo "<th>Prénom</th>";
                  echo "<th>Nom</th>";
                  echo "<th>Email</th>";
                  echo "<th>Sujet</th>";
              echo "</tr>";
          while($row = $sth->fetch()){
              echo "<tr>";
                  echo "<td>" . $row['firstname'] . "</td>";
                  echo "<td>" . $row['lastname'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['subject'] . "</td>";
              echo "</tr>";
          }

     }
    } else {
        echo "Erreur.";
    }
} else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
}
}
?>


</body>
</html>




