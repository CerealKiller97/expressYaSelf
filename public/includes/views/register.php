<?php
  if (userLoggedIn()) {
    redirect('/');
  }
?>

<div class="container my-5">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <h1 class="text-center text-faded">Register page</h1>
      <div class="form-group mt-2">
        <label class="text-faded" for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" aria-describedby="firstname-help" placeholder="Enter your first name"
        />
        <small id="firstname-help" class="form-text text-danger"></small>
      </div>
      <div class="form-group mt-2">
        <label class="text-faded" for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" aria-describedby="lastnameHelp" placeholder="Enter your last name"
        />
        <small id="lastname-help" class="form-text text-danger"></small>
      </div>

      <div class="form-group mt-2">
        <label class="text-faded" for="username">Username</label>
        <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter your username" />
        <small id="username-help" class="form-text text-danger"></small>
      </div>

      <div class="form-group mt-2">
        <label class="text-faded" for="email">Email address</label>
        <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" />
        <small id="email-help" class="form-text text-danger"></small>
      </div>

      <div class="form-group mt-2">
        <label class="text-faded" for="password">Password</label>
        <input type="text" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter your password" />
        <small id="email-help" class="form-text text-danger"></small>
      </div>

      <div class="form-group mt-2">
        <label class="text-faded" for="confirm-password">Confirm password</label>
        <input type="text" class="form-control" id="confirm-password" aria-describedby="confirm-passwordHelp" placeholder="Enter your password again"
        />
        <small id="confirm-password-help" class="form-text text-danger"></small>
      </div>

      <!--   <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">
          <i class="fas fa-user"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
      </div> -->

      <!--       <label class="custom-control custom-radio d-block">
                                    <input id="radio1" name="radio" type="radio" class="custom-control-input" checked>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Radio is off</span>
                                </label>

                                <button id="registerBtn" class="btn btn-primary mt-5">Register</button>
 -->
      <div class="custom-control custom-checkbox mr-sm-2">
        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
        <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>
      </div>
        <button id="registerBtn" class="btn btn-primary mt-5">Register</button>
    </div>
  </div>
</div>

<div class="modal fade" id="register-success" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-success">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-center text-faded my-3" id="login">You have successfully registered. Please check your email to confirm your identity.</h5>   
      </div>
    </div>
  </div>
</div>