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
                    <th>Role</th>
                    <th>Active</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1;
                foreach ($user as $row) : ?>
                    <tr id="<?= $row->id ?>">
                        <td><?= $no ?></td>
                        <td><?= $row->username ?></td>
                        <td><?= $row->email ?></td>
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
                        <td>
                            <a href="<?= base_url() ?>admin/edit_user_role/<?= $row->id ?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</main>