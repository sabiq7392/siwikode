<main class="wisata displayCenter noMax-width">
    <div class="detailTableContainer">
        <div class="detailTable">
            <div class="detailTableRow">
                <div>ID#</div>
                <div><?= $wisataId->id?></div>
            </div>
            <div class="detailTableRow">
                <div>Image</div>
                <div><a href="<?= base_url('assets/img/photo_wisata/' . $wisataId->image) ?>"><img src="<?= base_url('assets/img/photo_wisata/' . $wisataId->image) ?>" alt="" width="80"></a></div>
            </div>
            <div class="detailTableRow">
                <div>Nama</div>
                <div><?= $wisataId->nama_wisata?></div>
            </div>
            <div class="detailTableRow">
                <div>Deskripsi</div>
                <div><?= $wisataId->deskripsi?></div>
            </div>
            <div class="detailTableRow">
                <div>Jenis</div>
                <div><?= $jenis_wisata[$wisataId->jenis_wisata_id - 1]->jenis ?></div>
            </div>
            <div class="detailTableRow">
                <div>Kategori</div>
                <div><?= $kategori[$wisataId->kategori_id]->nama_kategori?></div>
            </div>
            <div class="detailTableRow">
                <div>Fasilitas</div>
                <div><?= $wisataId->fasilitas ?></div>
            </div>
            <div class="detailTableRow">
                <div>Kontak</div>
                <div><?= $wisataId->kontak ?></div>
            </div>
            <div class="detailTableRow">
                <div>Alamat</div>
                <div><address><?= $wisataId->alamat ?></address></div>
            </div>
            <div class="detailTableRow">
                <div>Latlong</div>
                <div><?= $wisataId->latlong ?></div>
            </div>
            <div class="detailTableRow">
                <div>Email</div>
                <div><?= $wisataId->email ?></div>
            </div>
            <div class="detailTableRow">
                <div>URL</div>
                <div><?= $wisataId->url ?></div>
            </div>
        </div>
    </div>
</main>