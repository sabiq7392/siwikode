<h1 class="pl-3 pr-3">Edit Wisata Kuliner</h1>
<div id="page-content-wrapper">
    <div class="container mt-3">
        <form action="<?=base_url().'profesi/update'?>" method="POST">

            <div class="form-group row">
                <input type="hidden" name="id" value="<?=$profesi->id?>">
                <label for="nama_profesi" class="col-4 col-form-label">Nama Profesi</label> 
                <div class="col-8">
                    <input name="nama_profesi" type="text" class="form-control" value="<?=$profesi->nama_profesi?>" required="required">
                </div>
                
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary update">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>