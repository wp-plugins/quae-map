<p>
  <label><?php _e('Title', $textDomain); ?></label>
  <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" >
</p>
<p>
  <label><?php _e('Address', $textDomain); ?></label>
  <input class="widefat" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>">
</p>
<p>
  <label><?php _e('Lat, Lon', $textDomain); ?></label>
  <input class="widefat" type="text" name="<?php echo $this->get_field_name('latlon'); ?>" value="<?php echo $latlon; ?>" >
</p>
<p>
  <label><?php _e('Zoom', $textDomain); ?></label>
  <input width="4" type="text" name="<?php echo $this->get_field_name('zoom'); ?>" value="<?php echo $zoom; ?>" >
</p>
<p>
  <label><?php _e('Show zoom control', $textDomain); ?></label>
  <input type="checkbox" name="<?php echo $this->get_field_name('zoomControl'); ?>" value="1" <?php checked($zoomControl, 1 ); ?> >
</p>
<p>
  <label><?php _e('Show map type control', $textDomain); ?></label>
  <input type="checkbox" name="<?php echo $this->get_field_name('mapTypeControl'); ?>" value="1" <?php checked($mapTypeControl, 1 ); ?> >
</p>
<p>
  <label><?php _e('Show scale control', $textDomain); ?></label>
  <input type="checkbox" name="<?php echo $this->get_field_name('scaleControl'); ?>" value="1" <?php checked($scaleControl, 1 ); ?> >
</p>
<p>
  <label><?php _e('Show street view control', $textDomain); ?></label>
  <input type="checkbox" name="<?php echo $this->get_field_name('streetViewControl'); ?>" value="1" <?php checked($streetViewControl, 1 ); ?> >
</p>
<p>
  <label><?php _e('Bouncing marker', $textDomain); ?></label>
  <input type="checkbox" name="<?php echo $this->get_field_name('bounce'); ?>" value="1" <?php checked($bounce, 1 ); ?> >
</p>
<p>
  <label><?php _e('Show info window', $textDomain); ?></label>
  <input type="checkbox" name="<?php echo $this->get_field_name('infoWindow'); ?>" value="1" <?php checked($infoWindow, 1 ); ?> >
</p>
<p>
  <label><?php _e('Info window title', $textDomain); ?></label>
  <input class="widefat" type="text" name="<?php echo $this->get_field_name('infoWindowTitle'); ?>" value="<?php echo $infoWindowTitle; ?>">
</p>