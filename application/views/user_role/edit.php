<main class="userRole displayCenter noMax-width">
  <form action="<?= base_url() . 'admin/update_user_role/' ?>" method="POST">
    <h2 class="text-center">Edit Role <?= $user->username ?></h2>
    <hr><br>
    <containerInput class="container-input">
      <input type="hidden" name="id" value="<?= $user->id ?>">
      <input type="hidden" name="username" value="<?= $user->username ?>">
      <input type="hidden" name="email" value="<?= $user->email ?>">
      <input type="hidden" name="image" value="<?= $user->image ?>">
      <input type="hidden" name="profesi" value="<?= $user->profesi ?>">
      <input type="hidden" name="deskripsi" value="<?= $user->deskripsi ?>">
      <input type="hidden" name="password" value="<?= $user->password ?>">
      <input type="hidden" name="date_created" value="<?= $user->date_created ?>">
      <!------------------>
      <div class="form-group">
        <label for="role_id" class="ourLabel">Role</label>
        <?php
        $role = 'Administrator';
        if ($role_id != "1") {
          $role = 'Member';
        } ?>
        <select id="role_id" name="role_id" class="custom-select ourInput" required="required">
          <option value="<?= $role_id ?>"><?= $role ?></option>
          <?php if ($user->role_id == "1") : ?>
            <option value="2">Member</option>
          <?php else : ?>
            <option value="1">Administrator</option>
          <?php endif ?>
        </select>
      </div>
      <!------------------>
      <div class="form-group">
        <label for="is_active" class="ourLabel">Status</label>
        <?php
        $active = 'Yes';
        if ($is_active != "1") {
          $active = 'False';
        } ?>
        <select id="is_active" name="is_active" class="custom-select ourInput" required="required">
          <option value="<?= $is_active ?>"><?= $active ?></option>
          <?php if ($user->is_active == "1") : ?>
            <option value="0">No</option>
          <?php else : ?>
            <option value="1">Yes</option>
          <?php endif ?>
        </select>
      </div>
      <!------------------>
      <div class="buttonForm">
        <a href="<?= base_url('admin/user_role') ?>" class="btn buttonCancelForm">Cancel</a>
        <input type="submit" class="form-control buttonYesForm update" value="Submit">
      </div>
    </containerInput>
  </form>
</main>