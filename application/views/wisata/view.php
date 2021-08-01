<main class="wisata displayCenter noMax-width">
    <div class="detailTableContainer">
        <di class="detailTable">
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
        </di>
        <!-- <table class="table-hover">
            <tbody>
                <tr>
                    <td>ID#</td>
                    <td><?= $wisataId->id ?></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        <img src="<?= base_url('assets/img/photo_wisata/' . $wisataId->image) ?>" alt="" width="80">
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><?= $wisataId->nama_wisata?></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><p><?= $wisataId->deskripsi?></p></td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td><?= $jenis_wisata[$wisataId->jenis_wisata_id - 1]->jenis ?></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><?= $kategori[$wisataId->kategori_id - 1]->nama_kategori ?></td>
                </tr>
                <tr>
                    <td>Fasilitas</td>
                    <td><p><?= $wisataId->fasilitas?></p></td>
                </tr>
                <tr>
                    <td>Kontak</td>
                    <td><?= $wisataId->kontak?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?= $wisataId->alamat?></td>
                </tr>
                <tr>
                    <td>Latlong</td>
                    <td><?= $wisataId->latlong ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $wisataId->email?></td>
                </tr>
                <tr>
                    <td>URL</td>
                    <td><?= $wisataId->url ?></td>
                </tr>
            </tbody>
        </table> -->
    </div>
</main>