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

    <div class="table-wrapper">
        <header class="tableHeader">
            <h2 class="text-left">Testimoni</h2>
        </header>
        <br>
        <table class="table-striped table-hover">
            <thead class="tableHead">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th class="text-center">Wisata</th>
                    <th>Profesi</th>
                    <th class="text-center">Rating</th>
                    <th>Komentar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1;
                foreach ($testimoni as $row) : ?>
                    <tr id="<?= $row->id ?>">
                        <td><?= $no ?></td>
                        <td class="text-left"><?= $row->nama_testimoni ?></td>
                        <td class="text-left"><?= $row->email ?></td>
                        <td class="text-left"><?= $row->nama_wisata ?></td>
                        <td class="text-center"><?= $row->nama_profesi ?></td>
                        <td><?= $row->rating ?></td>
                        <td>
                            <details><?= $row->komentar ?></details>
                        </td>
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
    </div>
</main>