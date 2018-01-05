$(function() {
		var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
		
		//map options
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
		
	//Fire up Google maps and place inside the map-canvas div
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
});