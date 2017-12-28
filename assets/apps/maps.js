var map;
function initialize() {
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 14,
    center: new google.maps.LatLng(-2.975289, 108.158662),
    mapTypeId: 'terrain',
    mapTypeControl: false,
    disableDefaultUI: true
  });
}
google.maps.event.addDomListener(window, 'load', initialize);