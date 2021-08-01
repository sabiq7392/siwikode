<main class="userPage displayCenter noMax-width">
    <?= form_open_multipart('user/edit');?>
        <h2 class="text-center">Edit Account</h2>
        <hr><br>
        <containerInput class="container-input">
            <div class="form-group inputUploadPhotoProfile">
                <div id="containerImageInForm">
                    <img id="imageToUpload" src="<?=base_url('assets/img/photo_profile/'.$user['image'])?>" alt="" width="80">
                    <div id="iconCamera" class="iconCamera">
                        <i id="camera" class="fas fa-camera"></i>
                    </div>
                </div>
                <div id="inputImageInForm">
                    <label for="image" class="ourLabel"></label>
                    <input id="image" name="image" type="file" class="imageInput ourInput custom-file-input" value="">
                </div>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="email"class="ourLabel">Email</label> 
                <input id="email" name="email" type="email" class="form-control ourInput" value="<?=$user['email']?>" readonly>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="username" class="ourLabel">Username</label> 
                <input id="username" name="username" type="text" class="form-control ourInput" value="<?=$user['username']?>">
                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="profesi" class="ourLabel">Your Profession</label> 
                <input id="profesi" name="profesi" type="text" class="form-control ourInput" value="<?=$user['profesi']?>">
            </div>
            <!------------------>
            <div class="form-group">
                <label for="deskripsi" class="ourLabel">Your Description</label> 
                <textarea id="deskripsi" name="deskripsi" type="text" class="form-control ourInput" value="<?=$user['deskripsi']?>" cols="10" rows="5"><?=$user['deskripsi']?></textarea>
            </div>
            <!------------------>
            <div class="buttonForm">
                <a href="<?=base_url('user')?>" class="btn buttonCancelForm">Cancel</a>
                <input type="submit" class="form-control buttonYesForm" value="Yes, Edit">
            </div>
        </containerInput>
    </form>
</main>