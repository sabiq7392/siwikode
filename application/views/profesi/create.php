<main class="container-fluid main userPage">
    <h2>Tambahkan Profesi</h2>
    <form action="store" method="POST">
      <div class="form-group row">
        <label for="nama_profesi" class="col-4 col-form-label">Profesi</label> 
        <div class="col-8">
          <input id="nama_profesi" name="nama_profesi" type="text" required="required" class="form-control">
        </div>
      </div>
      
      <div class="form-group row">
        <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
</main>