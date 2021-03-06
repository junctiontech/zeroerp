<!DOCTYPE html>
<html>
  <head>
    <style>
      #map-canvas {
        width: 1000px;
        height: 500px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
          var a= '<?php echo $lat;?>';
          var b= '<?php echo $lng?>';
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(a, b),
          zoom: 19,
          mapTypeId: google.maps.MapTypeId.HYBRID
        }
         map = new google.maps.Map(mapCanvas, mapOptions);
        var latlng = new google.maps.LatLng(a,b);
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: '<?php echo ucwords(str_replace('_', ' ', $EmployeeName));?>'
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
 <button type="button" onclick="window.location.href='<?php echo base_url();?>pms/pms/application_reg_list?menu=pms'" class="btn btn-white" data-dismiss="modal">Close</button>
    <div id="map-canvas"></div>
  </body>
</html>