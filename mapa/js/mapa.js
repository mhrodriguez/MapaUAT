/**
 * Created by davatar on 10/31/16.
 */
function Mapa() {

    var mapObject;
    var ultimaInfoWindow=null;

    this.initialize = function() {
        var mapOptions = {
            zoom: 8,
            center: new google.maps.LatLng(24.2053782, -99.3675721),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,

            mapTypeControl: false,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: true,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            zoomControl: true,
            zoomControlOptions: {
             style: google.maps.ZoomControlStyle.LARGE,
             position: google.maps.ControlPosition.RIGHT_CENTER
             },
            scaleControl: true,
            scaleControlOptions: {
                position: google.maps.ControlPosition.TOP_LEFT
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_TOP
            }/*,
             styles: [{
             "featureType": "poi",
             "stylers": [{"visibility": "off"}]
             }, {"stylers": [{"saturation": -70}, {"lightness": 37}, {"gamma": 1.15}]}, {
             "elementType": "labels",
             "stylers": [{"gamma": 0.26}, {"visibility": "off"}]
             }, {
             "featureType": "road",
             "stylers": [{"lightness": 0}, {"saturation": 0}, {"hue": "#ffffff"}, {"gamma": 0}]
             }, {
             "featureType": "road",
             "elementType": "labels.text.stroke",
             "stylers": [{"visibility": "off"}]
             }, {
             "featureType": "road.arterial",
             "elementType": "geometry",
             "stylers": [{"lightness": 20}]
             }, {
             "featureType": "road.highway",
             "elementType": "geometry",
             "stylers": [{"lightness": 50}, {"saturation": 0}, {"hue": "#ffffff"}]
             }, {
             "featureType": "administrative.province",
             "stylers": [{"visibility": "on"}, {"lightness": -50}]
             }, {
             "featureType": "administrative.province",
             "elementType": "labels.text.stroke",
             "stylers": [{"visibility": "off"}]
             }, {"featureType": "administrative.province", "elementType": "labels.text", "stylers": [{"lightness": 20}]}]*/
        };

        mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
    }

    this.agregarMarcador = function(latitud, longitud, tooltip, titulo, info, idMunicipio, urlPin) {

            var marker;

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitud, longitud),
                icon: {url: urlPin, labelOrigin: { x:13, y:14 } },
                title: tooltip,
                label: { text: titulo, color: 'black', fontFamily: 'Arial, Helvetica, sans-serif' }
                });

            marker.setMap(mapObject);

            var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Proyectos: ' + tooltip +  '</h1>'+
            '<div id="bodyContent">'+

            '<table>' +
            '<tr><th>Estatus</th><th>Total</th></tr>';

            for (index=0; index<info.length; index++)
            {
                contentString = contentString + '<tr>';

                contentString = contentString + '<td><a href="proyecto.php?idMunicipio=' + String(idMunicipio) + '&idEstatus=' + String(info[index][0]) + '">' + info[index][1] + '</a></td><td>' + info[index][2] + '</td>';

                contentString = contentString + '</tr>';
            }

            contentString = contentString + '</table>' +
            /*'<p><a href="proyecto.php">'+
            'Ver Proyectos</a> '+
            '</p>'+*/
            '</div>'+
            '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            marker.addListener('click', function() {

                if (ultimaInfoWindow != null)
                {
                    ultimaInfoWindow.close();
                }

                infowindow.open(mapObject, marker);

                ultimaInfoWindow = infowindow;
            });
    }

    this.setZoom = function(zoom) {
        mapObject.setZoom(zoom);
    }
}