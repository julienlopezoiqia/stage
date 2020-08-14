<?php
	// On recupere l'URL de la page pour ensuite affecter class = "active" aux liens de nav
	$page = $_SERVER['REQUEST_URI'];
	  

?>



<div>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">

<ul class="navbar-nav" id="nav" >


<li <?php if(strpos($page, "index.php") !== false){echo 'class="active"';} ?>><a class="nav-link" href="index.php">Contact</a></li>
<li  <?php if(strpos($page, "interested.php") !== false){echo 'class="active"';} ?>><a class="nav-link" href="interested.php">Interested</a></li>
<li <?php if(strpos($page, "newsletter.php") !== false){echo 'class="active"';} ?>><a class="nav-link" href="newsletter.php">Newsletter</a></li>
<li  <?php if(strpos($page, "formulaire.php") !== false){echo 'class="active"';} ?>><a class="nav-link" href="formulaire.php">Formulaire</a></li>


</ul>

</nav>
</div>
