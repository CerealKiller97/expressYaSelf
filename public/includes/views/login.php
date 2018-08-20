<?php
  if (userLoggedIn()) {
    redirect('/');
  }
   if (isset($_POST['loginBtn'])) {
    echo '123';
    $user = new StdClass;
    $user->username = 'CerealKiller';
    $user->role = 'Admin';
    $_SESSION['user'] = $user;
    redirect('/forum');
  } 
?>

<div class="container my-5">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
  <?php if (isset($_SESSION['activation'])) : ?>  
    <div class="alert bg-success"> 
      <p class="text-center m-0 p-0">
        <?php 
          echo $_SESSION['activation'];
          unset($_SESSION['activation']);
        ?>
      </p>
    </div>
    <?php elseif (isset($_SESSION['logoutSuccess'])) : ?>
    <div class="alert bg-success"> 
      <p class="text-center m-0 p-0">
        <?php 
          $session = $_SESSION['logoutSuccess'];
          echo $session;
          unset($_SESSION['logoutSuccess']);
        ?>
      </p>
    </div>
  <?php endif; ?>  
      <h1 class="text-center text-faded">Login page</h1>
       <form action="<?= $URL ?>/login" method="POST"> 
        <div class="form-group mt-5">
          <label class="text-faded" for="email">Email address</label>
          <input type="text" class="form-control" id="email"  aria-describedby="emailHelp" placeholder="Enter email" />
          <small id="email-help" class="form-text text-danger"></small>
        </div>
        <div class="form-group mt-5">
          <label class="text-faded" for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" />
          <small id="password-help" class="form-text text-danger"></small>
        </div>
        <button id="loginBtn" type="submit" name="loginBtn" class="btn btn-primary mt-5">Login</button> <!--   -->
       </form> 
    </div>
  </div>
</div>


<?= dd($_SESSION) ?>
<!-- Modal -->
<div class="modal fade" id="login-success" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-success">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-center text-faded my-3" id="login">You have successfully logged in</h5>   
      </div>
    </div>
  </div>
</div>