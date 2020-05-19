<?php include("inc/header.php");
$requete = $bdd->query("SELECT * FROM utilisateur");
$resultat = $requete->fetch();
$requete2 = $bdd->query("SELECT * FROM experience");
?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="admin.php">Admin</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0"><?php echo $resultat['nom'];?>
          <span class="text-primary"><?php echo $resultat['prenom'];?></span>
        </h1>
        <div class="subheading mb-5"><?php echo $resultat['adresse'] .  " " . $resultat['ville'] . " " . $resultat['numero'];?>
          <a href="mailto:name@email.com"><?php echo $resultat['adresse_mail'];?></a>
        </div>
        <p class="lead mb-5"><?php echo $resultat['description'];?></p>
        <div class="social-icons">
          <a href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#">
            <i class="fab fa-github"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
        <h2 class="mb-5">Experience</h2>
        <?php 
        while($resultat2 = $requete2->fetch())
        {
        ?>
        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0"><?php echo $resultat2['id_experience'] . "." . $resultat2['titre'];?></h3>
            <div class="subheading mb-3"><?php echo $resultat2['sous_titre'];?></div>
            <p><?php echo $resultat2['description'];?></p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"><?php echo $resultat2['date'];?></span>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </section>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>
