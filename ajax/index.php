<?php
session_start();
if(!isset($_SESSION['email_admin'])){
    header("Location:../deconnexion.php");
}
header('Access-Control-Allow-Origin: *');
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="fr">
<!--<![endif]-->
<head>
    <script src="jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Systeme Aide d’exploitation & information des voyageurs</title>
    <link rel="shortcut icon" href="../../societe/images/Os_Saeiv-64.png">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">

    <link rel="stylesheet" href="../../societe/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../societe/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../societe/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../societe/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../societe/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../societe/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />

</head>

<body onload="initMap();">
<!-- Left Panel -->

<?php
include "left-panel.php";
?>

<div id="right-panel" class="right-panel">
    <!-- Header-->

    <?php
    include "top-header.php";
    ?>
    <!-- Header-->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Suivi du bus en temps réel</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1 id="panne_hh"></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4 float-right" id="boutton_affichage" hidden>
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>
                        Afficher Traçage  <label class="switch switch-text switch-primary switch-pill"><input  type="checkbox" class="switch-input" id="cc"   onchange="if (this.checked==false){window.location='index.php';}else {window.location='_old.php?id='+choisi; }"> <span data-on="oui" data-off="non" class="switch-label"></span> <span class="switch-handle"></span></label>
                    </h1>
                </div>
            </div>
        </div>
        <!--        <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active"><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
        -->
    </div>

    <div class="content mt-12">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12" style="overflow-x: hidden;overflow-x:scroll;">
                    <table class="table" style="white-space: nowrap;">
                        <tbody>
                        <tr>
                            <td><B>Service</B></td>
                            <td id="Service_type"></td>

                            <td><B>Appareil</B></td>
                            <td id="Appareil"></td>

                            <td><B>BUS</B></td>
                            <td id="Bus_code"></td>

                            <td><B>Receveur</B></td>
                            <td id="receveur_code"></td>

                            <td><B>Chauffeur</B></td>
                            <td id="chauffeur_code"><td>

                            <td><B>Ligne</B></td>
                            <td id="ligne_code"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">

                        <div class="card-body">
                            <div class="map" id="map">
                                <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
                                <script type="text/javascript">
                                    var choisi=null;
                                    var locations=[];
                                    var id=null;
                                    var latselect=33.8919823;
                                    var lngselect=10.1624486;

                                    // On initialise la latitude et la longitude de Paris (centre de la carte)
                                    var lat = 34.8919823;
                                    var lon = 10.1624486;
                                    var macarte ;
                                    // Fonction d'initialisation de la carte
                                    /*var villes = {
                                        "Paris": { "lat": 33.8919823, "lon": 10.1624486 ,"title":"Paris" },
                                        "Tunis": { "lat": 35.8919823, "lon": 11.1624486,"title":"Tunis" },
                                    };*/
                                    function initMap() {
                                        var macarte = L.map('map').setView([lat, lon], 6);
                                        L.tileLayer('.', {
                                            // Il est toujours bien de laisser le lien vers la source des données
                                            attribution: '<b>Bus Software</b>',
                                            minZoom: 1,
                                            maxZoom: 20
                                        }).addTo(macarte);

                                        // Echelle cartographique

                                        L.control.scale().addTo(macarte);

                                        setMarkers(macarte);
                                        setInterval(function () {setMarkers(macarte)},3000);
                                    }
                                    function setMarkers(macarte){
                                        getlocation();
                                        var markerGroup=null;
                                        //  clearMarkers(macarte);
                                        markerGroup = new L.layerGroup();
                                        //markerGroup.clearLayers();


                                          macarte.eachLayer((layer) => {
                                            layer.remove();

                                        });
                                        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                                            // Il est toujours bien de laisser le lien vers la source des données
                                            attribution: '<b>Bus Software</b>',
                                            minZoom: 1,
                                            maxZoom: 20
                                        }).addTo(macarte);
                                        markerGroup.addTo(macarte);
                                        for (var i = 0; i < locations.length; i++) {
                                            var loc = locations[i];
                                            //alert(loc[16]);
                                            if (loc[0] == "999") {
                                                var myIcon = L.icon({iconUrl: '../../societe/images/marker/bus_autre.png',
                                                    //iconSize:     [25, 40], // size of the icon
                                                    iconAnchor:   [12,29], // point of the icon which will correspond to marker's location
                                                    popupAnchor:  [12,29] // point from which the popup should open relative to the iconAnchor
                                                     });
                                                var titre = "Service " + loc[15] + "\nBus " + loc[14] + "\n" + loc[13];
                                            } else {
                                                if (loc[7] != "") {
                                                    var myIcon = L.icon({iconUrl: '../../societe/images/marker/bus_controle.png',
                                                       // iconSize:     [25, 40], // size of the icon
                                                        iconAnchor:   [12,29], // point of the icon which will correspond to marker's location
                                                        popupAnchor:  [12,29] // point from which the popup should open relative to the iconAnchor
                                                    });
                                                    var titre = "Service " + loc[15] + "\nLe controleur " + loc[8] + " est à bord\nligne " + loc[0] + " Bus " + loc[14] + "\n" + loc[9] + " => " + loc[10] + "\n" + loc[11] + " => " + loc[12] + "\n" + loc[13];
                                                } else {
                                                    if (loc[5] == "N") {
                                                        var myIcon = L.icon({iconUrl: '../../societe/images/marker/bus_panne.png',
                                                          //  iconSize:     [25, 40], // size of the icon
                                                            iconAnchor:   [12,29], // point of the icon which will correspond to marker's location
                                                            popupAnchor:  [12,29] // point from which the popup should open relative to the iconAnchor
                                                        });
                                                        var titre = "Service " + loc[15] + "\nligne " + loc[0] + " Bus " + loc[14] + loc[6] + "\n" + loc[13];

                                                    } else {
                                                        if (loc[4] == true) {
                                                            if (loc[16]<1){
                                                                var myIcon = L.icon({iconUrl: '../../societe/images/marker/bus_en_arret.png',
                                                                    //  background:'transparent',
                                                                    //iconSize:     [28, 32], // size of the icon
                                                                    iconAnchor:   [12,29], // point of the icon which will correspond to marker's location
                                                                    popupAnchor:  [12,29] // point from which the popup should open relative to the iconAnchor
                                                                });
                                                                var titre = "En arrêt\nService " + loc[15] + "\nligne " + loc[0] + " Bus " + loc[14] + "\n" + loc[9] + " => " + loc[10] + "\n" + loc[11] + " => " + loc[12] + "\n" + loc[13];
                                                            }
                                                            else {
                                                                var myIcon = L.icon({iconUrl: '../../societe/images/marker/bus_ok.png',
                                                                    //  background:'transparent',
                                                                    //iconSize:     [28, 32], // size of the icon
                                                                    iconAnchor:   [12,29], // point of the icon which will correspond to marker's location
                                                                    popupAnchor:  [12,29] // point from which the popup should open relative to the iconAnchor
                                                                });
                                                                var titre = "Service " + loc[15] + "\nligne " + loc[0] + " Bus " + loc[14] + "\n" + loc[9] + " => " + loc[10] + "\n" + loc[11] + " => " + loc[12] + "\n" + loc[13];
                                                            }

                                                        } else {
                                                            var myIcon = L.icon({iconUrl: '../../societe/images/marker/bus_gps.png',
                                                            //    iconSize:     [25, 40], // size of the icon
                                                                iconAnchor:   [12,29], // point of the icon which will correspond to marker's location
                                                                popupAnchor:  [12,29] // point from which the popup should open relative to the iconAnchor
                                                            });
                                                            var titre = "Service " + loc[15] + "\nGPS Hors Couverture\nligne " + loc[0] + " Bus " + loc[14] + "\n" + loc[9] + " => " + loc[10] + "\n" + loc[11] + " => " + loc[12] + "\n" + loc[13];

                                                        }
                                                    }
                                                }
                                            }



                                            var newMarker =  L.marker([loc[1],loc[2]],{title:titre,icon: myIcon,alt:loc[3],draggable:false});
                                            //var newMarker =  L.marker([loc[1],loc[2]],{title:titre,alt:loc[3],draggable:false});
                                            newMarker.addEventListener("click", function(){ macarte.setView([this.getLatLng().lat,this.getLatLng().lng],17); id=this.getElement().alt; setInterval(function () {getbusinfo()},3000);setInterval(function () {macarte.setView([newlat,newlng])},6000);});
                                            markerGroup.addLayer( newMarker );



                                            /*  macarte.on('click', function () {
                                                  macarte.removeLayer(marker);
                                              });*/
                                            //alert(L.Util.id);
                                        }
                                        // markerGroup.getLayer(0).setLatLng(new L.LatLng(0,0));
                                    }
                                    /*function clearMarkers(macarte){
                                        for(mar in mar)


                                        // alert();
                                    }
                                */
                                    /* window.onload = function(){
                                         // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
                                        // initMap();


                                     };*/


                                    function getlocation() {
                                        $.ajax({
                                            type: "POST",
                                            url: "markers.php",
                                            cache: false,
                                            success: function(xmldata) {
                                                $('#res1').html(xmldata);
                                            }
                                        });

                                    }
                                    function getbusinfo() {
                                        $.ajax({
                                            type: "POST",
                                            url: "getbusinfo.php?id="+id,
                                            success: function (retour) {
                                                $("#bus_info").html(retour);
                                            }
                                        });


                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">

                        <div class="card-body pre-scrollable mt-12" style="height:auto;max-height: 420px; overflow-y:hidden; overflow-y: scroll;">
                            <table class="table" style="white-space: nowrap;">
                                <tbody>

                                <tr>
                                    <td><B>Voyage</B></td>
                                    <td id="voyage"></td>
                                </tr>
                                <tr>
                                    <td><B>Distance</B></td>
                                    <td id="distance"></td>
                                </tr>
                                <tr>
                                    <td><B>Vitesse</B></td>
                                    <td id="vitesse"></td>
                                </tr>
                                <tr>
                                    <td><B>Espèces</B></td>
                                    <td id="recette"></td>
                                </tr>
                                <tr>
                                    <td><B>Tickets</B></td>
                                    <td id="nb_ticket"></td>
                                </tr>
                                <tr>
                                    <td><B>Annulation (Nbr)</B></td>
                                    <td id="nb_annulation"></td>
                                </tr>
                                <tr>
                                    <td><B>Réquistion (Nbr)</B></td>
                                    <td id="requisition"></td>
                                </tr>
                                <tr>
                                    <td><B>Faveur (Nbr)</B></td>
                                    <td id="faveur"></td>
                                </tr>
                                <tr>
                                    <td><B>Bagage (Nbr)</B></td>
                                    <td id="bagage"></td>
                                </tr>
                                <tr>
                                    <td><B>Abonnée</B></td>
                                    <td id="abonnees"></td>
                                </tr>
                                <tr>
                                    <td><B>Payement Carte</B></td>
                                    <td id="payement_carte"></td>
                                </tr>
                                <tr>
                                    <td><B>Recharge</B></td>
                                    <td id="recharge_carte"></td>
                                </tr>
                                <tr>
                                    <td><B>Total</B></td>
                                    <td id="total"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="res1" hidden></div>
    <div id="bus_info" hidden></div>
    <div id="mm_info" hidden></div>
    <!-- Footer -->
    <?php
    include "footer.php";
    ?>
    <!-- Footer -->
    <script type="text/javascript" src="../../static/js/custom.js"></script>



</div>

<!--<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXucn_kkb8VckERpU27rBnV07jWeGrI7Y&callback=initMap&center=-33.88449969374687,151.1353662175649&zoom=12&format=png&maptype=roadmap&style=feature:administrative%7Celement:geometry.fill%7Cvisibility:off&style=feature:administrative.land_parcel%7Celement:geometry.fill%7Cvisibility:off&style=feature:administrative.neighborhood%7Cvisibility:off&style=feature:administrative.neighborhood%7Celement:geometry.fill%7Cvisibility:off&style=feature:landscape.man_made%7Celement:geometry.fill%7Cvisibility:off&style=feature:landscape.natural%7Cvisibility:simplified&style=feature:landscape.natural.landcover%7Celement:geometry.fill%7Cvisibility:simplified&style=feature:poi%7Celement:geometry.fill%7Cvisibility:off&style=feature:poi%7Celement:labels.text%7Cvisibility:off&style=feature:poi.attraction%7Celement:geometry.fill%7Cvisibility:off&style=feature:poi.business%7Cvisibility:off&style=feature:poi.park%7Celement:labels.text%7Cvisibility:off&style=feature:road%7Celement:labels%7Cvisibility:off&style=feature:water%7Celement:labels.text%7Cvisibility:off&size=480x360">
</script>-->
<script src="../../societe/vendors/jquery/dist/jquery.min.js"></script>
<script src="../../societe/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../../societe/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../societe/assets/js/main.js"></script><script type="text/javascript" src="../../static/js/custom.js"></script>


<!-- Gmaps -->
<!--
<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
-->
<!--
<script src="../../societe/vendors/gmaps/gmaps.min.js"></script>
-->
<!--
<script src="../../societe/assets/js/init-scripts/gmap/gmap.init.js"></script>
-->
<script>(function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-112777302-1', 'auto');
    ga('send', 'pageview');
</script>
</body>

</html>
