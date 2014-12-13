/*Drupal.gmap.addHandler('gmap', function (elem) {
    var obj = this;
    obj.bind("ready", function () {
        var map = obj.map;
        debugger;
        var bounds = new google.maps.LatLngBounds();
        var count = Drupal.settings.gmap.auto1map.markers.length;
        for (i = 0; i < count; i++) {
            bounds.extend(new google.maps.LatLng(Drupal.settings.gmap.auto1map.markers[i].latitude, Drupal.settings.gmap.auto1map.markers[i].longitude));
        }
        map.fitBounds(bounds);

    });
});
*/
jQuery(function ($) {
    /*debugger;
     // Loop through all gmap instances.
     jQuery(".gmap").each(function () {
     
     // Get a map reference using the element ID.
     gmapID = jQuery(this).attr("id");
     var gmap = Drupal.gmap.getMap(gmapID).map;
     
     // Ensure map exists.
     if (gmap) {
     alert(gmap.toSource());
     // Create a new map boundary.
     var bounds = new google.maps.LatLngBounds();
     // Iterate though the current maps marker collection.
     jQuery.each(gmap.markers, function (index) {
     // Find the current markers position (latitude, longitude).
     var data = gmap.markers[index];
     var pos = data.getPosition();
     
     // Extend the new boundary so the new marker/pin will be in view.
     bounds.extend(new google.maps.LatLng(pos.lat(), pos.lng()));
     });
     // Set the current maps bounding box to our new defined boundary.
     gmap.fitBounds(bounds);
     }
     else {
     // GMap was not initialised in time.
     }
     
     });
     */
    $("table a.market-show-lid").click(function (e) {
        $("table a.selected").removeClass('selected');
        var $that = $(this);
        var lid = $that.attr('data-id');
        var marker = getLidFromMarkers(lid);
        if (marker) {

            var bounds = new google.maps.LatLngBounds();
            bounds.extend(marker.getPosition());
            Drupal.gmap.getMap('gmap-auto1map-gmap0').map.setCenter(marker.getPosition());
            Drupal.gmap.getMap('gmap-auto1map-gmap0').map.fitBounds(bounds);
            $('body').scrollTop(200);
            $that.addClass('selected');
            //popup = Drupal.gmap.getInfoWindow();
            //popup.open(Drupal.gmap.getMap('gmap-auto1map-gmap0').map, marker)
        }
        e.preventDefault();
    });
    function getLidFromMarkers(lid) {
        var count = Drupal.settings.gmap.auto1map.markers.length;
        for (i = 0; i < count; i++) {
            var _lid = $(Drupal.settings.gmap.auto1map.markers[i].text).find('.lid').text();
            if (_lid > 0 && lid == _lid) {
                return Drupal.settings.gmap.auto1map.markers[i].marker
            }
        }
        return false;
    }
});