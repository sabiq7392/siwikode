<main class="testimoni displayCenter noMax-width">
  <form action="<?= base_url() . 'admin/update_testimoni' ?>" method="POST">
    <h2 class="text-center">Edit Testimoni</h2>
    <hr><br>
    <containerInput class="container-input">
      <input type="hidden" name="id" value="<?= $testimoniId->id ?>">
      <!------------------>
      <div class="form-group">
          <label for="nama_testimoni" class="ourLabel">Nama</label> 
          <input id="nama_testimoni" name="nama_testimoni" type="text" class="form-control ourInput" value="<?=$testimoniId->nama_testimoni?>" required="required">
      </div>
      <!------------------>
      <div class="form-group">
          <label for="email" class="ourLabel">Email</label> 
          <input id="email" name="email" type="email" class="form-control ourInput" value="<?= $testimoniId->email?>" required="required">
      </div>
      <!------------------>
      <div class="form-group">
          <label for="wisata" class="ourLabel selectLabel">Wisata</label> 
          <select id="wisata" name="wisata" class="custom-select ourInput" required="required">
          <option value="<?= $testimoniId->wisata_depok_id ?>"><?= $wisataId->nama_wisata ?></option>
            <?php foreach ($wisata as $row) : ?>
              <?php if ($row->id != $testimoniId->wisata_depok_id) : ?>
                <option value="<?= $row->id ?>"><?= $row->nama_wisata ?></option>
              <?php endif ?>
            <?php endforeach ?>
          </select>
      </div>
      <!------------------>
      <div class="form-group">
          <label for="profesi" class="ourLabel selectLabel" >Profesi</label> 
          <select id="profesi" name="profesi" class="custom-select ourInput" required="required">
            <option value="<?= $testimoniId->profesi_id ?>"><?= $profesi[$testimoniId->profesi_id - 1]->nama_profesi ?></option>
            <?php foreach ($profesi as $row) : ?>
              <?php if ($row->id != $testimoniId->profesi_id) : ?>
                <option value="<?= $row->id ?>"><?= $row->nama_profesi ?></option>
              <?php endif ?>
            <?php endforeach ?>
          </select>
      </div>
      <!------------------>
      <div class="form-group">
        <label for="rating" class="ourLabel ratingLabel">Rating</label>
        <div class="col-10 ourInput" id="rating">
          <?php for ($i = 5; $i > 0; $i--) : ?>
            <input type="radio" name="rating" value="<?=$i?>" id="<?=$i?>" required="required"
            <?php if ($i == $testimoniId->rating) : ?>
              checked
            <?php endif ?>
            ><label for="<?=$i?>">☆</label>
          <?php endfor ?>
        </div>
      </div>
      <!------------------>
      <div class="form-group">
          <label for="komentar" class="ourLabel">Komentar</label> 
          <textarea id="komentar" name="komentar" type="text" class="form-control ourInput" value="<?=$testimoniId->komentar?>" cols="10" rows="5" required="required"><?=$testimoniId->komentar?></textarea>
      </div>
      <!------------------>
      <div class="buttonForm">
          <a href="<?=base_url('admin/testimoni')?>" class="btn buttonCancelForm">Cancel</a>
          <input type="submit" class="form-control buttonYesForm" value="Submit">
      </div>
    </containerInput>
  </form>
</main>
    