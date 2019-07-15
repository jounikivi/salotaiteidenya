// See post: http://asmaloney.com/2014/01/code/creating-an-interactive-map-with-leaflet-and-openstreetmap/

var map = L.map( 'map', {
  center: [60.38495, 23.12898],
  minZoom: 2,
  zoom: 15
})

L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  /*subdomains: ['a', 'b', 'c']*/
}).addTo( map )

var myURL = jQuery( 'script[src$="leaf.js"]' ).attr( 'src' ).replace( 'leaf.js', '' )

var myIcon = L.icon({
  iconUrl: myURL + 'pin24.png',
  iconRetinaUrl: myURL + 'pin48.png',
  iconSize: [29, 24],
  iconAnchor: [9, 21],
  popupAnchor: [0, -14]
})

//alert("xmlhttp alku");

var xmlhttp = new XMLHttpRequest();

var talteenMarkers={};

xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj=JSON.parse(this.responseText);
    //alert("Järjestäjän_nimi: " + myObj.Tapahtumat[0].Järjestäjän_nimi);

    console.log("myObj taulukon läpikäynti(" + myObj.Tapahtumat.length + "):");
    for(var i = 0; i < myObj.Tapahtumat.length; i++)
    {
      var obj = myObj.Tapahtumat[i];
      //console.log(obj.Järjestäjän_nimi + ", " + obj.Tapahtuman_nimi);

      talteenMarkers[i]=L.marker( [obj.latitude, obj.longitude], {icon: myIcon} )
      .bindPopup('<a href=https:/\//' + obj.Järjestäjännettisivut + ' '
      + 'target="popup"'
      + ' onclick="window.open(&#39' + 'https:/\//' + obj.Järjestäjännettisivut +'&#39, &#39name&#39, &#39width=600,height=400&#39);return false;"'
      +  '>'
      + obj.Järjestäjän_nimi
      + '</a>'
      + '<br> ' + obj.Tapahtumankuvaus)
      .addTo( map );
    }
  }
};

xmlhttp.open("GET","lataatietokanta.php",true);
xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xmlhttp.send();
