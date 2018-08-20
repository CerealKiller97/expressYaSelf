<?php
  $first = '';
  if (isset($_GET['first'])) {
    $first = $_GET['first'];
    $_SESSION['activation'] = 'You have successfully activated your account';
    //redirect('/login');
  } else {
    redirect('/');
  }
?>

<div class="container">
  <div class="jumbotron text-center">
    <h1 class="display-4">You have successfully activated your account!</h1>
    <p class="text-info"> Your token is: <?= $first ?> </p>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-outline-primary btn-lg" href="<?= $URL ?>/register">Join the community</a>
    <a class="btn btn-primary btn-lg" href="#" role="button">Go to Forum </a>
  </div>
</div>