<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="http://plateforme.org/_lib/baseline.reset.css" />
<title></title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function getNormalizedCoord(coord, zoom)
{
    var y = coord.y;
    var x = coord.x;
    var tileRange = 1 << zoom;
    if (y < 0 || y >= tileRange)
    {
        return null;
    }
    if (x < 0 || x >= tileRange)
    {
        x = (x % tileRange + tileRange) % tileRange;
    }
    return {
        x: x,
        y: y
    };
}
/////////////// DCFVG MAP TYPE //////////
var dcfvgTypeOptions =
{
    getTileUrl: function (coord, zoom)
    {
        var normalizedCoord = getNormalizedCoord(coord, zoom);
        if (!normalizedCoord){return null;}
        var bound = Math.pow(2, zoom);
        return "http://tiles.dcfvg.fr/nouvelimage/tiles/" + zoom + "/" + normalizedCoord.x + "_" + normalizedCoord.y + ".jpg";
    },
    tileSize: new google.maps.Size(256, 256),
    isPng: true,
    maxZoom: 16,
    minZoom: 12,
    name: "dcfvg"
};
var dcfvgMapType = new google.maps.ImageMapType(dcfvgTypeOptions);

function initialize()
{
    var myLatlng = new google.maps.LatLng(85.0486978853909, -179.94424438476562);
    var myOptions =
    {
        center: myLatlng,
        zoom: 14,
        backgroundColor: "#f3f3f3",
        panControl: false,
        zoomControl: true,
        scaleControl: false,
        mapTypeControl: false,
        OverviewMapControlOptions: true,
        streetViewControl: false,
        mapTypeControlOptions: {
     		mapTypeIds: [dcfvgMapType, 'dcfvg'],
      		//style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
  		},

        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        }
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    map.mapTypes.set('dcfvg', dcfvgMapType);
    map.setMapTypeId('dcfvg');

  //google.maps.event.addListener(map, 'click', function (event){ alert(event.latLng)});

}


</script>
<style type="text/css">
html,
body,
#con {
    width: 100%;
    height: 100%;
}


#map_canvas {
    width: 100%;
    height: 100%;
}

#invisible {
    position: absolute;
    left: 0;
    top: -1000px;
}
</style>
</head>

<body onload="initialize()">
<div id="con">

  <div id="map_canvas"></div>
</div>
</body>
</html>
