function initMap() {
  var map;
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat:57.05474, lng:-2.13066},
    zoom: 15
  });

//directions

var directionsService = new google.maps.DirectionsService;
var directionDisplay = new google.maps.DirectionsRenderer( {
  draggable:true,
  map:map,

});

//directionDisplay.addListener("directions_changed" function() {
//  computeTotalDistance(directionDisplay.getDirections());
//});

renderRoute("Aberdeen", "Edinburgh", directionsService, directionDisplay);

function renderRoute(origin, destination, service, display) {
  service.route({
    origin: origin,
    destination: destination,
    travelMode: 'DRIVING',
    avoidTolls: true
  }, function(response, status) {
    if (status === "OK") {
      display.setDirections(response);
    } else {
      alert("Murray's an idiot, here's an error code so you can correct him: " +
       status);
    }
  });
}
}
