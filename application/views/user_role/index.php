<main class="userRole displayCenter noMax-width">
    <div class="table-responsive table-wrapper">
        <div class="topSectio">
            <h2 class="text-left">User Role</h2>
        </div>
        <br/>
        <table class="table-bordered table-striped">
            <thead class="text-top">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Active</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1;
                foreach ($user as $row) : ?>
                    <tr id="<?= $row->id ?>">
                        <td><?= $no ?></td>
                        <td class="text-left"><?= $row->username ?></td>
                        <td class="text-left"><?= $row->email ?></td>
                        <?php if ($row->role_id == 1) :?>
                        <td>Admin</td>
                        <?php else :?>
                        <td>Member</td>
                        <?php endif ?>
                        <?php if ($row->is_active == 1) :?>
                        <td>Yes</td>
                        <?php else :?>
                        <td>No</td>
                        <?php endif ?>
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