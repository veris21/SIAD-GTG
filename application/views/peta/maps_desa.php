<div class="box box-warning">
  <div class="box-body">
    <div style="height: 360px;" id="map_canvas"></div>
  </div>
</div>
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
        strokeColor:'#FF0000',
        strokeOpacity: 0,
        strokeWeight: 2,
        fillColor:color,
        fillOpacity: 0.9,
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
