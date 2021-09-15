<?php
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat_password'])){
    unset (
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['repeat_password']
    );
}
?>
<main class="container-fluid main">
    <div class="row">
        <div class="col-lg-7 backgroundBanner">
            <layoutLeft class="layout-left">
                <section class="text-center">
                    <img src="<?=base_url('assets/img/logo-depok.png')?>" alt="" class="logo">
                    <h1>SIWIKODE</h1>
                    <h4>Sistem Informasi Wisata Kota Depok</h4>
                </section>
            </layoutLeft>
        </div>
        <div class="col-lg-5" style="background: url(<?=base_url('assets/img/background.png')?>);">
            <layoutRight class="layout-right">
                <form action="<?= base_url('auth/signup')?>" method="POST" class="form-horizontal mt-5">
                    <legend class="text-center mb-4">Join us now</legend>
                    <containerInput class="container-input">
                        <div class="form-group">
                            <label for="username" class="ourLabel labelMovingTop">Username</label>
                            <input id="username" name="username" type="text" class="form-control ourInput" value="<?=set_value('username')?>" autofocus>
                            
                            <?= form_error('username', '<small class="text-danger formError">', '</small>')?>
                        </div>
                        <!------------------>
                        <div class="form-group">
                            <label for="email" class="ourLabel ">Email</label> 
                            <input id="email" name="email" type="email" class="form-control ourInput" value="<?=set_value('email')?>">
                            <?= form_error('email', '<small class="text-danger formError">', '</small>')?>
                        </div>
                        <!------------------>
                        <div class="form-group">
                            <label for="password" class="ourLabel labelMovingTop">Password</label> 
                            <div class="password">
                                <input id="password" name="password" type="password" class="form-control ourInput" >
                                <checkbox class="checkbox">
                                    <input type="checkbox" id="show">
                                    <i class="fas fa-eye mata" id="mata"></i> 
                                    <i class="fas fa-eye-slash buta" id="buta"></i>
                                </checkbox>
                            </div>
                            <?= form_error('password', '<small class="text-danger formError">', '</small>')?>
                        </div>
                        <!------------------>
                        <div class="form-group">
                            <label for="repeat_password" class="ourLabel">Repeat Password</label> 
                            <input id="repeatPassword" name="repeat_password" type="password" class="form-control ourInput">
                            <?= form_error('repeat_password', '<small class="text-danger formError">', '</small>')?>
                        </div> 
                        <!------------------>
                        <div class="buttonFormOneColumn">
                            <input type="submit" class="form-control kirim" value="Sign Up">
                            <a href="<?=base_url('auth/signin')?>" class="btn buttonCancelForm">Cancel</a>
                        </div>
                    </containerInput> <!-- Container Input  -->
                </form>
            </layoutRight> <!-- Kanan -->
        </div> <!-- Col -->
    </div> <!-- Row -->
</main>
