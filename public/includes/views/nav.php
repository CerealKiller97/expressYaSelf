<?php
  $nav = new Navigation($conn);
  $links = $nav->all();
?>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 box-shadow">
  <a href="<?= $URL ?>" class="my-0 mr-md-auto">
    <img id="logo" src="<?= ($requiresPrefix === 4) || ($requiresPrefix === 5) ? $URL . '/' : '' ?>public/img/logo-w60.png" /> </a>
  <nav id="main-nav" class="my-2 my-md-0 mr-md-3">
    <?php foreach ($links as $link) : ?>
      <a class="p-2" class="text-faded" href=<?= $URL .'/' .strtolower($link->link) ?>> <?= $link->link ?> </a>
    <?php endforeach; ?>
    <?php if (adminLoggedIn()) : ?>
      <a class="p-2" class="text-faded" href="admin/admin.php?page=dashboard">Admin</a>
    <?php endif; ?>
  </nav>
  <?php if (!userLoggedIn()) : ?>
    <a class="btn btn-success ml-3" href=<?= $URL . '/login' ?> >Login</a>
    <a class="btn btn-outline-success ml-3" href=<?= $URL . '/register' ?>>Register</a>
  <?php else : ?>
  <li id="auth-dropdown" class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
      <button class="btn btn-primary"> <?= $_SESSION['user']->username ?> </button>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item auth-drop" href=<?= $URL . '/profile/' . $_SESSION['user']->username.'/' ?>> Profile
        <i class="fas fa-user-alt ml-1"></i>
      </a>
      <a class="dropdown-item auth-drop" href="#">Posts <!-- ili staviti ovo u profile section -->
        <i class="fas fa-book-open ml-1"></i>
      </a>     
      <a class="dropdown-item auth-drop" href=<?= $URL . "/public/includes/views/logout.php" ?> >Logout
        <i class="fas fa-sign-out-alt ml-1"></i>
      </a>
    </div>
  </li>
  <?php endif; ?>
</div>