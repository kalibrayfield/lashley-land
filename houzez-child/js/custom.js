jQuery(window).load(function () {
    if (window.location.hash == '#video') {
        jQuery('.detail-tabs > li').removeClass('active');
        jQuery('.detail-content-tabber .tab-pane').removeClass('active in');
        jQuery('#video').parent('.tab-pane').addClass('active in');
        jQuery('html,body').animate({scrollTop: jQuery('#video').offset().top - 200}, 'slow');
    }
});

jQuery(document).on("click", ".detail-tabs > li", function () {
    if (jQuery(this).html() == 'Address') {
        var kml_map_file = jQuery("#kml_map_url").attr("data-url");
       
        if (kml_map_file !== "") {
            jQuery("#kml_map").css('height', '400px');
            var infowindow = '';
            var kml_load = {
                initMap: function () {
                    var map = new google.maps.Map(document.getElementById('kml_map'), {
                        center: new google.maps.LatLng(-19.257753, 146.823688),
                        zoom: 10,
                        mapTypeId: 'roadmap'
                    });
                    kml_load.loadKmlLayer(kml_map_file, map);
                    infowindow = new google.maps.InfoWindow({
                        pixelOffset: new google.maps.Size(300, 0)});
                },
                loadKmlLayer: function (src, map) {
                    var kmlLayer = new google.maps.KmlLayer(src, {
                        suppressInfoWindows: false,
                        preserveViewport: false,
                        map: map
                    });
                    google.maps.event.addListener(kmlLayer, 'click', function (event) {
                        kml_load.showInContentWindow(event, map);
                    });
                },
                showInContentWindow: function (kmlEvent, map) {
                    var content = "<div>" + kmlEvent.featureData.description + "</div>";
                    infowindow.setPosition(kmlEvent.latLng);
                    infowindow.setOptions({
                        pixelOffset: kmlEvent.pixelOffset,
                        content: content
                    });
                    infowindow.open(map);
                }
            }
            kml_load.initMap();
        }
    }
});
