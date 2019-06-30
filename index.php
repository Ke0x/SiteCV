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
    <link href="main.css" rel="stylesheet">

    <?php

    require 'db.php';
    
    ?>

</head>
<body>

        <div class="wrapper">
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
                            <li><a href="#">Acceuil</a></li>
                            <li><a href="#about">A propos</a></li>
                            <li><a href="#sectionprojet">Projets</a></li>
                            <li><a href="#competences">Compétences</a></li>
                            <li><a href="contact.php">Contact</a></li>
                         </ul>
                      </div>
                   </nav>
                   <div class="info">
                      <div class="textFond">Mayer Quentin</div>
                      <div class="textFond2">Développeur</div>
                  </div>
                </header>
                
             </div>
             <section id="about" class="about-mf sect-pt4 route">
               <div class="container">
                 <div class="row">
                   <div class="col-sm-12">
                     <div class="box-shadow-full">
                       <div class="row">
                         <div class="col-md-6">
                           <div class="row">
                             <div class="col-sm-6 col-md-5">
                               <div class="about-img">
                                 <img src="img/enjoy.png" class="img-fluid rounded b-shadow-a" alt="">
                               </div>
                             </div>
                             <div class="col-sm-6 col-md-7">
                               <div class="about-info">
                                 <p><span class="title-s">Nom: </span> <span>Quentin Mayer</span></p>
                                 <p><span class="title-s">Profil: </span> <span>Développeur</span></p>
                                 <p><span class="title-s">Email: </span> <span>quentin.mayer@ynov.com</span></p>
                                 <p><span class="title-s">Téléphone: </span> <span>+33641900908</span></p>
                               </div>
                             </div>
                           </div>
                           
                         </div>
                         <div class="col-md-6">
                           <div class="about-me pt-4 pt-md-0">
                             <div class="title-box-2">
                               <h5 class="title-left">
                                 A propos
                               </h5>
                             </div>
                             <p class="lead">
                               Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id
                               imperdiet et, porttitor
                               at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla
                               porttitor accumsan tincidunt.
                             </p>
                             <p class="lead">
                               Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis
                               porttitor volutpat. Vestibulum
                               ac diam sit amet quam vehicula elementum sed sit amet dui. porttitor at sem.
                             </p>
                             <p class="lead">
                               Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
                               Nulla porttitor accumsan
                               tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                             </p>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </section>
          
             <section >
              <h1 id='sectionprojet' class="text-center">Projets</h1>
                              
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="box-shadow-full2">
                        <div class="divProjet">   
                        <?php
            $msg = '';
                  $sth = $pdo->query("SELECT * from project");
                  if($sth->rowCount() > 0){
                    while($row = $sth->fetch()){
                        echo "<div class='projet'>";
                            echo "<span>" . $row['niveau'] . "</span> <span>%</span>";
                            echo '<div>';
                            echo '<progress value="'. $row['niveau'] .'" min="0" max="100">0%</progress>';
                            echo '</div>';
                            echo '<img class="logoComp" src="'. $row['logo'] .'"</img>';
                            echo "<span>" . $row['libelle'] . "</span>";
                        echo "</div>";

                    }
                
               }
         ?>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <section id='competences'>
                <h1 class="text-center">Compétences</h1>
                                
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="box-shadow-full2">
                        <div class="divProjet">
                  <?php
            $msg = '';
                  $sth = $pdo->query("SELECT * from competence");
                  if($sth->rowCount() > 0){
                    while($row = $sth->fetch()){
                        echo "<div class='projet'>";
                            echo "<span>" . $row['niveau'] . "</span> <span>%</span>";
                            echo '<div>';
                            echo '<progress value="'. $row['niveau'] .'" min="0" max="100">0%</progress>';
                            echo '</div>';
                            echo '<img class="logoComp" src="'. $row['logo'] .'"</img>';
                            echo "<span>" . $row['libelle'] . "</span>";
                        echo "</div>";

                    }
                
               }
         ?>
                             </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
                </div>
              </section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
<script src="main.js"></script> 
</body>
</html>