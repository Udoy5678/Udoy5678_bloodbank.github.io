@include('include.header')

<!DOCTYPE html>
<html>
  <!-- Select an option from the style selector to see some of the@include('include.header')
       customizations you can apply with map styling. -->
  <head>
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
      <meta charset="utf-8">
    <!-- This stylesheet contains specific styles for displaying the map
         on this page. Replace it with your own styles as described in the
         documentation:
         https://developers.google.com/maps/documentation/javascript/tutorial -->
       
         <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <style>
     
   
     #map {
      margin-top: 10px;
      
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: block;
      }

      #map #infowindow-content {
        display: block;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;

      }

      .pac-controls {
        display: block;
        padding: 5px 11px;
        
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
       
      }
      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
        
        
      }
      

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
   
    </style>
 
      
    {{--for making map responsive--}}
    <script type="text/javascript">
  
  google.maps.event.addDomListener(window, 'load', initialize)
    
  google.maps.event.addDomListener(window, 'resize', initialize);
  
</script>


  </head>
  
  <body>
      @include('include.fixedNavbar')
    {{--body starts from here--  }}


 {{--custom search--}}
 
 <input id="pac-input" class="controls" type="text" placeholder="searchbox" style="margin-top: 110px;margin-left: 450px;position: absolute;top: 18px;z-index: 1">
 <div id="map" ></div>
  
  
 {{--custom search--}}
  

 
   {{--body starts from here--}}
    
   
    {{-- <div id="map"> <meta name="csrf-token" content="{{ Session::token() }}"> </div>--}}
   
    <script>
       var hiding_marker=0;
       
      var map;
      var icon = { 
    url: 'img/drop.png'
};

var mylatlon;
      //finding current location
      geoLocationInit();
      function geoLocationInit()
      {
if(navigator.geolocation){

  navigator.geolocation.getCurrentPosition(success,fail);
  //console.log( navigator.geolocation.getCurrentPosition(success,fail));
}
else
{
  alert("Browser not supported");
}



      }
      //if succeed

      function success(position)
      {

        var latval=position.coords.latitude;
        var lonval=position.coords.longitude;
     
        console.log([latval,lonval]);
         mylatlon= new google.maps.LatLng(latval, lonval);
        initMap(mylatlon);
       // nearbySearch(mylatlon,"hospital");
  
       searchdonor(latval,lonval);
     //  customsearch(latval,lonval);
     //autocomplete
  
     initAutocomplete(latval,lonval);
      }
    
      function initAutocomplete(latval,lonval) {
      //  if(a==0)
    //  alert(latval + " " + lonval + " (types: " + (typeof latval) + ", " + (typeof lonval) + ")");
     // var  latLng = new google.maps.LatLng(parseFloat(latval.lat),parseFloat(lonval.lng));

     var latLng = new google.maps.LatLng(latval, lonval);
    // console.log(latLng);
      $("#pac-input").on("change paste keyup", function() {

    
          map = new google.maps.Map(document.getElementById('map'), {
          center: latLng,
          zoom: 13,
         
        });
         // Create the search box and link it to the UI element.
         var input = document.getElementById('pac-input');
      
       var searchBox = new google.maps.places.SearchBox(input);

   
        //  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
           // Bias the SearchBox results towards current map's viewport.
           map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
      
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
         

          if (places.length == 0) {
            return;
          }
       
                    // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];
             // For each place, get the icon, name and location.
             var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };
            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              //icon: icon,
              title: place.name,
              position: place.geometry.location
             
            }));
           // console.log(position);
          
          // console.log(lat);
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
              
            } else {
              bounds.extend(place.geometry.location);
            }
            var latval=place.geometry.location.lat();      
           var lonval=place.geometry.location.lng();  
          // searchdonor(latval,lonval);
         //  console.log(lat); 
         $.get('/searchdonormap',{lat:latval,lon:lonval},function(match){

//console.log(lat);
$.each(match,function(objindex,objval){
  donor_loc_id=objval.userid;
donor_loc_bloodgroup=objval.bloodgroup;
donorlat=objval.lat;
donorlon=objval.lon;
donor_loc_name=objval.name;
donor_loc_ban_name=objval.bn_name;



var currentinfo = null;//closing previous location
if(hiding_marker==0)
            {
              
        var marker = new google.maps.Marker({
            position: {lat:donorlat,lng:donorlon},
         
            map: map,
            icon: 'img/drop.png',
            title: donor_loc_ban_name,
            donor_loc_id: donor_loc_id
           
        });
        hiding_marker++;
     
       // console.log(hiding_marker);
            }else
            {
             // console.log(hiding_marker+=10);
             // donorlat+=1.5;
             // donorlon+=1.5;
          
             previous_donor_lat_lon+=.001;
             
              var marker = new google.maps.Marker({
            position: {lat: donorlat-=previous_donor_lat_lon
            
            
            ,lng:donorlon-=previous_donor_lat_lon},
         
            map: map,
            icon:'img/drop.png' ,
            title: donor_loc_ban_name,
            donor_loc_id: donor_loc_id
           
        });
            }
        
 var infowindow=new google.maps.InfoWindow({
  map:map,
content:donor_loc_bloodgroup

 });
        //add singleclick event of marker
      

google.maps.event.addListener(marker,"click",function(e){
  if(currentinfo) { currentinfo.close();} //current info close 
//console.log(marker['title']);
//show particular location
infowindow.open(map,marker);//next info open
currentinfo = infowindow;
});
//double click event to showing donors
google.maps.event.addListener(marker,"dblclick",function(e){
 // if(currentinfo) { currentinfo.close();} //current info close 
//console.log(marker['title']);
send_dblclick_location(donor_loc_id);
//show particular location
//infowindow.open(map,marker);//next info open
//currentinfo = infowindow;
});
       
});
       });
          map.fitBounds(bounds);
         
        });
     
});

});
}
            //if fails

            function fail()
            {
alert("It fails");

            }
            //for detecting current position and marker
      function initMap(mylatlon) {
        // Create the map with no initial style specified.
        // It therefore has default styling.
        map = new google.maps.Map(document.getElementById('map'), {
          center:mylatlon,
          zoom: 13,
          mapTypeControl: false
        });
     
        //create marker function for callback
      
  //marker for places
  var marker = new google.maps.Marker({
    position: mylatlon,
    map: map,
   
    
    
  });


     

    
//});
        

        }
      
        var currentinfo = null;//closing previous location
       //Create marker
      var previous_donor_lat_lon=.002;
    function createMarker(donorlat,donorlon, icn, donor_loc_bloodgroup,donor_loc_ban_name,donor_loc_id) {
       
            if(hiding_marker==0)
            {
              
        var marker = new google.maps.Marker({
            position: {lat:donorlat,lng:donorlon},
         
            map: map,
            icon: icon,
            title: donor_loc_ban_name,
            donor_loc_id: donor_loc_id
           
        });
        hiding_marker++;
     
       // console.log(hiding_marker);
            }else
            {
             // console.log(hiding_marker+=10);
             // donorlat+=1.5;
             // donorlon+=1.5;
          
             previous_donor_lat_lon+=.001;
             
              var marker = new google.maps.Marker({
            position: {lat: donorlat-=previous_donor_lat_lon
            
            
            ,lng:donorlon-=previous_donor_lat_lon},
         
            map: map,
            icon:icon ,
            title: donor_loc_ban_name,
            donor_loc_id: donor_loc_id
           
        });
            }
        
 var infowindow=new google.maps.InfoWindow({
  map:map,
content:donor_loc_bloodgroup

 });
        //add singleclick event of marker
      

google.maps.event.addListener(marker,"click",function(e){
  if(currentinfo) { currentinfo.close();} //current info close 
//console.log(marker['title']);
//show particular location
infowindow.open(map,marker);//next info open
currentinfo = infowindow;
});
//double click event to showing donors
google.maps.event.addListener(marker,"dblclick",function(e){
 // if(currentinfo) { currentinfo.close();} //current info close 
//console.log(marker['title']);
send_dblclick_location(donor_loc_id);
//show particular location
//infowindow.open(map,marker);//next info open
//currentinfo = infowindow;
});
       
}
//send double click location
function send_dblclick_location( donor_loc_id)
{
  
  //get the input value
 //{{csrf_field()}};

 // window.location = '/donor_location?location_name=' + encodeURIComponent(location_name).replace(/%20/g,'+');
  //need encryption
  window.location.replace("/donor_location?donor_loc_id=" +  donor_loc_id);
 // $.get("donor_location",{donor_loc_id:donor_loc_id}, function(data, status){
  //      alert("Data: " + data + "\nStatus: " + status);
  //  });
  
 

}
 
