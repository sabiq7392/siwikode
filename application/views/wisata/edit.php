<main class="wisata displayCenter noMax-width">
    <?= form_open_multipart('admin/update_wisata');?>
        <h2>Edit Wisata</h2>
        <hr><br>
        <containerInput class="container-input">
            <label for="nama_wisata" class="ourLabel" hidden>Id</label> 
            <input type="hidden" class="ourInput" name="id" value="<?= $wisataId->id ?>">
            <!------------------>
            <div class="form-group inputUploadPhotoProfile">
                <div id="containerImageInForm">
                    <img id="imageToUpload" src="<?=base_url('assets/img/photo_wisata/'.$wisataId->image)?>" alt="" width="80">
                    <div id="iconCamera" class="iconCamera">
                        <i id="camera" class="fas fa-camera"></i>
                    </div>
                </div>
                <div id="inputImageInForm">
                    <label for="image" class="ourLabel"></label>
                    <input id="image" name="image" type="file" class="imageInput ourInput custom-file-input" >
                </div>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="nama_wisata" class="ourLabel">Nama</label> 
                <input id="nama_wisata" name="nama_wisata" type="text" class="form-control ourInput" value="<?=$wisataId->nama_wisata?>" required="required">
            </div>
            <!------------------>
            <div class="form-group">
                <label for="deskripsi" class="ourLabel">Deskripsi</label> 
                <textarea id="deskripsi" name="deskripsi" type="text" class="form-control ourInput" value="<?=$wisataId->deskripsi?>" cols="10" rows="5" required="required"><?=$wisataId->deskripsi?></textarea>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="wisata" class="ourLabel selectLabel">Jenis Wisata</label> 
                <select id="jenis_wisata" name="jenis_wisata" class="custom-select ourInput" required="required">
                    <option value="<?=$wisataId->jenis_wisata_id?>"><?=$jenis_wisata[$wisataId->jenis_wisata_id - 1]->jenis?></option>
                    <?php foreach($jenis_wisata as $row): ?>
                    <?php if($row->id != $wisataId->jenis_wisata_id):?>
                    <option value="<?= $row->id ?>"><?= $row->jenis ?></option>;
                    <?php endif;?>
                    <?php endforeach; ?>  
                </select>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="profesi" class="ourLabel selectLabel" >Kategori</label> 
                <select id="kategori" name="kategori" class="custom-select ourInput" required="required">
                    <option value="<?=$wisataId->kategori_id?>"><?=$kategori[$wisataId->kategori_id - 1]->nama_kategori?></option>
                    <?php foreach($kategori as $row): ?>
                    <?php if($row->id != $wisataId->kategori_id):?>
                    <option value="<?= $row->id ?>"><?= $row->nama_kategori ?></option>;
                    <?php endif;?>
                    <?php endforeach; ?>  
                </select>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="fasilitas" class="ourLabel">Fasilitas</label> 
                <textarea id="fasilitas" name="fasilitas" type="text" class="form-control ourInput" value="<?=$wisataId->fasilitas?>" cols="10" rows="5" required="required"><?=$wisataId->deskripsi?></textarea>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="kontak" class="ourLabel">Kontak</label> 
                <input id="kontak" name="kontak" type="text" class="form-control ourInput" value="<?=$wisataId->kontak?>" required="required">
            </div>
            <!------------------>
            <div class="form-group">
                <label for="alamat" class="ourLabel">Alamat</label> 
                <textarea id="alamat" name="alamat" type="text" class="form-control ourInput" value="<?=$wisataId->alamat?>" cols="10" rows="5" required="required"><?=$wisataId->alamat?></textarea>
            </div>
            <!------------------>
            <div class="form-group">
                <label for="latlong" class="ourLabel">Latlong</label> 
                <input id="latlong" name="latlong" type="text" class="form-control ourInput" value="<?=$wisataId->latlong?>" required="required">
            </div>
            <!------------------>
            <div class="form-group">
                <label for="email" class="ourLabel">Email</label> 
                <input id="email" name="email" type="email" class="form-control ourInput" value="<?=$wisataId->email?>" required="required">
            </div>
            <!------------------>
            <div class="form-group">
                <label for="url" class="ourLabel">URL</label> 
                <input id="url" name="url" type="text" class="form-control ourInput" value="<?=$wisataId->url?>" required="required">
            </div>
            <!------------------>
            <div class="buttonForm">
                <a href="<?=base_url('admin/wisata')?>" class="btn buttonCancelForm">Cancel</a>
                <input type="submit" class="form-control buttonYesForm" value="Submit">
            </div>
        </containerInput>
    </form>
</main>
