<main class="menuManagement displayCenter noMax-width">
    <menuEdit class="menuEdit">
        <form action="<?= base_url('admin/update_menu')?>" method="POST">
            <h2 class="text-center">Edit Menu</h2>
            <hr><br>
            <containerInput class="container-input">
                <input type="hidden" name="id" value="<?= $menuId->id ?>">
                <div class="form-group">
                    <label for="menu_title" class="ourLabel">Title</label> 
                    <input id="menu_title" name="menu_title" type="text" class="form-control ourInput" value="<?=$menuId->title?>">
                    <?= form_error('menu_title', '<small class="text-danger">', '</small>') ?>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="menu_url" class="ourLabel">URL</label> 
                    <input id="menu_url" name="menu_url" type="text" class="form-control ourInput" value="<?=$menuId->url?>">
                    <?= form_error('menu_url', '<small class="text-danger">', '</small>') ?>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="menu_icon" class="ourLabel">Icon</label> 
                    <input id="menu_icon" name="menu_icon" type="text" class="form-control ourInput" value="<?=$menuId->icon?>">
                    <?= form_error('menu_icon', '<small class="text-danger">', '</small>') ?>
                </div>
                <!------------------>
                <div class="form-group">
                    <label for="menu_access_rights" class="ourLabel selectLabel">Access Rights</label> 
                    <select name="menu_access_rights" id="menu_access_rights" class="custom-select ourInput">
                        <option value="<?=$menuId->menu_id?>"><?=$whoCanAccessMenu[$menuId->menu_id - 1]->menu?></option>
                        <?php foreach($whoCanAccessMenu as $row): ?>
                        <?php if ($row->id != $menuId->menu_id):?>
                        <option value="<?= $row->id?>"><?= $row->menu ?></option>
                        <?php endif;?>
                        <?php endforeach;?>
                    </select>
                    <?= form_error('menu_access_rights', '<small class="text-danger">', '</small>') ?>
                </div>
                <!------------------>
                <div class="buttonForm">
                    <a href="<?=base_url('admin/menu')?>" class="btn buttonCancelForm">Cancel</a>
                    <input type="submit" class="form-control buttonYesForm" value="Submit">
                </div>
            </containerInput>
        </form>
    </menuEdit>
</main>