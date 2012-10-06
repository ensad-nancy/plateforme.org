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
var dcfvgTypeOptions =
{
    getTileUrl: function (coord, zoom)
    {
        var normalizedCoord = getNormalizedCoord(coord, zoom);
        if (!normalizedCoord)
        {
            return null;
        }
        var bound = Math.pow(2, zoom);
        return "img/" + zoom + "_" + normalizedCoord.x + "_" + normalizedCoord.y + ".png";
    },
    tileSize: new google.maps.Size(256, 256),
    isPng: false,
    maxZoom: 5,
    minZoom: 0,
    name: "dcfvg"
};

var dcfvgMapType = new google.maps.ImageMapType(dcfvgTypeOptions);

function initialize()
{
    var myLatlng = new google.maps.LatLng(32.73355736105875, -65.06982421875);
    var myOptions =
    {
        center: myLatlng,
        zoom: 2,
        backgroundColor: "#cbe7f6",
        panControl: false,
        zoomControl: true,
        scaleControl: false,
        mapTypeControl: false,
        OverviewMapControlOptions: true,
        zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        }
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    map.mapTypes.set('dcfvg', dcfvgMapType);
    map.setMapTypeId('dcfvg');

   //google.maps.event.addListener(map, 'click', function (event){ alert(event.latLng)});

}