//search donor
function searchdonor(lat,lon)
{
  //passing lat lon value to find nearest donor
$.get('/searchdonormap',{lat:lat,lon:lon},function(match){

//console.log(lat);
$.each(match,function(objindex,objval){
//console.log(objindex);
donor_loc_id=objval.userid;
donor_loc_bloodgroup=objval.bloodgroup;

//var loc_id=[[donor_loc_id]];
//console.log(loc_id);
//console.log([donor_loc_bloodgroup]);
donorlat=objval.lat;
donorlon=objval.lon;
donor_loc_name=objval.name;
donor_loc_ban_name=objval.bn_name;



//passing current nearest donor location to create a marker
//mylatlon= new google.maps.LatLng(donorlat, donorlon);

createMarker(donorlat,donorlon,icon,donor_loc_bloodgroup,donor_loc_ban_name,donor_loc_id);

});


});
}


     

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmp1W3LG05gxREgkxTP2wKmyqyibD5z3w
    &callback=initMap&libraries=places"
        async defer></script>
   
   
  </body>
  </html>
{{--footer--}}
<!-- Scripting Link 
{{<script src="js/main.js"></script>
-->
<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="../js/plugins.js"></script>

<script src="../js/jquery.min.js"></script>

<script src="../js/uikit.min.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
  <script>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='https://www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
-->
<div class="footer" style="<
div class=&quot;footer&quot;>      <p style=&quot;      background: #cc0000;      color: #fff;      /* bottom: 0; */      font-size: 20px;      text-align: center;      font-weight: bold;      /* width: 100%; */      /* padding: 30px; */  &quot;>Copyright © 2018        <span style=&quot;color: rgb(213, 213, 213);&quot;>Mr.Tanvir Ahmed</span>      </p>      All rights reserved.  </div>;
    background: #cc0000;
    color: #fff;
    /* bottom: 0; */
    font-size: 20px;
    text-align: center;
    font-weight: bold;
">
    <p>Copyright © 2018        <span style="color: rgb(213, 213, 213);">Mr.Tanvir Ahmed</span>
    </p>
    All rights reserved.
</div>
<script type="text/javascript" src="../js/scrolltop.js"></script>
</body>
</html>
  