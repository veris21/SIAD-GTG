var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';		
var map;
var desa = [];
var dusun = [];
var nama = '';

var mapOptions = {
	zoom: 10,
	center: new google.maps.LatLng(-2.858830, 107.906900),
	disableDefaultUI: true,
	mapTypeId: 'satellite',
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
var color = '#' + Math.random().toString(16).substr(-6);

function initialize() {
	
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	// map.data.setStyle({
	// 	strokeColor: '#FF0000',
	// 	strokeWeight: 1,
	// 	fillColor: color,
	// 	fillOpacity: 0.6
	// });
	$('[name="clickDesa"]').click( function(){
		var desa_id = $('[name="desa"]').val();
		var titikDesa = new google.maps.Marker({
			position: new google.maps.LatLng(-2.858830, 107.906900),
			title: 'Hello World!'
		});
		titikDesa.setMap(map);
	});

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