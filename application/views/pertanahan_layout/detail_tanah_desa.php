<section class="content-header">
  <h1>
    Data Layer Aset Pertanahan Desa
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
        <h3 class="box-title"><i class="fa fa-map"></i> Data Layer <?php echo $data['keterangan'];?></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
              <div style="height:520px;" id="map-desa"></div>
          </div>
          <div class="col-md-5">
              <table width="100%" class="table table-striped table-bordered table-hover" id="list_aset_layer">
                  <thead>
                    <tr>
                      <td>Batas - Batas</td>
                      <td>Foto</td>
                      <td>Koordinat</td>
                      <td>#</td>
                    </tr>                  
                  </thead>        
                  <tbody>
                    <?php         
                    foreach ($layer as $layer) {
                      echo "<tr>";
                      echo "<td>Utara : ".$layer->utara."<br>
                      Selatan : ".$layer->selatan."<br>
                      Timur : ".$layer->timur."<br>
                      Barat : ".$layer->barat."</td>";
                      echo "<td><img class='img img-rounded img-responsive main-img' width='120' src='".base_url().PATOK.$layer->link_dokumentasi."'></td>";
                      echo "<td>Latitude : ".$layer->lat."<br> Longitude : ".$layer->lng." </td>";
                      echo "<td align='center' width='70'>
                      <button onclick='edit_aset_layer(".$layer->id.")' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i></button>
                      <button onclick='hapus_aset_layer(".$layer->id.")' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>
                      </td>";
                      echo "</tr>";
                    }
                    ?>         
                  </tbody>        
                </table>
          </div>
        </div>
      </div>
      <div class="box-footer">
              <div class="pull-right">
                  <button onclick="input_aset_layer()" class="btn btn-primary btn-sm">Input Data Layer Aset Tanah <i class="fa fa-map-o"></i></button>
              </div>
      </div>
    </div>
  </div>
</div>
</section>


<!--  -->
<div class="modal fade" id="modal_aset_desa" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Input Info Layer Aset Pertanahan Desa</h3>
      </div>
      <?php echo form_open_multipart('', array('id'=>'aset_desa_form','class'=>'form-horizontal'));?>
      <div class="modal-body form">
            <!--  -->
            <div id="foto-patok" class="form-group">
               <img src="" class=" col-sm-12 img img-rounded img-responsive" alt="FOTO PATOK">
            </div>
            <div id="batas">
                  <div class="form-group">
                    <label  class="control-label col-sm-4" for="">Batas Utara</label>
                    <div class="col-sm-8">
                        <input type="text" name="utara" class="form-control" id="">                        
                    </div>                        
                  </div>
                  <div class="form-group">
                    <label  class="control-label col-sm-4" for="">Batas Selatan</label>
                    <div class="col-sm-8">
                        <input type="text" name="selatan" class="form-control" id="">                        
                    </div>                        
                  </div>
                  <div class="form-group">
                    <label  class="control-label col-sm-4" for="">Batas Timur</label>
                    <div class="col-sm-8">
                        <input type="text" name="timur" class="form-control" id="">                        
                    </div>                        
                  </div>
                  <div class="form-group">
                    <label  class="control-label col-sm-4" for="">Batas Barat</label>
                    <div class="col-sm-8">
                        <input type="text" name="barat" class="form-control" id="">                        
                    </div>                        
                  </div>
            </div>
            <div id="LatLng">
              <div class="form-group">
                  <label  class="control-label col-sm-4" for="">Latitude</label>
                  <div class="col-sm-8">
                      <input type="text" name="lat" class="form-control" id="">                        
                  </div>                        
              </div>
              <div class="form-group">
                  <label  class="control-label col-sm-4" for="">Longitude</label>
                  <div class="col-sm-8">
                      <input type="text" name="lng" class="form-control" id="">                        
                  </div>                        
              </div>
            </div>
            <div id="foto" class="form-group">
                  <label  class="control-label col-sm-4" for="">Foto Tempat <br> <small style="font-size:11px;">Format (.jpg/.jpeg) max.4 MB</small></label>
                  <div class="col-sm-8">
                      <input type="file" name="patok" class="form-control" id="">                        
                  </div>                        
             </div>
            <!--  -->
            <input type="hidden" name="data_link_id" value="<?php echo $data['id'];?>">
            <input type="hidden" name="id_patok" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" onclick="save_aset()" class="btn btn-success">Save Data Aset <i class="fa fa-map-o"></i></button>
      </div>
    </div>
   </div>
 </div>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY&libraries=geometry"></script>
<script>
var infowindow = null;
var allTitik = [];
var titik = [];
var map;
var color = '#'+Math.random().toString(16).substr(-6);
infowindow = new google.maps.InfoWindow({
	content: "holding..."
});
var baseIcon = '<?php echo base_url();?>assets/administration.png';
function initialize() {
  map = new google.maps.Map(document.getElementById('map-desa'), {
    zoom: 10,
    center: { lat: -2.974813, lng: 108.159151 },
    mapTypeId: 'terrain',
    // mapTypeControl: false,
    // disableDefaultUI: true
  });
  var bounds = new google.maps.LatLngBounds();
	for (var i = 0, LtLgLen = allTitik.length; i < LtLgLen; i++) {
		//  And increase the bounds to take this point
		bounds.extend(allTitik[i]);
	}
	//  Fit these bounds to the map
    map.fitBounds(bounds);
    

  // map.data.setStyle({
  // strokeColor:'#FF0000',
  // strokeWeight: 1,
  // fillColor: color,  
  // fillOpacity: 0.6
  // });
  // map.data.loadGeoJson('<?php //echo base_url().GEOJSON.$titik['json'];?>');
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>