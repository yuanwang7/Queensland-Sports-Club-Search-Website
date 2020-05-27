<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset=UTF-8">
    
        <title>Search page</title>

        <!-- Bootstrap core CSS & Javascript-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/a243bedf71.js"></script>
        <!-- map -->

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
        <!-- Custom js -->
        <script src="js/search_J.js"></script>
        
        <!-- Custom styles for this template -->
        <style>
            /* Record card start */
            .singleClub {
                text-align: center;
                padding: 20px;
                box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            }
            .clubTitle h4 {
                font-size: 24px;
                text-transform: uppercase;
                font-weight: 600;
            }
            #mapid { height: 180px; }
            /* Record card end */
        </style>
    </head>

    <body>

        <!-- Navigation bar -->
        <?php require 'header.php';?>

        <!-- content --> 
        <div class="container py-5">
            <!-- select-->
            <div class="row mb-5">
                <!-- select Sports -->
                <div class="col-md-7">
                    <div class="row m-0"">
                        <h5 class="col-md-3 p-0">Sports</h5>
                        <div class="btn-group">
                            <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">Select a Sport<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="#">Item I</a></li>
                            <li class="dropdown-item"><a href="#">Item II</a></li>
                            <li class="dropdown-item"><a href="#">Item III</a></li>
                            <li class="dropdown-item"><a href="#"><span class="badge badge-primary badge-pill float-right mt-1">new</span> Item IV</a></li>
                            <li class="dropdown-item"><a href="#">Item V</a></li>
                            <li class="dropdown-item"><a href="#">Other</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- select Suburb -->
                <div class="col-md-5">
                <div class="form-group row">
                    <label for="suburb" class="col-sm-2 col-form-label h5 ">Suburb</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="suburb" placeholder="suburb">
                    </div>
                </div>
                </div>
            </div>
            <!--/select-->

            <p id="filter-count"><strong>0</strong> records displayed.</p>

            <!-- Map and records -->
            <div class="row">
                <!-- Map -->
                <div class="col-lg-7 singleClub">
                    <div id="mapid" style="height: 500px; position: relative;" class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" role="presentation" src="https://api.tiles.mapbox.com/v4/mapbox.streets/13/4093/2723.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; backface-visibility: hidden; transform: translate3d(56px, -91px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.tiles.mapbox.com/v4/mapbox.streets/13/4094/2723.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; backface-visibility: hidden; transform: translate3d(312px, -91px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.tiles.mapbox.com/v4/mapbox.streets/13/4093/2724.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; backface-visibility: hidden; transform: translate3d(56px, 165px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.tiles.mapbox.com/v4/mapbox.streets/13/4094/2724.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; backface-visibility: hidden; transform: translate3d(312px, 165px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.tiles.mapbox.com/v4/mapbox.streets/13/4092/2723.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; backface-visibility: hidden; transform: translate3d(-200px, -91px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.tiles.mapbox.com/v4/mapbox.streets/13/4095/2723.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; backface-visibility: hidden; transform: translate3d(568px, -91px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.tiles.mapbox.com/v4/mapbox.streets/13/4092/2724.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; backface-visibility: hidden; transform: translate3d(-200px, 165px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.tiles.mapbox.com/v4/mapbox.streets/13/4095/2724.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; backface-visibility: hidden; transform: translate3d(568px, 165px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-shadow-pane"></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-marker-pane"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(1.04805e+06px, 697379px, 0px) scale(4096);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">−</a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> | Map data © <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a></div></div></div></div>
                </div>                
                <!-- Records -->
                <div class="col-lg-5 overflow-auto" style="height:540px;">   
                    <section id="records"></section>
                </div>
            </div>
            <!-- /Map and records -->
        </div>
    </body>
    <?php require 'footer.php'; ?>
</html>

