<?php if(get_field('map', get_option('option'))) : $map = get_field('map', get_option('option'));?>

    <section class="map">

        <script>
            function initialize() {
                var mapOptions = {
                        center: { lat: <?php echo $map['lat'];?>, lng: <?php echo $map['lng'];?> },
                        zoom: 17,
                        scrollwheel: false,
                        zoomControl: true,
                        disableDefaultUI: false,
                        draggable: false,
                        streetViewControl: false,
                        panControl: false,
                        styles: 
                            [
                                {"featureType": "all","stylers": [{"saturation": 0},{"hue": "#e7ecf0"}]},{"featureType": "road","stylers": [{"saturation": -70}]},
                                {"featureType": "transit","stylers": [{"visibility": "off"}]},{"featureType": "poi","stylers": [{"visibility": "off"}]},
                                {"featureType": "water","stylers": [{"visibility": "simplified"},{"saturation": -60}]}
                            ]
                    };
                var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <div id="map-canvas"></div>

    </section>

<?php endif;?>


GOOGLE MAPS WITH INFO WINDOW 

<?php 
    if($map = get_field('map')): 
        $lat = $map['lat'];
        $lng = $map['lng'];
?>
    <script>
        var lat = <?php echo $lat; ?>;
        var lng = <?php echo $lng; ?>;
    </script>

    <div id="map-canvas"></div>
<?php endif;?>

<script>
	jQuery(document).ready(function() {
		function initialize() {
            if(typeof lat == "undefined")
                return;
          
            var latLang = new google.maps.LatLng(lat,lng);
            var mapOptions = {
                zoom: 15,
                center: latLang,
                scrollwheel: true,
                zoomControl: false,
                disableDefaultUI: false,
                draggable: false,
                streetViewControl: false,
                panControl: false,
              }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var marker = new google.maps.Marker({
                position: latLang,
                map: map,
            });

            <?php $address = $map['address'];?>
            var contentString = '<div id="info_window"><?php echo $address;?></div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
              });
            }

        google.maps.event.addDomListener(window, 'load', initialize);
	});
</script>




GOOGLE MAPS MULTIPLE ADDRESSES

<?php get_header();?>

<div id="map_canvas" data-marker="<?php the_field('map_marker', 'option');?>"></div>

<script type="text/javascript">
	jQuery(document).ready(function() {
		locations = [
		    <?php if( have_rows('map_repeater') ):?>
				<?php while ( have_rows('map_repeater') ) : the_row();?> 
			         <?php 
			         	$full_address = get_sub_field('address');
			            $address 	= $full_address['address'];   	//[i][0]
			            $lat   		= $full_address['lat'];     	//[i][1]
			            $lng   		= $full_address['lng']; 		//[i][2]
			         ?>     
					[
						<?php if($address) echo "'".$address."'"; else echo '';?>,
					 	<?php if($lat) echo $lat; else echo '';?>,
					 	<?php if($lng) echo $lng; else echo '';?>, 
				 	],
				<?php endwhile; ?>       
			<?php endif;?>
		]
	});
</script>

<script>
	function multimarker_map() {
		var map = new google.maps.Map(document.getElementById('map_canvas'), {
			zoom: 9,
			scrollwheel: false,
			zoomControl: false,
			disableDefaultUI: false,
			draggable: false,
			streetViewControl: false,
			panControl: false,
			center: new google.maps.LatLng(locations[0][1], locations[0][2]),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var infowindow = new google.maps.InfoWindow();
		var marker, i;

		for (i = 0; i < locations.length; i++) {  
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				map: map,
				icon: jQuery('#map_canvas').data('marker')
			});

			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent('<div class="info_window">'+locations[i][0]+'</div>');
					infowindow.open(map, marker);
				}  
			})(marker, i));
		}
	}
</script>

<?php get_footer(); ?>

//Google Maps Repeater

<?php if(have_rows('map_repeater')):?>
	<?php $i = 0; while(have_rows('map_repeater')) : the_row(); ?> 
		<?php if( $map = get_sub_field('map')) : $lat = $map['lat']; $lng = $map['lng'];?>
			<div class="map_wrapper" data-lng="<?php echo $lng;?>" data-lat="<?php echo $lat;?>">
				<div id="map_canvas_<?php echo $i;?>"></div>
			</div>
		<?php endif;?>
	<?php $i++; endwhile; ?>       
<?php endif;?>

function googleMapsInit() {
    jQuery('.map_wrapper').each(function(index) {      
        var lng = jQuery(this).data('lng');
        var lat = jQuery(this).data('lat');

        if(typeof lat == "undefined")
            return;
      
        var latLang = new google.maps.LatLng(lat,lng);
        var mapOptions = {
            zoom: 15,
            center: latLang,
            scrollwheel: true,
            zoomControl: false,
            disableDefaultUI: false,
            draggable: false,
            streetViewControl: false,
            panControl: false,
        }
        var map = new google.maps.Map(document.getElementById('map_canvas_'+index), mapOptions);

        var marker = new google.maps.Marker({
            position: latLang,
            map: map,
        });
    });
}

google.maps.event.addDomListener(window, 'load', googleMapsInit);

	
//Google Maps Multilingual

<?php

define ('LANG', ICL_LANGUAGE_CODE);

if(LANG == 'he') $maplang = '&language=iw'; else $maplang = '';

wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&language='.$maplang, array(), NULL, true );







map filter 

function region_filter() {
    var infowindow = new google.maps.InfoWindow();

    jQuery('#region_filter').on('change', function() {
        // ClearMarkers
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }

        selected_region = jQuery(this).val();
        for (i = 0; i < locations.length; i++) {
            if(selected_region == locations[i][3]) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: jQuery('#map_canvas').data('icon')
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent('<div class="info_window">'+locations[i][0]+'</div>');
                        infowindow.open(map, marker);
                    }  
                })(marker, i));

                markers.push(marker);

                map.setCenter(marker.getPosition());

            }
        }
    });
}

<div class="filter">
	<h5 class="caption"><?php the_field('before_map_caption');?></h5>
		<?php 
		$regions = array();
		while(have_rows('map_repeater')) : the_row();
			if(!in_array(get_sub_field('region'), $regions)) {
				$regions[] = get_sub_field('region');
			}
		endwhile;
		?>
	<select name="region_filter" id="region_filter">
		<?php foreach ($regions as $region): ?>
			<option value="<?php echo $region;?>"><?php echo $region;?></option> 
		<?php endforeach ?>
	</select>
</div>
<div id="map_canvas" data-icon="<?php the_field('map_marker', 'option');?>"></div>