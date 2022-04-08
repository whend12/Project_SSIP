    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <body>

        <!--navbar-->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row align-items-center justify-content-center">
                        <div class="register-form">
                            <h3 class="nama-toko py-5"><strong>NamaToko</strong></h3>
                            <p class="greeting">Already have an account
                                <span class="ml-auto"><a href="<?php echo BASE_URL . "index.php?page=login"; ?>" class="register">Login Here</a></span>
                                <br>
                                <form action="<?php echo BASE_URL . "proses_register.php"; ?>" method="POST">
                                    <?php
                                    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                                    $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
                                    $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
                                    $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;
                                    $email = isset($_GET['email']) ? $_GET['email'] : false;
                                    if ($notif == "require") {
                                        echo "<div class='notif'>Maaf, Kamu harus melengkapi Form</div>";
                                    }
                                    if ($notif == "email") {
                                        echo "<div class='notif'>Maaf, Email yang kamu masukan sudah terpakai</div>";
                                    }
                                    ?>
                                    <div class="form-login">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" class="form-control" id="RegisterName">
                                    </div>
                                    <div class="form-login">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" id="RegisterPhone">
                                    </div>
                                    <div class="form-login">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" name="alamat" value="<?php echo $alamat; ?>" class="form-control" id="RegisterCity">
                                    </div>
                                    <div class="form-login">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" id="RegisterEmail" aria-describedby="emailHelp">
                                    </div>
                                    <label class="form-label">Password</label>
                                    <div class="form-login">
                                        <input type="password" name="password" class="form-control" id="RegisterPassword">
                                    </div>
                                    <button type="submit" class="btn btn-register">Register</button>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-register">
                        <img src="image/login.jpg">
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>