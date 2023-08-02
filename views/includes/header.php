<?php
session_start();
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index.php?page=home">ASSOCIATION</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="/index.php?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index.php?page=about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index.php?page=members">Members</a>
        </li>

        <?php
        if (isset($_SESSION['user'])&&($_SESSION['user'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="/index.php?page=logout">Logout</a>
        </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="/index.php?page=login">Connexion</a>
        </li>';
        }

        ?>
        

    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item ">
          <a class="nav-link btn-warning m-4" href="/index.php?page=create">Create New User</a>
        </li>
    </ul>
    </div>
  </nav> 
</header>