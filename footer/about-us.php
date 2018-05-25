<script>
  (function() {
    var cx = '004930224498916373948:tghnsqrjxje';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[1];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<h1><center>About Us</center></h1>
<h2><center>This Website is respond by Xie Yuncheng.</center></h2>
<h2><center>For Academic!!!</center></h2>
<gcse:search></gcse:search>
<button style="width: 100px;height: 50px; border: 2px double; border-radius: 15px; background-color: #128954;">Arguments</button>
<div id="map" style="width:100%;height:400px;"></div>

<script>
      function initMap() {
        //first marker
        var uluru = {lat: 53.827010, lng: -1.594166};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          title: 'Click to zoom'
        });
        map.addListener('center_changed', function() {
        // 3 seconds after the center of the map has changed, pan back to the
        // marker.
        window.setTimeout(function() {
          map.panTo(marker.getPosition());
          }, 3000);
        });

        marker.addListener('click', function() {
          map.setZoom(14);
          map.setCenter(marker.getPosition());
        });
        //second marker
        var cood = {lat:53.804162,lng:-1.548351 };
        var secMaker = new google.maps.Marker({
          position: cood,
          map: map,
        });
        //zoom level
        var infowindow = new google.maps.InfoWindow({
          content: 'Change the zoom level',
          position: uluru
        });
        infowindow.open(map);

        map.addListener('zoom_changed', function() {
          infowindow.setContent('Zoom: ' + map.getZoom());
        });
        //button function
        $("button").click(function(){
          map.addListener('click', function(e) {
            placeMarkerAndPanTo(e.latLng, map);
          });
        });
      }
      function placeMarkerAndPanTo(latLng, map) {
        var marker = new google.maps.Marker({
          position: latLng,
          map: map
        });
        map.panTo(latLng);
      }
    </script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoiI5i2xab6KL002Km4wny4SCPhIhlUAU&callback=initMap">
</script>
