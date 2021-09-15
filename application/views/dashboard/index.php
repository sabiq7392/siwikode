<main class="admin">
    <div class="shorting" id="shorting">
        <a href="#" class="backgroundShorting">Show All</a>
        <a href="#">Wisata Rekreasi</a>
        <a href="#">Wisata Kuliner</a>
    </div>
    <div class="wisataRekreasi" id="wisataRekreasi">
        <header>
            <h1>Wisata Rekreasi</h1>
        </header>
        <div class="containerWisata">
        <?php foreach($wisata as $row):?>
            <?php if ($row->jenis == 'Wisata Rekreasi'):?>
                <wisataPreview class="wisataPreview">
                    <wisataHeader class="wisataHeader">
                        <div class="wisataImage">
                            <img src="<?=base_url('assets/img/photo_wisata/'.$row->image)?>" alt="<?=$row->nama_wisata?>">
                        </div>
                        <div class="wisataName"> 
                            <h3><?=$row->nama_wisata?></h3>
                            <p><span>Kategori : </span><?=$row->nama_kategori?></p>
                        </div>
                    </wisataHeader>
                    <!-------------->
                    <wiasataBody class="wisataBody">
                        <div class="wisataDescription">
                            <div class="wisataDetailDescription">
                                <address><span>Alamat : </span><?=$row->alamat?></address><br>
                                <p class="info">
                                    <b>Kontak : </b><?=$row->kontak?><br>
                                    <b>Fasilitas : </b><?=$row->fasilitas?><br>
                                    <b>Latlong : </b><?=$row->latlong?><br>
                                    <b>Email : </b><?=$row->email?><br>
                                    <b>Website : </b><?=$row->url?><br>
                                </p>
                                <hr>
                                <p class="deskripsi"><?=$row->deskripsi?></p>
                            </div>
                        </div>
                    </wiasataBody>
                </wisataPreview>
            <?php endif;?>
        <?php endforeach;?>
        </div>
    </div>
    <!----------------------->

    <div class="wisataKuliner" id="wisataKuliner">
        <header>
            <h1>Wisata Kuliner</h1>
        </header>
        <div class="containerWisata">
        <?php foreach($wisata as $row):?>
            <?php if ($row->jenis == 'Wisata Kuliner'):?>
                <wisataPreview class="wisataPreview">
                    <wisataHeader class="wisataHeader">
                        <div class="wisataImage">
                            <img src="<?=base_url('assets/img/photo_wisata/'.$row->image)?>" alt="<?=$row->nama_wisata?>">
                        </div>
                        <div class="wisataName"> 
                            <h3><?=$row->nama_wisata?></h3>
                            <p><span>Kategori : </span><?=$row->nama_kategori?></p>
                        </div>
                    </wisataHeader>
                    <!-------------->
                    <wiasataBody class="wisataBody">
                        <div class="wisataDescription">
                            <div class="wisataDetailDescription">
                                <address><span>Alamat : </span><?=$row->alamat?></address><br>
                                <p class="info">
                                    <b>Kontak : </b><?=$row->kontak?><br>
                                    <b>Fasilitas : </b><?=$row->fasilitas?><br>
                                    <b>Latlong : </b><?=$row->latlong?><br>
                                    <b>Email : </b><?=$row->email?><br>
                                    <b>Website : </b><?=$row->url?><br>
                                </p>
                                <hr>
                                <p class="deskripsi"><?=$row->deskripsi?></p>
                            </div>
                        </div>
                    </wiasataBody>
                </wisataPreview>
            <?php endif;?>
        <?php endforeach;?>
        </div>
    </div>
</main>