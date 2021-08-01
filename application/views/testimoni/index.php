<main class="testimoni displayCenter noMax-width">
    <createButton class="createButtonFloating" id="createButtonFloating">
        <i class="fas fa-plus"></i>
        <p>Create Menu</p>
    </createButton>
    <floatingElement class="floatingElement" id="floatingElement">
        <wisataCreate class="formCreateContainer" id="formCreateContainer">
            <?= form_open_multipart('admin/store_testimoni'); ?>
            <header class="formHeader">
                <h2><i class="fas fa-plus mr-3"></i>Add Testimoni</h2>
                <hr><br>
            </header>
            <containerInput class="container-input">
                <div class="form-group">
                    <label for="nama_testimoni" class="ourLabel">Nama</label>
                    <input id="nama_testimoni" name="nama_testimoni" type="text" class="form-control ourInput" value="" required="required">
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="email" class="ourLabel">Email</label>
                    <input id="email" name="email" type="email" class="form-control ourInput" value="" required="required">
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="wisata" class="ourLabel selectLabel">Wisata</label>
                    <select id="wisata" name="wisata" class="custom-select ourInput" required="required">
                        <option value="">--- Wisata ---</option>
                        <?php foreach ($wisata as $row) : ?>
                            <option value="<?= $row->id ?>"><?= $row->nama_wisata ?></option>;
                        <?php endforeach; ?>
                    </select>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="profesi" class="ourLabel selectLabel">Profesi</label>
                    <select id="profesi" name="profesi" class="custom-select ourInput" required="required">
                        <option value="">--- Profesi ---</option>
                        <?php foreach ($profesi as $row) : ?>
                            <option value="<?= $row->id ?>"><?= $row->nama_profesi ?></option>;
                        <?php endforeach; ?>
                    </select>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="rating" class="ourLabel ratingLabel">Rating</label>
                    <div class="col-10 ourInput" id="rating">
                        <input type="radio" name="rating" value="5" id="5" checked><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="komentar" class="ourLabel">Komentar</label>
                    <textarea id="komentar" name="komentar" type="text" class="form-control ourInput" value="" cols="10" rows="5" required="required"></textarea>
                </div>
                <!------------------>
                <div class="buttonForm">
                    <a href="<?= base_url('testimoni') ?>" class="btn buttonCancelForm">Cancel</a>
                    <input type="submit" class="form-control buttonYesForm" value="Submit">
                </div>
            </containerInput>
            </form>
        </wisataCreate>
    </floatingElement>

    <div class="table-responsive table-wrapper">
        <section class="tableHeader">
            <h2 class="text-left">Testimoni</h2>
        </section>
        <br />
        <table class="table-bordered table-striped">
            <thead class="text-top">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Wisata</th>
                    <th>Profesi</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1;
                foreach ($testimoni as $row) : ?>
                    <tr id="<?= $row->id ?>">
                        <td><?= $no ?></td>
                        <td><?= $row->nama_testimoni ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->nama_wisata ?></td>
                        <td><?= $row->nama_profesi ?></td>
                        <td><?= $row->rating ?></td>
                        <td>
                            <details><?= $row->komentar ?></details>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>admin/edit_testimoni/<?= $row->id ?>" class="btn btn-warning">Edit</a>
                            <a data-url="admin/delete_testimoni/" class="btn btn-danger delete">Delete</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</main>