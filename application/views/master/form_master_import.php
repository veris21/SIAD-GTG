<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="well">
        <h1>Halaman Master Import Data Utama</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
    <div class="col-md-4">
      <?php echo form_open_multipart(); ?>
      <div class="form-group">
        <label>Import Master Data Penduduk</label>
        <input type="file" name="file" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" name="import" class="btn btn-block btn-default">Import Data Ke Database</button>
      </div>
    </form>
    </div>
  </div>
</div>
