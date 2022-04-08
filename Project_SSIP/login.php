<?php
if ($user_id) {
  header("location:" . BASE_URL);
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3 class="nama-toko py-5"><strong>NamaToko</strong></h3>
            <p class="greeting">Welcome to NamaToko please login for more great experience. Or
              <span class="ml-auto"><a href="<?php echo BASE_URL . "index.php?page=register"; ?>" class="register">Register Here</a></span>
              <br>
              <form action="<?php echo BASE_URL . "proses_login.php"; ?>" method="POST">
                <?php

                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

                if ($notif == 'true') {
                  echo "<div class='notif'>Maaf, Email atau password yang anda masukan tidak cocok</div>";
                }
                ?>
                <div class="form-login">
                  <label class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Type your email">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="form-login">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Type your password">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="remember">
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <img src="image/login-edit.png" class="image-login">
      </div>
    </div>
  </div>





</body>

</html>