/*global jQuery, window, google*/
jQuery(document).ready(function ($) {
  function initializeMap() {
    $('.quae_map_container').each(function () {
      var map = $(this);
      var mapData = map.data('mapsettings');
      var zoom = (mapData.zoom.length > 0) ? parseInt(mapData.zoom, 10) : 12;
      var overviewMapControl = false;

      var mapOptions = {
        zoom: zoom,
        disableDefaultUI: true,
        panControl: false,
        zoomControl: Boolean(mapData.zoomControl),
        mapTypeControlOptions: {
          style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
          mapTypeIds: [
            google.maps.MapTypeId.ROADMAP,
            google.maps.MapTypeId.SATELLITE
          ]
        },
        mapTypeControl: Boolean(mapData.mapTypeControl),
        scaleControl: Boolean(mapData.scaleControl),
        streetViewControl: Boolean(mapData.streetViewControl),
        overviewMapControl: overviewMapControl
      };

      var gmap = new google.maps.Map(map[0], mapOptions);
      var marker;
      marker = new google.maps.Marker({
        map: gmap
      });
      if (mapData.bounce === 1) {
        marker.setAnimation(google.maps.Animation.BOUNCE);
      }
      if (mapData.infoWindow === 1) {
        var infoWindowContent = map.siblings('.quae_map_tootltip').html();
        if ($.trim(infoWindowContent).length > 0) {
          var infoWindow = new google.maps.InfoWindow({
            content: infoWindowContent
          });
          google.maps.event.addListener(marker, 'click', function () {
            infoWindow.open(gmap, marker);
          });
        }
      }

      var latlonStr = mapData.latlon;
      var myLatlng;
      // if we have latlon provided...
      if (latlonStr.length > 0) {
        var latlon = latlonStr.split(',');
        myLatlng = new google.maps.LatLng(parseFloat(latlon[0], 10), parseFloat(latlon[1], 10));
        gmap.setCenter(myLatlng);
        marker.setPosition(myLatlng);
      } else {
        // if not - we have to do with only address
        var address = mapData.address;
        var geocoder = new google.maps.Geocoder();
        address = address.replace(/(\r\n|\n|\r)/gm, " ");
        geocoder.geocode({ 'address' : address }, function (results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            myLatlng = results[0].geometry.location;
            gmap.setCenter(myLatlng);
            marker.setPosition(myLatlng);
          } else {
            myLatlng = new google.maps.LatLng(0, 0);
            gmap.setCenter(myLatlng);
            marker.setPosition(myLatlng);
          }
        });
      }
      $(window).resize(function () {
        gmap.setCenter(myLatlng);
      });
    });
  }
  initializeMap();
});