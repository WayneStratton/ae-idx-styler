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
			<option value="curb-appeal-evolved" <?php selected($options['ae_child_theme'], 'curb-appeal-evolved'); ?>>Curb Appeal Evolved</option>
			<option value="curb-appeal" <?php selected($options['ae_child_theme'], 'curb-appeal'); ?>>Curb Appeal Legacy</option>
			<option value="open-floor-plan" <?php selected($options['ae_child_theme'], 'open-floor-plan'); ?>>Open Floor Plan</option>
			<option value="move-in-ready" <?php selected($options['ae_child_theme'], 'move-in-ready'); ?>>Move-in Ready</option>
		</select>
	</div>
	<br />
	<input name="submit" class="button-primary" type="submit" value="<?php esc_attr_e('Save Settings'); ?>" />
</form>
</div>