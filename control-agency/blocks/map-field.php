<?php
if(!empty($additional_class)) $additional_class = ' '.$additional_class;
else $additional_class = '';
 ?>
<div class="pt-5 pt-lg-90<?php echo esc_attr($additional_class); ?>">
    <div id="map"></div>
</div>
<?php
architronix_leaflet_map_script($locations);
?>