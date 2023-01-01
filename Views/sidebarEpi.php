<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

<div class="sidenav-header">
  <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
  <a class="navbar-brand m-0" href="" target="_blank">
    <span class="ms-1 font-weight-bold text-white"> Episode : <?php echo $nom ?></span>
  </a>
</div>


<hr class="horizontal light mt-0 mb-2">

<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
  <ul class="navbar-nav">

<li class="nav-item">
<a class="nav-link text-white " href="Afficher_Sequences.php?id=<?php echo $id; ?>">
  
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">table_view</i>
    </div>
  
  <span class="nav-link-text ms-1">Sequences</span>
</a>
</li>


<li class="nav-item">
<a class="nav-link text-white " href="Afficher_Selectionners.php?id=<?php echo $id; ?>">
  
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">person</i>
    </div>
  
  <span class="nav-link-text ms-1">Selection</span>
</a>
</li>


<li class="nav-item">
<a class="nav-link text-white " href="Afficher_Episodes.php?id=<?php echo $idproj; ?>">
  
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">receipt_long</i>
    </div>
  
  <span class="nav-link-text ms-1">Retour</span>
</a>
</li>      

  </ul>
</div>

</aside>