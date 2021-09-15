<main class="wisata displayCenter noMax-width">
    <button class="btn createButtonFloating" id="createButtonFloating">
        <i class="fas fa-plus"></i>
        <p>Create Menu</p>
    </button>
    <div class="floatingElement" id="floatingElement">
        <wisataCreate class="formCreateContainer" id="formCreateContainer">
            <?= form_open_multipart('admin/store_wisata'); ?>
            <header class="formHeader">
                <h2><i class="fas fa-plus mr-3"></i>Add Wisata</h2>
                <hr><br>
            </header>
            <containerInput class="container-input">
                <div class="form-group inputUploadPhotoProfile">
                    <div id="containerImageInForm">
                        <img id="imageToUpload" src="<?= base_url('assets/img/photo_wisata/default.png') ?>" alt="" width="80">
                        <div id="iconCamera" class="iconCamera">
                            <i id="camera" class="fas fa-camera"></i>
                        </div>
                    </div>
                    <div id="inputImageInForm">
                        <label for="image" class="ourLabel"></label>
                        <input id="image" name="image" type="file" class="imageInput ourInput custom-file-input" value="" required="required">
                    </div>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="nama_wisata" class="ourLabel">Nama</label>
                    <input id="nama_wisata" name="nama_wisata" type="text" class="form-control ourInput" value="" required="required">
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="deskripsi" class="ourLabel">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" type="text" class="form-control ourInput" value="" cols="10" rows="5" required="required"></textarea>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="wisata" class="ourLabel selectLabel">Jenis Wisata</label>
                    <select id="jenis_wisata" name="jenis_wisata" class="custom-select ourInput" required="required">
                        <option value="">-- Jenis Wisata --</option>
                        <?php foreach ($jenis_wisata as $row) : ?>
                            <option value="<?= $row->id ?>"><?= $row->jenis ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="kategori" class="ourLabel selectLabel">Kategori</label>
                    <select id="kategori" name="kategori" class="custom-select ourInput" required="required">
                        <option value="">--- Kategori ---</option>
                        <?php foreach ($kategori as $row) : ?>
                            <option value="<?= $row->id ?>"><?= $row->nama_kategori ?></option>;
                        <?php endforeach; ?>
                    </select>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="fasilitas" class="ourLabel">Fasilitas</label>
                    <input id="fasilitas" name="fasilitas" type="text" class="form-control ourInput" required="required">
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="kontak" class="ourLabel">Kontak</label>
                    <input id="kontak" name="kontak" type="text" class="form-control ourInput" required="required">
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="alamat" class="ourLabel">Alamat</label>
                    <input id="alamat" name="alamat" type="text" class="form-control ourInput" required="required">
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="latlong" class="ourLabel">Latlong</label>
                    <input id="latlong" name="latlong" type="text" class="form-control ourInput" required="required">
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="email" class="ourLabel">Email</label>
                    <input id="email" name="email" type="email" class="form-control ourInput" required="required">
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="url" class="ourLabel">URL</label>
                    <input id="url" name="url" type="text" class="form-control ourInput" required="required">
                </div>
                <!------------------>
                <div class="buttonForm">
                    <a href="<?= base_url('admin/wisata') ?>" class="btn buttonCancelForm">Cancel</a>
                    <input type="submit" class="form-control buttonYesForm" value="Submit">
                </div>
            </containerInput>
            </form>
        </wisataCreate>

    </div>

    <section class="table-wrapper">
        <header class="tableHeader">
            <h2 class="text-left">Wisata</h2>
        </header>
        <br>
        <table class="table-striped table-hover">
            <thead class="tableHead">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Image</th>
                    <th>Nama</th>
                    <th >Jenis</th>
                    <th>Kategori</th>
                    <th>Kontak</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($wisata as $row) : ?>
                    <tr id="<?= $row->id ?>">
                        <td class="text-center"><?= $no ?></td>
                        <td><a href="<?= base_url('assets/img/photo_wisata/' . $row->image) ?>"><img src="<?= base_url('assets/img/photo_wisata/' . $row->image) ?>" alt="" width="80"></a></td>
                        <td><?= $row->nama_wisata ?></td>
                        <td><?= $row->jenis ?></td>
                        <td><?= $row->nama_kategori ?></td>
                        <td><?= $row->kontak ?></td>
                        <td class="text-dark">
                            <a href="<?= base_url() ?>admin/detail_wisata/<?= $row->id ?>" class="btn btn-success" title="detail"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url() ?>admin/edit_wisata/<?= $row->id ?>" class="btn btn-warning" title="edit"><i class="fas fa-edit"></i></a>
                            <a data-url="admin/delete_wisata/" class="btn btn-danger delete" title="delete"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
        
    </section>

</main>