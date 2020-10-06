// Embed a map using JavaScript.
// Map API courtesy of Google Maps.
function initMap()
{
	// Settings for map:
	var options = {
		zoom: 8,
		centre: {lat: 53.3900, lng: -2.5970}
	};
	
	// Creating a map:
	var map = new google.maps.Map(document.getElementById('map'), options);
	
	// Creating markers:
	var marker1 = new google.maps.Marker({
		position: {lat: 53.4052, lng: -2.9229},
		map: map
	});
	
	var marker2 = new google.maps.Marker({
		position: {lat: 53.4774, lng: -2.2309},
		map: map
	});
}