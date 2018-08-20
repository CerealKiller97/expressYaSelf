<?php
  $socialMedia = new SocialMedia($conn);
  $socials = $socialMedia->all();
?>

  <footer class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 box-shadow text-faded">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4 class="text-faded">Description</h4>
          <p class="text-justify">An Internet forum, or message board, is an online discussion site where people can hold conversations in the form
            of posted messages.They differ from chat rooms in that messages are often longer than one line of text, and are
            at least temporarily archived. Also, depending on the access level of a user or the forum set-up, a posted message
            might need to be approved by a moderator before it becomes visible. </p>
        </div>
        <div class="col-lg-4">
          <h4 class="text-faded"> Links </h4>
          <ul class="list-group">
            <?php foreach ($links as $link) : ?>
              <li class="list-group-item bg-transparent border-0">
                <a href="<?= $URL . '/' . strtolower($link->link) ?>">
                  <?= $link->link ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-lg-4">
          <h4 class="text-faded"> Social Media </h4>
          <ul class="list-group">
            <?php foreach ($socials as $social) : ?>
              <li class="list-group-item social">
                <a href="<?=  $social->url ?>" class="text-faded">
                  <?=  $social->name ?>
                    <i class="<?=  $social->icon ?> ml-2"></i>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="alert author">
        <p class="text-center"> <a class="text-primary" href="https://cerealkiller97.github.io/portfolio">Stefan Bogdanović &copy; 2018 </a> </p>
      </div>
    </div>
  </footer>
  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="<?= ($requiresPrefix === 4) || ($requiresPrefix === 5) ? $URL . '/' : '' ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= ($requiresPrefix === 4) || ($requiresPrefix === 5) ? $URL . '/' : '' ?>node_modules/axios/dist/axios.min.js"></script>
  <script src="<?= ($requiresPrefix === 4) || ($requiresPrefix === 5) ? $URL . '/' : '' ?>public/js/main.js"></script>
  <?php
    switch ($page) {
      case 'register':
        echo "<script src='public/js/$page.js'></script>";
        break;
      
      case 'login':
        echo "<script src='public/js/$page.js'></script>";
        break;  

      default:
        # code...
        break;
    }
  ?>
</body>
</html>