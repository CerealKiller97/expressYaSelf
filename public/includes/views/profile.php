<?php
  if (!userLoggedIn()) {
    redirect('/');
  } else {
    $first = '';
    $second = '';
    if (isset($_GET['first']) || isset($_GET['second'])) {
      $first = get('first');
      $second = get('second');
    }
  }
?>
  <?= dd($requiresPrefix) ?>
  <div class="container">
    <section class="colored-section bg-inverse" id="tabs">
      <div class="container">
        <div class="title">
          <h3>Profile
            <?= $first ?>
          </h3>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card bg-primary">
              <ul class="nav nav-tabs nav-tabs-primary justify-content-center nav-fill bg-alt" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">
                    <i class="fa fa-user mr-2"></i> Profile info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">
                    <i class="fas fa-book-open mr-2"></i> Posts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#messages2" role="tab">
                  <i class="fas fa-envelope mr-2"></i> Messages</a>
                </li>
              </ul>

              <div class="card-block">
                <div class="tab-content">
                  <div class="tab-pane active" id="home2" role="tabpanel">
                    <div class="container bg-primary">
                      <h1 class="text-dark pt-4">Profile info
                        <i class="fa fa-user"></i>
                      </h1>
                      <form action="<?= $URL ?>login" method="POST">
                        <div class="form-group">
                          <label class="text-faded" for="email">Email address</label>
                          <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" />
                          <small id="email-help" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                          <label class="text-faded" for="password">Password</label>
                          <input type="password" class="form-control" id="password" placeholder="Password" />
                          <small id="password-help" class="form-text text-danger"></small>
                        </div>
                        <button id="loginBtn" type="submit" name="loginBtn" class="btn btn-primary mt-5">Update profile</button>
                        <!--   -->
                      </form>
                    </div>
                  </div>
                  <div class="tab-pane fade " id="profile2" role="tabpanel">
                    <div class="container">
                    <h1 class="text-dark pt-4">Posts
                      <i class="fas fa-book-open ml-1"></i>
                    </h1>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="messages2" role="tabpanel">
                    <h1 class="text-dark">Messages
                      <i class="fas fa-envelope"></i>
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>