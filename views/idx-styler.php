<div class="wrap">
<?php screen_icon('themes'); ?>
<h2>IDX Styler</h2>
<form action="options.php" method="post" id="idx-styler-options-form">
	<?php settings_fields(AIS_SETTINGS_FIELD); ?>
	<?php $options = ais_get_options(); ?>
	<br />
	<div class="form-field">
		<label for="plugin_ae_idx_styler_settings[idx_provider]">Select an IDX Provider to include styling for:</label>
		<br />
		<select name="plugin_ae_idx_styler_settings[idx_provider]" class="">
			<option value="idx-broker-platinum" <?php selected($options['idx_provider'], 'idx-broker-platinum') ?>>IDX Broker Platinum</option>
			<option value="diverse-solutions" <?php selected($options['idx_provider'], 'diverse-solutions') ?>>Diverse Solutions</option>
			<option value="optima-express" <?php selected($options['idx_provider'], 'optima-express') ?>>Optima Express</option>
			<option value="flexmls" <?php selected($options['idx_provider'], 'flexmls') ?>>FlexMLS</option>
		</select>
	</div>
	<br />
	<div class="form-field">
		<label for="plugin_ae_idx_styler_settings[ae_child_theme]">Select your Agent Evolution child theme:</label>
		<br />
		<select name="plugin_ae_idx_styler_settings[ae_child_theme]" class="">
			<option value="picture-perfect" <?php selected($options['ae_child_theme'], 'picture-perfect'); ?>>Picture Perfect</option>
			<option value="curb-appeal" <?php selected($options['ae_child_theme'], 'curb-appeal'); ?>>Curb Appeal</option>
		</select>
	</div>
	<br />
	<input name="submit" class="button-primary" type="submit" value="<?php esc_attr_e('Save Settings'); ?>" />
</form>

<p style="margin-top: 100px;">Some IDX providers, such as WolfNet, require a static header and footer. To do this just copy the header code below into a text file and name it header.html. Do the same for the footer code and name it footer.html. Then send to WolfNet to implement on their end. <em>When you make updates to either your header or footer (menu items, widgets, etc.) you'll need to re-copy the code and re-send to WolfNet.</em></p>
<h2>Header</h2>
<textarea rows="50" cols="200">
<?php
	echo do_action( 'genesis_doctype' );
	echo do_action( 'genesis_title' );
	echo do_action( 'genesis_meta' );

	echo wp_head();

	echo '</head>';
	echo '<body>';

	echo do_action( 'genesis_before' );

	echo '<div id="wrap">';

	echo do_action( 'genesis_before_header' );
	echo do_action( 'genesis_header' );
	echo do_action( 'genesis_after_header' );

	echo '<div id="inner">';
	echo genesis_structural_wrap( 'inner' );
?>
</textarea>

<h2>Footer</h2>
<textarea rows="50" cols="200">
<?php
	echo genesis_structural_wrap( 'inner', '</div><!-- end .wrap -->' );
	echo '</div><!-- end #inner -->';

	echo do_action( 'genesis_before_footer' );
	echo do_action( 'genesis_footer' );
	echo do_action( 'genesis_after_footer' );

	echo '</div><!-- end #wrap -->';

	echo wp_footer(); // we need this for plugins
	echo do_action( 'genesis_after' );

	echo '</body>
	</html>';
?>
</textarea>

</div>