<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <?php $this->load->view('partials/head'); ?>
    <style>
        .register-logo {
            font-weight: bold;
            font-family: "Poppins";
            color: #15553B;

        }
    </style>
</head>

<body class="hold-transition register-page">

    <div class="register-box">
        <div class="register-logo">KASIRQ</div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Buat akun baru</p>
                <center>
                    <?php
                    $message = $this->session->flashdata('message');
                    if ($message) {
                        echo $message;
                    }
                    ?>
                </center>
                <div class="alert alert-danger d-none"></div>
                <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="notelpn" placeholder="Nomor Telepon" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit" style="background-color: #298a67;">Register</button>
                    </div>
                </form>
                <p class="mb-0 text-center">
                    Sudah punya akun? <a href="<?php echo site_url('login'); ?>" class="text-center" style="color: #298a67;">Login</a>
                </p>


            </div>
        </div>
    </div>

</body>


</html>