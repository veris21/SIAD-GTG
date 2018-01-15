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

var allTitik = [];
var allLatLng = [];

var tempMarkerHolder = [];
// var SQUARE_PIN;

var mapOptions = {
	zoom: 10,
	center: new google.maps.LatLng(-2.858830, 107.906900),
	// disableDefaultUI: true,
	mapTypeId: 'roadmap',
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
				});
				var counter = 0;
				$.each(markerId, function(k, v){
					$.ajax({
						url: baseUrl + 'api/stream/marker/one/'+ v,
						type: "GET",
						dataType: "JSON",
						success: function (data){
							for(var key in data){
								var results = data[key];
								var lat = parseFloat(results['lat']);
								var lng = parseFloat(results['lng']);
								var keterangan = results['keterangan'];
								myLatLng = new google.maps.LatLng(lat, lng);
								allTitik = new google.maps.Marker({
									position : myLatLng,
									map: map,
									icon: {
											path: SQUARE_PIN,
											fillColor: '#00CCBB',
											fillOpacity: 1,
											strokeColor: '',
											strokeWeight: 0
										},
									map_icon_label: '<span class="map-icon map-icon-point-of-interest"></span>',
									html: 
										'<div class="markerPop">' +
											'<h1>a/n. ' + markerName[counter] +'</h1>'+
										'<h3>' + keterangan + '</h3>' +
											'<p> Luas ' + markerLuas[counter] +' meter<sup>2</sup></p>'+
											'<p>Lokasi : ' + markerLokasi[counter] + '</p>' +
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