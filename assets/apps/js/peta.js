var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';		
var map;
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
}


google.maps.event.addDomListener(window, 'load', initialize);