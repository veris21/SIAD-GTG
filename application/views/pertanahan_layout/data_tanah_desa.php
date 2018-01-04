<section class="content-header">
  <h1>
    Data Aset Pertanahan Desa
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Aset Tanah Desa</li>
  </ol>
</section>
<section class="content">
<div class="row">
  <div class="col-md-12">
    
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-map"></i> Data Administrasi Desa</h3>
      </div>
      <div class="box-body">
        <div style="height:480px;" id="map-desa"></div>
      </div>
      <div class="box-footer">
        <?php if($titik!=null){
              echo "<h2 class='text-center'>Data JSON : ".$titik['json']."</h2>";
          }else{ 
            echo "<h2 class='text-center'>Data Geo JSON Kosong</h2>";
            ?>
       <button onclick="add_geo()" class="btn btn-warning btn-block">Upload Data Desa (GeoJSON) <i class="fa fa-globe"></i></button>
       <?php } ?>
      </div>
    </div>
  </div>
</div>
</section>



<!-- Modal Setuju Dan Pilihan Rekomedasi -->
<div class="modal fade" id="modal_geo" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input GeoJSON Koordinat Batas Desa</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'data_geo','class'=>'form-horizontal'));?>
      <div class="modal-body form">
          
            <div class="box box-warning">
                <div class="box-body"> 
                   <!--  -->                  
                  <div class="well">
                    <p>Pastikan Data yang di upload merulakan hasil export KML batas desa berformat .geojson atau .json Silahkan Download Contoh Format Data GeoJSON <a target"__blank" href="<?php echo base_url().GEOJSON.'batas-desa.geojson'; ?>">Disini ! </a></p>
                  </div>
                    <div id="geojson" class="form-group">
                        <label  class="control-label col-sm-4" for="">File Format (.geojson/.json)</label>
                        <div class="col-sm-8">
                            <input type="file" name="geofile" class="form-control" id="">                        
                        </div>                        
                    </div>                

                    <!-- <div id="keterangan" class="form-group">
                        <label  class="control-label col-sm-4" for="">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea rows="4" cols="8" class="form-control" name="keterangan"></textarea>                  
                        </div>                        
                    </div> -->
                    <!--  -->
                </div>
            </div>
                    
      </div>
      <input type="hidden" name="desa_id" value="<?php echo $this->session->userdata('desa_id');?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_geo()" class="btn btn-success">Save GeoJSON <i class="fa fa-map-o"></i></button>
      </div>
    </form>
    </div> 
  </div> 
</div>



<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY&libraries=geometry"></script>
<script>

var map;
var color = '#'+Math.random().toString(16).substr(-6);
function initialize() {
  map = new google.maps.Map(document.getElementById('map-desa'), {
    zoom: 10,
    center: { lat: -2.974813, lng: 108.159151 },
    mapTypeId: 'terrain',
    // mapTypeControl: false,
    // disableDefaultUI: true
  });
  
  map.data.setStyle({
  strokeColor:'#FF0000',
  strokeWeight: 1,
  fillColor: color,  
  fillOpacity: 0.6
  });
  map.data.loadGeoJson('<?php echo base_url().GEOJSON.$titik['json'];?>');
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>