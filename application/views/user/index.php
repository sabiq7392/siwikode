<main class="userPage displayCenter noMax-width">
    <userDetail class="userDetail">
        <?= $this->session->userdata('message')?>
        <?= $this->session->unset_userdata('message') ?>
        <h2 class="text-center">Your Profile</h2>
        <hr>
        <div class="userEmail" hidden>
            <h4>Email : <?=$user['email']?></h4>
        </div>
        <div class="userImage">
            <img src="<?=base_url('assets/img/photo_profile/').$user['image']?>" alt="<?=$user['username']?>">
        </div>
        <div class="userName"> 
            <h3><?=$user['username']?></h3>
        </div>
        <div class="userProfesi"> 
            <h4><?=$user['profesi']?></h4>
        </div>

        <!-- kenapa div userDescription tidak mengikuti baris? karena kita memakai css white-space
        jadi jika ada sebuah baris kosong maka nanti baris kosong itu terhitung menjadi baris didalame textContent P--->
        <div class="userDescription"><p id="userDescriptionTextArea"><?=$user['deskripsi']?></p></div>
    </userDetail>
</main>
    
    