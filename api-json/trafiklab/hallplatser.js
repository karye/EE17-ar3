/* Mapbox inställningar */
mapboxgl.accessToken = 'pk.eyJ1Ijoia2FyeWUiLCJhIjoiY2pwOXRtbWc1MGdmNjNwc2JmdGxzeDR5byJ9.whp8f2Ttws57ctAf_stuag';

/* Start positions: NTI */
var lat = 59.336885;
var lon = 18.048323;

/* Skapa kartan */
var karta = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [lon, lat],
    zoom: 10
});

/* Element vi använder */
var eDemo = document.querySelector("#demo");

/* Om vi får avläsa positionen, kör igång */
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        eDemo.innerHTML = "Geolocation is not supported by this browser.";
    }
}

/* Visa användares latitude och longitude */
function showPosition(position) {
    eDemo.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
}