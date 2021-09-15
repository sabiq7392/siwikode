<main class="menuManagement displayCenter noMax-width">
    <createButton class="createButtonFloating" id="createButtonFloating">
        <i class="fas fa-plus"></i>
        <p>Create Menu</p>
    </createButton>
    <floatingElement class="floatingElement" id="floatingElement">
        <menuCreate class="formCreateContainer" id="formCreateContainer">
            <form action="<?= base_url('admin/store_menu') ?>" method="POST">
                <section class="formHeader">
                    <h2><i class="fas fa-plus mr-3"></i>Add Menu</h2>
                    <hr><br>
                </section>

                <containerInput class="container-input">
                    <div class="form-group">
                        <label for="menu_title" class="ourLabel">Title</label>
                        <input id="menu_title" name="menu_title" type="text" class="form-control ourInput">
                        <?= form_error('menu_title', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <!------------------>
                    <div class="form-group">
                        <label for="menu_url" class="ourLabel">URL</label>
                        <input id="menu_url" name="menu_url" type="text" class="form-control ourInput">
                        <?= form_error('menu_url', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <!------------------>
                    <div class="form-group">
                        <label for="menu_icon" class="ourLabel">Icon</label>
                        <input id="menu_icon" name="menu_icon" type="text" class="form-control ourInput">
                        <?= form_error('menu_icon', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <!------------------>
                    <div class="form-group">
                        <label class="ourLabel selectLabel" for="menu_access_rights">Access Rights</label>
                        <select name="menu_access_rights" id="menu_access_rights" class="custom-select ourInput">
                            <?php foreach ($whoCanAccessMenu as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('menu_access_rights', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <!------------------>
                    <div class="buttonForm">
                        <a href="<?= base_url('admin/menu') ?>" class="btn buttonCancelForm">Cancel</a>
                        <input type="submit" class="form-control buttonYesForm" value="Submit">
                    </div>
                </containerInput>
            </form>
        </menuCreate>
    </floatingElement>
    <!------------------>
    <div class="table-wrapper">
        <header class="tableHeader">
            <h2>Menu</h2>
        </header>
        <br>
        <table class="table-striped table-hover">
            <thead class="tableHead">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Icon</th>
                    <th>Access Rights</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($menu as $row) : ?>
                    <tr id="<?= $row->id ?>">
                        <td><?= $no ?></td>
                        <td><?= $row->title ?></td>
                        <td><?= $row->url ?></td>
                        <td><?= $row->icon ?></td>
                        <td class="text-center"><?= $row->menu ?></td>
                        <td class="text-dark">
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