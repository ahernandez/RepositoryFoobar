
var mapLoaded = false;
var map;
var marker;
var WINDOW_HTML;
var datesArray;
var coord;
var latitude;
var longitude;
var friendsSelectedIds  =   '';

window.onload = function(){

    //console.log('onload')
    var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth();
    curr_month++;
    var curr_day = d.getDay();
    var curr_year = d.getFullYear();

    date_today = curr_year+'-'+curr_month+'-'+curr_date
    //$('input').DatePicker(options);
    $('#date3').DatePicker({
        flat: true,
        date: '',
        current: date_today,
        calendars: 1,
        mode: 'multiple',
        starts: 1,
        onChange: function(formated, dates){
                //console.log('%o %o ',formated, dates)
                datesArray = formated;
                $('#arrayDates').val(datesArray);
	}
    });

    if (GBrowserIsCompatible() && !mapLoaded) {
        mapLoaded = true;
        WINDOW_HTML = '<div style="width: 210px;padding-right: 10px">Trinity College Dublin Ireland</div>';
        map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        //coord1 =;
        map.setCenter( new GLatLng(53.343019,-6.248903), 13);
        marker = new GMarker( new GLatLng(53.343019,-6.248903),{draggable: true});
        map.addOverlay(marker);
        latlong = marker.getLatLng();
        latitude = latlong.lat() +'';        
        longitude = latlong.lng() +'';
        latlongStr = latitude +','+longitude;
        console.log(latlongStr);
        $('#latlong').val(latlongStr);
        GEvent.addListener(marker, "dragstart", function() {
            map.closeInfoWindow();
        });

        GEvent.addListener(marker, "dragend", function() {
            latlong = marker.getLatLng();
            latitude = latlong.lat() +'';
            longitude = latlong.lng() +'';
            latlongStr = latitude +','+longitude;
            $('#latlong').val(latlongStr);
        });
        
        
        GEvent.addListener(marker, "click", function() {
            //console.log('click')
            marker.openInfoWindowHtml(WINDOW_HTML);
        });
       marker.openInfoWindowHtml(WINDOW_HTML);
       
        
    }
}

function geocodeLocation(){
   // console.log('geocoder location')
    var address = $('#formlocation').val();
    WINDOW_HTML = '<div style="width: 210px;padding-right: 10px">'+address+'</div>';
    //console.log(address)
    var geocoder = new GClientGeocoder();
    geocoder.getLocations(address, geocodeCenter);
    function geocodeCenter(response) {
        //console.log('geocode center')
        if (!response || response.Status.code != 200) {
            alert("Place not found!");
        } else {
            place = response.Placemark[0];
            map.setCenter(new GLatLng(place.Point.coordinates[1],place.Point.coordinates[0]), 13);
            marker = new GMarker(new GLatLng(place.Point.coordinates[1],place.Point.coordinates[0]),{draggable: true});
            map.addOverlay(marker);
            latlong = marker.getLatLng();
            latitude = latlong.lat() +'';
            longitude = latlong.lng() +'';
            latlongStr = latitude +','+longitude;
            console.log(latlongStr);
            $('#latlong').val(latlongStr);
                GEvent.addListener(marker, "dragstart", function() {
                map.closeInfoWindow();
            });

            GEvent.addListener(marker, "dragend", function() {
                latlong = marker.getLatLng();
                latitude = latlong.lat() +'';
                longitude = latlong.lng() +'';
                latlongStr = latitude +','+longitude;
                $('#latlong').val(latlongStr);
            });
            GEvent.addListener(marker, "click", function() {
                //console.log('click')
                marker.openInfoWindowHtml(WINDOW_HTML);
        });

            
        }
   }
}

function centermap(lat, lon, zoom)
{
     //console.log('center map %o', map);
     map.setCenter(new GLatLng(lat, lon), zoom);
     if(map.newMarker == false)
     {
             map.addPoint(new GLatLng(lat, lon));
     }else{
             map.newMarker.setLatLng(new GLatLng(lat, lon));
             map.updateInputs();
     }
}

