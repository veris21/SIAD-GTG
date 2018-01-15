// var baseUrl = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';		
var map;
var infowindow = null;
var color = '#' + Math.random().toString(16).substr(-6);
var markerId = [];
var markerName = [];
var markerLokasi = [];
var markerLuas = [];
var desa = [];
var dusun = [];
var assetTitik = [];
var allTitik = [];
var allLatLng = [];
var baseIcon = baseUrl + 'assets/';
var tempMarkerHolder = [];
var tipe = [];

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


function initialize() {	
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	$('[name="clickDesa"]').click( function(){
		var desa_id = $('[name="desa"]').val();
		$.ajax({
			type: "GET",
			url: baseUrl + 'api/stream/desa/' + desa_id,
			dataType: "JSON",
			success: function (data){
				$.each(data.results, function (i, val) {
					markerId.push(val.id);
					markerName.push(val.nama);
					markerLuas.push(val.luas);
					markerLokasi.push(val.lokasi);
					tipe.push(val.tanah_id);
				});
				var counter = 0;
				$.each(markerId, function(k, v){
					$.ajax({
						url: baseUrl + 'api/stream/marker/one/'+ v,
						type: "GET",
						dataType: "JSON",
						success: function (data){
							for(var key in data){
								// 
								var assetLat = -2.972340;
								var assetLng = 108.165548;
								var assetKeterangan = 'Balai Dusun';
								myAssetLatLng = new google.maps.LatLng(assetLat, assetLng);
								assetTitik = new google.maps.Marker({
									position: myAssetLatLng,
									map: map,
									icon: baseIcon + 'farm-icon.png',
									html:
										'<div class="markerPop">' +
										'<h4>Asset Desa BALAI DUSUN BARU</h4>' +
										'<p>' + assetKeterangan + '</p>' +										
										'<div>'
								});
								allLatLng.push(myAssetLatLng);
								tempMarkerHolder.push(assetTitik);
								// 

								var results = data[key];
								var lat = parseFloat(results['lat']);
								var lng = parseFloat(results['lng']);
								var keterangan = results['keterangan']; 
								var foto_tanah = results['foto_tanah'];
								myLatLng = new google.maps.LatLng(lat, lng);
								allTitik = new google.maps.Marker({
									position : myLatLng,
									map: map,									
									icon : baseIcon + 'house-icon.png',
									html: 
										'<div class="markerPop">' +
										'<h4>a/n. ' + markerName[counter] +'</h4>'+
										'<center><img width="160" src="' + baseUrl + 'assets/uploader/patok/' + foto_tanah +'"></center>'+
										'<p> Keterangan : ' + keterangan + '<br>' +
											'Luas :' + markerLuas[counter] +' meter<sup>2</sup><br>'+
											'Lokasi : ' + markerLokasi[counter] + '</p>' +
										'<div>'
								});
								allLatLng.push(myLatLng);
								tempMarkerHolder.push(allTitik);



								counter++;
							};
							google.maps.event.addListener(allTitik, 'click', function () {
								infowindow.setContent(this.html);
								infowindow.open(map, this);
							});

							google.maps.event.addListener(assetTitik, 'click', function () {
								infowindow.setContent(this.html);
								infowindow.open(map, this);
							});

							var bounds = new google.maps.LatLngBounds();
							for (var i = 0, LtLgLen = allLatLng.length; i < LtLgLen; i++) {
								//  And increase the bounds to take this point
								bounds.extend(allLatLng[i]);
							}
							//  Fit these bounds to the map
							map.fitBounds(bounds);
						}									
					});
				});
			}				
		});
		return false;
	});


	// KELOMPOKKAN PER DUSUN

	$('[name="clickDusun"]').click(function () {
		var dusun_id = $('[name="dusun"]').val();
		var titikDusun = new google.maps.Marker({
			position: new google.maps.LatLng(-2.959011, 108.144803),
			title: 'Hello World!'
		});
		titikDusun.setMap(map);
	});

	$('[name="clickNama"]').click(function () {
		var nik_id = $('[name="nikData"]').val();
		var titik = new google.maps.Marker({
			position: new google.maps.LatLng(-2.959697, 108.141756),
			title: 'Hello World!'
		});
		titik.setMap(map);
	});
}
google.maps.event.addDomListener(window, 'load', initialize);