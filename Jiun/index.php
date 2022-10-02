<?php
  include_once 'header.php';
?>

<!-- Background Img -->
<div class="bgimg-2 text-center text-white ">
  <?php
    if (isset($_SESSION['usersuid'])){
      echo "<h3>Welcome " . $_SESSION['usersname'] . "</h3>";
    }
  ?>
  <h1 class="display-1 text-uppercase" style="font-weight: 500">Women Safety in Melbourne</h1>
</div>

<!-- Visualisation -->
<div class="container-max-widths bg-light p-3 text-center" >
  <h1> Visualisation</h1>
  <div class="row p-5">
      <div class="col-lg-6 col-md-12 col-sm-12">
      <div class='tableauPlaceholder' id='viz1663584350785' style='position: relative'><noscript><a href='#'><img alt='Dashboard 2 ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Fi&#47;Fit3164_Viz1&#47;Dashboard2&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='Fit3164_Viz1&#47;Dashboard2' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Fi&#47;Fit3164_Viz1&#47;Dashboard2&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en-US' /><param name='filter' value='publish=yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1663584350785');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} else { vizElement.style.width='100%';vizElement.style.height='727px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <div class='tableauPlaceholder' id='viz1663585804507' style='position: relative'><noscript><a href='#'><img alt='Dashboard 3 ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Fi&#47;Fit3164_Viz1&#47;Dashboard3&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='Fit3164_Viz1&#47;Dashboard3' /><param name='tabs' value='no' /><param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Fi&#47;Fit3164_Viz1&#47;Dashboard3&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='language' value='en-US' /><param name='filter' value='publish=yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1663585804507');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} else { vizElement.style.width='100%';vizElement.style.height='727px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>
      </div>

  <div class="text-center"><button type="button" class="btn btn-dark btn-sm mt-3" style="width: 10%;min-width: 100px;"><a class="text-white" href="./visualisation.php">See more</a></button></div>
  </div>
</div>
  
<!-- Background Img -->
<div class="container-max-widths bgimg-1 ">
  <div class="container-max-widths bg-dark text-white opacity-75" >
  </div>
</div>

<!-- Map -->
<div class="container-max-widths bg-dark text-white p-5 text-center" >
  <h1 class="mb-5"> Map</h1>
  <iframe width='100%' height='400px' src="https://api.mapbox.com/styles/v1/mcaw/cl6vtrkw1000c14p0zinatwet/draft.html?title=false&access_token=pk.eyJ1IjoibWNhdyIsImEiOiJjbDZ2dDJsM2kwMWJtM2twYjFzMXA0cTMwIn0.-iv6u44ZgjQHV2UZcrYkAA&zoomwheel=false#4.29/-39.09/145.4" title="Basic" style="border:none;"></iframe>
</div>


<script>
var map = L.map('map').fitWorld();

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

map.locate({setView: true, maxZoom: 16});

function onLocationFound(e) {
    var radius = e.accuracy;

    L.marker(e.latlng).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}

map.on('locationerror', onLocationError);
</script>