$(document).ready(function(){
  var koordinatAll = [];
  var nikAll = [];
  function initialize() {
    var map = new google.maps.Map(document.getElementById('map_stream'), {
      zoom: 13,
      center: new google.maps.LatLng(-2.975289, 108.158662),
      mapTypeId: 'terrain'
    });

    // =========================================
    var contentString = 'Data Maps Marker Desa Gantung';
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(-2.975289, 108.158662),
        map: map,
        html: contentString
    });
    marker.setMap(map);
    infoWindow = new google.maps.InfoWindow();
    google.maps.event.addListener(marker, 'click', function(e) {
      infoWindow.setContent(this.html);
      infoWindow.setPosition(e.latLng);
      infoWindow.open(map);
    });
    // ======================================
    
  }
  google.maps.event.addDomListener(window, 'load', initialize);
});
