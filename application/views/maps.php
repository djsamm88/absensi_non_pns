<?php
//die("Hello world");

/*
$vertices_x = array(2.5436682160702135, 2.543196612333019,2.542725008423413,2.542725008423413,2.536915691588293, 2.537022874792228, 2.541846109768261);

$vertices_y = array(98.3149723332881, 98.31973593649855, 98.32254689154615, 98.3239416402339, 98.31977885184278,98.31656020102491,98.31383507666578);




$points_polygon = count($vertices_x) - 1;  // number vertices - zero-based array

$db = new mysqli("localhost","ujicobap_lokasi","Pakpak8888","ujicobap_lokasi");
*/

$lat_x = $byId->lat;
$lng_y = $byId->lng;

//$image = "data:image/png;base64, ".$key->image;
$image = $byId->image;
$image = preg_replace('/\s+/S', " ", $image);
$waktu = $byId->tgl_log;

    
/*
//[{"type":"MARKER","id":null,"geometry":[2.5619425385858436,98.31984234833772]}]
if (is_in_polygon($points_polygon, $vertices_x, $vertices_y, $lat_x, $lng_y)){
  $warning = "Selamat!!! Lokasi anda tepat, Silahkan lanjutkan.";
  $zoom = "14";
}
else {
  $warning = "Warning!!! anda diluar lokasi!!!";
  $zoom = "12";
}

$mix = array_combine($vertices_x,$vertices_y);
//echo json_encode($mix);
$jav = "[";
foreach ($mix as $key => $value) {
  //echo $key;
  $jav .= "{lat:".$key.", lng:".$value."},";
}
$jav.="]";
*/

function is_in_polygon($points_polygon, $vertices_x, $vertices_y, $lat_x, $lng_y)
{
  $i = $j = $c = 0;
  for ($i = 0, $j = $points_polygon ; $i < $points_polygon; $j = $i++) {
    if ( (($vertices_y[$i]  >  $lng_y != ($vertices_y[$j] > $lng_y)) &&
     ($lat_x < ($vertices_x[$j] - $vertices_x[$i]) * ($lng_y - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i]) ) )
       $c = !$c;
  }
  return $c;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Drawing Tools</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        min-height:400px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
          min-height:400px;
        margin: 0;
        padding: 0;
      }
    </style>

  </head>
  <body>
    <div id="map"></div>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
      // This example requires the Drawing library. Include the libraries=drawing
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=drawing">
      var all_overlays = [];

      var myLatLng = {lat: <?php echo $lat_x?>, lng: <?php echo $lng_y?>};
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          //center: {lat: 2.5407779321132535, lng: 98.31763308463087},
        center : myLatLng,
          zoom: 17
        });

        /*
        var triangleCoords = <?php //echo ($jav)?>;


        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
        */
        
        
        
        var contentString = '<center><?php echo $waktu?><br><img src="<?php echo base_url().$image?>"></center>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
        
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Lokasi Anda'
        });
        marker.setMap(map);
        infowindow.open(map, marker);


          /*
          var p1 = new google.maps.LatLng(<?php echo $lat_x?>, <?php echo $lng_y?>);
          var p2 = new google.maps.LatLng(<?php echo @$vertices_x[0]?>, <?php echo @$vertices_y[0]?>);
          console.log(meter(p1,p2));
          */

      }


      function meter(p1, p2) {
        //return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
        return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2)).toFixed(2)+" m";
      }



      //alert("<?php //echo $warning?>");

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq5_6tgSUmi7ukDbpAnTbQ2_ungfOEs2I&libraries=drawing&callback=initMap&libraries=geometry"
         async defer></script>

  </body>
</html>




