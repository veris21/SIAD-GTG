<section class="content-header">
  <h1>
    Master Data Koordinat
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Koordinat</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-globe"></i> Visual Data Koordinat</h3>
        </div>
        <div class="box-body">
          <div style="height:360px;" id="map_canvas"></div>
        </div>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Tabel Koordinat &amp; Keterangan Tanah</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-koordinat">
          <thead>
            <tr valign="center" align="center" style="font-weight:bolder;">
              <td>Keterangan</td>
              <td>Koordinat</td>
              <td>Luas</td>
              <td>#</td>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($koordinat as $koordinat) {
              echo "<tr>";
              echo "<td><b>$koordinat->keterangan</b></td>";
              if ($koordinat->koordinat) {
                echo "<td>$koordinat->koordinat</td>";
                echo "<td>";

                echo ($koordinat->luas!=NULL || $koordinat->luas!='' ? "<b><i>".number_format($koordinat->luas, 0, ",", ".")."</i></b> meter<sup>2</sup>" : '<p  class="text-center"><i>Data Luas Tidak Ada !!!</i></p>');
                echo "</td>";
              }else {
                echo "<td align='center'>Data Koordinat Dan Dokumentasi<br> Belum Tersedia!!</td>";
                echo "<td><a class='btn btn-flat btn-danger' href='".BASE_URL."patok/input/".$koordinat->id."'>Lengkapi Data Batas <i class='fa fa-ban'></i></a></td>";
              }
              echo "<td width='60' align='center'>";
              ?>
              <a class="btn btn-xs btn-info" href="<?php echo BASE_URL.'maps/view/'.$koordinat->id; ?> "><i class="fa fa-eye fa-fw"></i></a>
              <a class="btn btn-xs btn-warning" href="<?php echo BASE_URL.'koordinat/edit/'.$koordinat->id; ?> "><i class="fa fa-edit fa-fw"></i></a>
              <?php
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div><!-- /.box-body -->
      <div class="box-footer">
          <a href="<?php echo BASE_URL.'koordinat/input'; ?>" class="btn btn-flat btn-success pull-right">Input Koordinat</a>
      </div>
    </div><!-- /.box -->
  </div>
</div>
</section>
<script type="text/javascript" src="http://maps.google.com/maps/api/js??key=AIzaSyAQZ5juJWnQk7IjkS1xtzSzor1bChd_L3A&libraries=drawing,geometry,distance"></script>
<script type="text/javascript">
  <?php $id = 1; $koor = $this->tanah_model->get_data_koordinat_all()->result(); ?>
  function initialize() {
    map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: 14,
      center: new google.maps.LatLng(-2.975289, 108.158662),
      mapTypeId: 'terrain'
    });
    <?php foreach ($koor as $koor) { ?>
    var datalist = '<?php echo $koor->koordinat;?>';
    var dataSplit = datalist.split(/\s/);
    var text = [];
    for (var i = 0; i < dataSplit.length; i++) {
      var arr = dataSplit[i].split(",");
      text.push(new google.maps.LatLng(parseFloat(arr[0]), parseFloat(arr[1])));
      console.log("lat :"+arr[0]+" Lng : "+arr[1]);
    }
    var color = '#'+Math.random().toString(16).substr(-6);
    var area = google.maps.geometry.spherical.computeArea(text);
    var contentString = '<b><?php echo $koor->keterangan;?></b><br><br>Luas :  '+(area).toFixed(2)+' meter<sup>2</sup>';
    polygon = new google.maps.Polygon({
        paths: [text],
        strokeColor:'#000000',
        strokeOpacity: 1,
        strokeWeight: 2,
        // fillColor:color,
        // fillOpacity: 0.9,
        html: contentString
    });
    var text=[];
  polygon.setMap(map);
  infoWindow = new google.maps.InfoWindow();
  google.maps.event.addListener(polygon, 'click', function(e) {
    infoWindow.setContent(this.html);
    infoWindow.setPosition(e.latLng);
    infoWindow.open(map);
  });
  <?php
  }?>
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
