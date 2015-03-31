<?php  
  echo $before_widget;
  echo $before_title . $title . $after_title; 
?>
<div class="quae_map_container" data-mapsettings="{&quot;latlon&quot;:&quot;<?php echo $latlon;?>&quot;, &quot;address&quot;:&quot;<?php echo $address;?>&quot;, &quot;zoom&quot;:&quot;<?php echo $zoom;?>&quot;, &quot;zoomControl&quot;:<?php echo $zoomControl;?>, &quot;mapTypeControl&quot;:<?php echo $mapTypeControl;?>, &quot;scaleControl&quot;:<?php echo $scaleControl;?>, &quot;streetViewControl&quot;:<?php echo $streetViewControl;?>, &quot;bounce&quot;:<?php echo $bounce;?>, &quot;infoWindow&quot;:<?php echo $infoWindow;?>}">
</div>
<?php if (checked($infoWindow, 1, false)) : ?>
<div class="quae_map_tootltip">
  <?php if ($infoWindowTitle !== ''): ?>
  <p class="quae_map_marker_title"><?php echo $infoWindowTitle; ?></p>
  <?php endif; ?>
  <?php echo $address; ?>
</div>
<?php endif; ?>
<?php
  echo $after_widget; 
?> 