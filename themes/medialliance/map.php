
<div id="map_canvas"></div>
<div id="map_canvas2"></div>



<script type="text/javascript"> 
 var map,map2;

jQuery(document).ready(function(){
	initMap();
});


  function initMap(condition) {
  // create the map


	

	var myOptions1 = {
		zoom: 14,
		center: new google.maps.LatLng(45.493735, -73.576533),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true
	}
	var myOptions2 = {
		zoom: 14,
		center: new google.maps.LatLng(46.826348, -71.275933),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true
	}
	
	/* Look des markeurs */
	var iconMarker = {
		url: 'wp-content/themes/medialliance/images/marker.png',
		size: new google.maps.Size(30, 39),
		origin: new google.maps.Point(0,0),
		zIndex:999
	};	
	
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions1);
    map2 = new google.maps.Map(document.getElementById("map_canvas2"), myOptions2);  
	
	
	var styles = [
	  {
		stylers: [
		  { lightness: -65 },
		  { saturation: -100 }
		]
	  }
	];
	
	map.setOptions({styles: styles});
	map2.setOptions({styles: styles});
	
	
	marker1 = new google.maps.Marker({
			position: new google.maps.LatLng( 45.503868, -73.554062 ),
			map: map,
			icon: iconMarker
	})
	marker2 = new google.maps.Marker({
			position: new google.maps.LatLng( 46.836559, -71.295708 ),
			map: map2,
			icon: iconMarker
	})
}



</script> 