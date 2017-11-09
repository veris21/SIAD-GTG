<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php echo form_open_multipart(); ?>
      <table>
        <tr>
          <td>
            <div class="form-group">
              <label>Import Data Master Kependudukan</label>
              <input type="file" name="master_kk" class="form-control">
            </div>
          </td>
          <td>
            <button type="submit" name="import" class="btn btn-primary">Import Master Data KK</button>
          </td>
        </tr>
      </table>
      </form>
      <table width="100%" class="table table-striped table-bordered table-hover" id="master_kk">
        <thead>
          <tr>
            <th>NIK</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($master as $kk) {
            echo "<tr>";
            echo "<td>".$kk->nik."</td>";
            echo "<td>".$kk->nama."</td>";
            echo "<td>".$kk->alamat."</td>";
            echo "<td> Action </td>";
            echo "</tr>";
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
