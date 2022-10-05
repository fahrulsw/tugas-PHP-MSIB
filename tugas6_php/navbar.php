<?php 
$path = $_SERVER['REQUEST_URI'];
$path = explode('/',$path);
$path = end($path);
?>
<nav id="navbar" class="navbar">
      <ul>
        <li <?php if($path == 'home.php') {echo "class = 'active";} ?>><a class="nav-link scrollto"  href="index.php?hal=home">Home</a></li>
        <li <?php if($path == 'about.php'){echo "class = 'active";} ?>><a class="nav-link scrollto"  href="index.php?hal=about">About</a></li>
        <li <?php if($path == 'study.php'){echo "class = 'active";} ?>><a class="nav-link scrollto" href="index.php?hal=study">Study</a></li>
        <li <?php if($path == 'home.php') {echo "class = 'active";} ?>><a class="nav-link scrollto" href="index.php?hal=task">Tasks</a></li>
        <li <?php if($path == 'home.php') {echo "class = 'active";} ?>><a class="nav-link scrollto " href="index.php?hal=portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>