/* ==============================================
MAP -->
=============================================== */

var locations = [
	['<div class="infobox"><h3 class="title"><a href="empresa_romero.html">Oficina</a></h3><span>Guardia Vieja 181, Providencia, Región Metropolitana</span><br><span>+56 989 12 4468</span></div>', -33.4241599,-70.6125553 ,2]
	];     
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 16,
		scrollwheel: false,
		navigationControl: true,
		mapTypeControl: false,
		scaleControl: false,
		draggable: true,
		styles: [ { "stylers": [ { "hue": "#ffffff" },  {saturation: -100},
		{gamma: 2} ] } ],
		center: new google.maps.LatLng(-33.4241599,-70.6125553),
		mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var infowindow = new google.maps.InfoWindow();
		var marker, i;
		for (i = 0; i < locations.length; i++) {  
		marker = new google.maps.Marker({ 
		position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
		map: map ,
		icon: 'images/marker.png'
		});
		google.maps.event.addListener(marker, 'click', (function(marker, i) {
		return function() {
		infowindow.setContent(locations[i][0]);
		infowindow.open(map, marker);
	}
	})(marker, i));
}
