<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="box">
                <div class="box-body">
            <a href="<?php echo base_url('public');?>" class="btn  btn-block btn-warning"><i class="fa fa-arrow-left"></i> Kembali </a href="<?php echo base_url('public');?>">
                </div>
            </div>
        </div>
        <div class="col-md-10">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title text-center">Detail Data Tanah <?php echo $id;?></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div style="height:480px;" id="map-details"></div>
                    </div>
                    <div class="col-md-6">
                        <h5>Data Pemilik Data</h5>
                        <p>
                            <ul>
                                <li>Nama : </li>
                                <li>N I K : </li>
                                <li>Alamat : </li>
                            </ul>
                        </p>
                        <h5>Data Lokasi</h5>
                        <p>
                            <ul>
                                <li>Lokasi : </li>
                                <li>Luas : meter<sup>2</sup></li>
                            </ul>
                        </p>
                        <h5>Batas - Batas</h5>
                        <p>
                            <ul>
                                <li>Utara : </li>
                                <li>Selatan : </li>
                                <li>Timur : </li>
                                <li>Barat : </li>
                            </ul>
                        </p>
                    </div>                
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDbCwhTP2mtDKcb2s8A-bzrwMVKGwK-keY&libraries=geometry"></script>
<script> var baseUrl = '<?php echo base_url();?>';</script>
<script>
    var map;
    var allLatLng = [];
    var mapOptions = {
	zoom: 10,
	center: new google.maps.LatLng(-2.858830, 107.906900),
	// disableDefaultUI: true,
	mapTypeId: 'terrain',
	panControl: false,
	panControlOptions: {
		position: google.maps.ControlPosition.BOTTOM_LEFT
	},
	zoomControl: true,
	zoomControlOptions: {
		style: google.maps.ZoomControlStyle.LARGE,
		position: google.maps.ControlPosition.RIGHT_CENTER
	},
	scaleControl: false
};	

infowindow = new google.maps.InfoWindow({
	content: "holding..."
});

function initialize(){
    map = new google.maps.Map(document.getElementById('map-details'), mapOptions);
    <?php ?> 
    <?php ?>
    autoCenter()
}

function autoCenter() {
	var bounds = new google.maps.LatLngBounds();
	for (var i = 0, LtLgLen = allLatLng.length; i < LtLgLen; i++) {
		//  And increase the bounds to take this point
		bounds.extend(allLatLng[i]);
	}
	//  Fit these bounds to the map
	map.fitBounds(bounds);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>