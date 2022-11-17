<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light fw-bold" href="index.php">DLForum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item text-light">
          <a class="nav-link active text-light" aria-current="page" href="index.php">Accueil</a>
        </li>
        <!-- <li class="nav-item text-light">
          <a class="nav-link text-light" href="#">Profil</a>
        </li> -->
        <li class="nav-item text-light">
          <a class="nav-link text-light" href="my-questions.php">Mes questions</a>
        </li>
        <li class="nav-item text-light">
          <a class="nav-link text-light" href="publish-question.php">Publier une question</a>
        </li>
        <?php 
          if(isset($_SESSION['auth'])) {
            ?>
              <li class="nav-item text-light">
                <a class="nav-link text-light" href="actions/users/logoutAction.php">Déconnexion</a>
              </li>
            <?php
          }        
        ?>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>