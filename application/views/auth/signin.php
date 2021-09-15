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
            <layoutRight class="layout-right" >
                <form id="formLogin" action="<?=base_url('auth/signin')?>" method="POST" class="formLogin form-horizontal mt-5">
                    <legend class="text-center mb-4">Welcome</legend>
                    <?= $this->session->userdata('message')?>
                    <?= $this->session->unset_userdata('message') ?>
                    
                    <containerInput class="container-input">
                        <div class="form-group">
                            <label for="email" class="ourLabel labelMovingTop">Email</label> 
                            <input id="email" name="email" type="email" class="form-control ourInput" value="<?=set_value('email')?>" autofocus>
                            <?=  form_error('email', '<small class="text-danger">', '</small>')?>
                        </div>
                        <!------------------>
                        <div class="form-group">
                            <label for="password" class="ourLabel labelMovingTop">Password</label> 
                            <div class="password">
                                <input id="password" name="password" type="password" class="form-control ourInput">
                                <checkbox class="checkbox">
                                    <input type="checkbox" id="show">
                                    <i class="fas fa-eye mata" id="mata"></i> 
                                    <i class="fas fa-eye-slash buta" id="buta"></i>
                                </checkbox>
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <!------------------>
                        <label class="ourLabel" for="repeat_password" hidden>Repeat Password</label> 
                        <input id="repeatPassword" name="repeat_password" type="password" class="form-control ourInput" hidden>
                        <!------------------>
                        <input type="submit" class="form-control kirim" value="Sign In">
                        <a href="<?=base_url('home')?>" class="btn buttonCancelForm">Cancel</a>
                        <p>don't have account? <a class="linkSignUp" href="<?=base_url('auth/signup')?>">Sign Up</a></p>
                    </containerInput>
                </form>
            </layoutRight> 
        </div>
    </div> 
</main>