<script>

    function iterateRecords(data) {

        console.log(data);

        // Setup map
        var mymap = L.map('mapid').setView([-19, 140], 13);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(mymap);

        L.marker([localStorage.getItem("lat"), localStorage.getItem("lng")]).addTo(mymap)
            .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

        L.circle([-19, 140], 500, {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5
        }).addTo(mymap).bindPopup("I am a circle.");

        var popup = L.popup();

        $.each(data.result.records, function(recordKey, recordValue) {
            
            var recordTitle = recordValue["Trading Name"];
            var recordStreet = recordValue["Street"];
            var recordSuburb = recordValue["Suburb"];
            var recordPostcode = recordValue["Postcode"];
            var recordPhoneNumber = recordValue["Phone Number"];
            var recordState = recordValue["State"];
            var recordSport = recordValue["1. Sport/recreation activity"];
            var recordSport2 = recordValue["2. Sport/recreation activity"];
            var recordSport3 = recordValue["3. Sport/recreation activity"];
            var recordSport4 = recordValue["4. Sport/recreation activity"];
            var recordSport5 = recordValue["5. Sport/recreation activity"];
            if (recordSport2 != "") {
                recordSport += ", " + recordSport2;
            }
            if (recordSport3 != "") {
                recordSport += ", " + recordSport3;
            }
            if (recordSport4 != "") {
                recordSport += ", " + recordSport4;
            }
            if (recordSport5 != "") {
                recordSport += ", " + recordSport5;
            }

            // var recordYear = getYear(recordValue["dcterms:temporal"]);
            // var recordImage = recordValue["150_pixel_jpg"];
            // var recordImageLarge = recordValue["1000_pixel_jpg"];
            // var recordDescription = recordValue["dc:description"];
            
            if(recordTitle && recordStreet && recordSuburb && recordPostcode && recordPhoneNumber) {

                if(recordState == "QLD") { // Only get records from the 19th century

                    $("#records").append( 
                        $('<div class="singleClub record mb-5">').append(
                            $('<div class="clubTitle my-1">').append($('<h4>').text(recordTitle), $('<hr>')),
                            $('<h6 class="street">').text(recordStreet),
                            $('<h6 class="suburb">').text(recordSuburb),
                            $('<h6 class="postcode">').text(recordPostcode),
                            $('<h6 class="phoneNumber">').text(recordPhoneNumber),
                            $('<h6 class="sport">').text(recordSport),

                            // $("<a>").attr("href", recordImageLarge).addClass("strip").attr("data-strip-caption", recordTitle).append(
                            // 	$('<img>').attr("src", recordImage)
                            // ),

                            // //$('<img>').attr("src", recordImage),
                            // $('<p>').text(recordDescription)
                        )
                    );
                    L.marker([localStorage.getItem("lat"), localStorage.getItem("lng")]).addTo(mymap).bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
                }

            }

            setTimeout(function () {
                $("body").addClass("loaded");
            }, 20);

            $("#filter-count strong").text($(".record:visible").length);

            $("#suburb").keyup(function(event) {
                var searchTerm = $(this).val();
                console.log(searchTerm);

                $(".record").hide();
                $(".suburb:contains('" + searchTerm + "')").parent().show();

                $("#filter-count strong").text($(".record:visible").length);
            });

        });

    }

    // getCode from location
    function geocode(query){
        $.ajax({
        url: 'https://api.opencagedata.com/geocode/v1/json',
        method: 'GET',
        data: {
            'key': '9524066768e84bed885ac5c6bdcaae35',
            'q': query,
            'no_annotations': 1
            // see other optional params:
            // https://opencagedata.com/api#forward-opt
        },
        dataType: 'json',
        statusCode: {
            200: function(response){  // success
                var lat = response.results[0].geometry.lat;
                var lng = response.results[0].geometry.lng;
                localStorage.setItem("lat", lat);
                
                localStorage.setItem("lng", lng);
            },
            402: function(){
            console.log('hit free-trial daily limit');
            console.log('become a customer: https://opencagedata.com/pricing');
            }
            // other possible response codes:
            // https://opencagedata.com/api#codes
        }
        });
    }

    $(document).ready(function() {

        // load data 
        var slqData = JSON.parse(localStorage.getItem("slqData"));

        if (slqData) {
            console.log("Source: localStorage");
            iterateRecords(slqData);
        } else {
            console.log("Source: ajax call");
            var data = {
                resource_id: 'f07cb35c-ac11-448c-af6b-e61f8529a577', // the resource id
                limit: 10, // get 100 results
            };

            $.ajax({
                url: "https://data.qld.gov.au/api/3/action/datastore_search",
                data: data,
                dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
                cache: true,
                success: function(data) {
                    alert('Total results found: ' + data.result.total);
                    localStorage.setItem("slqData", JSON.stringify(data));

                    

                    iterateRecords(data);
                }
            });

        }

        geocode("Aitken Street Aitkenvale");
        //geocode("Corner Folkstone Avenue & Faheys Road Albany Creek");
        
    


    
    });
</script>

<!-- <script>
	var mymap = L.map('mapid').setView([-19.505, 140.09], 13);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(mymap);

    //var marker = L.marker().addTo(mymap);
    $(document).ready(function(){
        geocode("Aitken Street Aitkenvale");
        // console should now show:
        // 'Goethe-Nationalmuseum, Frauenplan 1, 99423 Weimar, Germany'
    });
    

    

</script> -->

