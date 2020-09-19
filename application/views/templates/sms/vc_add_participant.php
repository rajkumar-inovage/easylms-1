You have been added to virtual session <?php echo strtoupper ($class_name); ?> in <?php echo strtoupper($coaching_name); ?>. Click on the link to join <?php echo $join_url; ?>
<?php if ($start_date > 0) { echo ' Session is scheduled on '.date ('d M, Y', $start_date).' at '.date ('H:i A', $start_date).'.'; } ?>
