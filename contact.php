<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site CV</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="contact.css" rel="stylesheet">
</head>
<body>
            
        <header>
                <nav class=" fixed-top navbar-expand-sm ">
                   <div class="menu-icon">
                      <i class="fa fa-bars fa-2x"></i>
                   </div>
                   <div class="logo">
                      LOGO
                   </div>
                   <div class="menu">
                      <ul>
                         <li><a href="index.php">Acceuil</a></li>
                      </ul>
                   </div>
                </nav>
                <div class="container">
                <form class="" action="" method="post" enctype="multipart/form-data"> 
                <input type="text" name="firstname" placeholder="Prénom"> 
                <input type="text" name="lastname" placeholder="Nom"> 
                <input type="email" class="form-control" name="email" placeholder="Email">
                <textarea type="text" minlength="15" maxlength="500" name="subject" placeholder="Ecrire ici" style="height:200px"></textarea>
                <input type="submit" value="Envoyer" name="submit"> 
                </form> 
                      </div>
             </header>

<?php

require 'db.php';

if(isset($_POST["submit"])) {
if (!empty($_POST['firstname']) && !empty($_POST['lastname'] )) {
if (!empty($_POST['email']) && !empty($_POST['subject'] )) {
$prenom = $_POST['firstname'];
$nom = $_POST['lastname'];
$email = $_POST['email'];
$sujet = $_POST['subject'];

        $sth = $pdo->prepare("INSERT INTO message(firstname, lastname, email, subject) VALUES(:prenom, :nom, :email, :sujet); ");
        $sth->bindParam(':prenom', $prenom);
        $sth->bindParam(':nom', $nom);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':sujet', $sujet);
        $sth->execute();
echo $prenom . $nom . $email;
} else { echo 'Veuillez remplir tous les champs.'; }
} else { echo 'Veuillez remplir tous les champs.'; }
}
?>
              
             

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
<script src="main.js"></script> 
</body>
</html>