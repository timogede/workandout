<?php
/**
 * @title: Locations
 * @description: Locations Element mit Snazzy Maps
 * @icon: location-alt
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */
$id = 'locations--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$city_items = get_field_object('city_items');
$location_items = get_field_object('location_items');
$total_locations = 0;
$tl = 0;
foreach (
    $city_items['value'] as $city
    ):

$total_locations = count($city['location_items']) + $total_locations;
$tl++;
endforeach;
$c = 0;
$l = 0;
$a = 0;
$b = 0;
$d = 0;
$e = 0;
console_log($total_locations);
?>



<article class="locations container">
    <div class="locations_inside container__inside">
        <div class="locations__city__items">
            <?php if (is_array($city_items['value'])): foreach (
                    $city_items['value'] as $city
                    ): $a++; ?>
            <div class="locations__city--<?=$a?> locations__city__item <?php if($a == 1): echo 'city--active'; endif; ?>">
                <h4><?=$city['city_name']?></h4>
            </div>
            <?php endforeach; endif; ?>
        </div>
        <div class="locations__location__items">
        <?php if (is_array($city_items['value'])): foreach (
                    $city_items['value'] as $city
                    ): $d++ ?>
                    <div class="locations__city--<?=$d?> locations__location__city <?php if($d == 1): echo 'city--active'; endif; ?>">
                <?php if (is_array($city['location_items'])): foreach (
                        $city['location_items'] as $location
                        ): $e++; ?>
                    
                        <div class="locations__location--<?=$e?> locations__location__item <?php if($e == 1): echo 'location--active'; endif; ?>">
                        <p>
                         <b><?=$location['location_name']?></b><br/>
                         <?=$location['location_description']?>
                        </p>
                        </div>
                    
            <?php endforeach; endif;  ?>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</article>








 <div id="map">
 </div>



    <script>
        let map;

function initMap() {
// Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 13,
                    fullscreenControl: false,
                    mapTypeControl: false,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(50.937682422910804, 6.962669849515452), // Köln

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
    }
]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
               
                const theme_directory = "<?php echo get_template_directory_uri() ?>";

                const image =  theme_directory + '/assets/images/marker.png';
               
              
                <?php if (is_array($city_items['value'])): foreach (
                    $city_items['value'] as $city
                    ): $c++; ?>

                    <?php if (is_array($city['location_items'])): foreach (
                        $city['location_items'] as $location
                        ): $l++; ?>

                 



                // console_log($city_items['value']);
                // infowindow markertext
                const markerText_<?=$l?> = new google.maps.InfoWindow({
                    content: "<h3 style='color:#e1dd00; font-weight: bold;'><?=$location['location_name']?></h3><p><?=$location['location_description']?></p>"
                });
            
             
                
                // marker
                const marker_<?=$l?> = new google.maps.Marker({
                    position: new google.maps.LatLng(<?=$location['coordinates']?>),
                    map: map,
                    title: 'marker_<?=$l?>',
                    icon: image,
                });
                
                // marker click listener
                    marker_<?=$l?>.addListener("click", () => {
                        <?php
                            for ($x = 1; $x <= $total_locations; $x++) { ?>
                                markerText_<?=$x?>.close();
                            <?php } ?>
                        markerText_<?=$l?>.open({
                            anchor: marker_<?=$l?>,
                            map,
                            shouldFocus: true,
                        });
                        $(".locations__location__item").removeClass("location--active");
                        $(".locations__location--<?=$l?>").addClass("location--active");
                        if($(".locations__location--<?=$l?>").parent().hasClass("city--active")){
                            console.log("parent citygroup is active");
                           return;
                        } else{
                            console.log("parent citygroup is NOT active");
                            var parentFirstClass = $(".locations__location--<?=$l?>").parent().attr("class").split(" ")[0];
                            console.log(parentFirstClass);
                            $(".locations__location__city").removeClass("city--active");
                            $(".locations__location--<?=$l?>").parent().addClass("city--active");
                            $(".locations__city__items .locations__city__item").removeClass("city--active");
                            $(".locations__city__items ." + parentFirstClass).addClass("city--active");
                        }
                            });

                        // location click functions -- not markers but they trigger marker click function
                        $(".locations__location--<?=$l?>").click(function () {
                              google.maps.event.trigger(marker_<?=$l?>, 'click');
                          });

                        





                <?php endforeach;?>
                              <?php endif;?>
                              <?php endforeach;?>
                              <?php endif;?>


                // city click functions -- not markers
                        $(".locations__city__item").click(function () {
                            // get locations__city__item class
                            var clickedCityItem = $(this).attr("class").split(" ")[0];
                            // get location--x of first child in that city
                           var firstLocationOfThatCity = $(".locations__location__items ." + clickedCityItem).children().attr("class").split(" ")[0];
                            //get the number of that city
                            var locationNumber = firstLocationOfThatCity.split("--").pop();
                            var triggerMarkerString = "marker_" + locationNumber;
                            
                           // trigger it
                           console.log(typeof triggerMarkerString);
                           <?php for ($z = 1; $z <= $total_locations; $z++) { ?>
                            
                                
                                if(locationNumber == <?=$z?>){
                                 google.maps.event.trigger(marker_<?=$z?>  ,'click');
                           } 

                           <?php } ?>
                   
                          });
}
</script>



<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVnq-fnXEXZ4RtfdaU_mJ7fbAVV0KTqZY&callback=initMap&libraries=&v=weekly"
      async
    ></script>

    <?php endif;?>