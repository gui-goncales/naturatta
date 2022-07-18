<?php include 'svg.php'; ?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="lupa"><?php echo $lupa; ?></div>
  <input type="hidden" name="search-type" value="product" />
	<input type="search" class="search-field"
	placeholder="<?php echo esc_attr_x( '', 'placeholder' ) ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
  <button type="submit" name="button"><?php echo $lupa; ?></button>
</form>
