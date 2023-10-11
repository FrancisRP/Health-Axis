<?php

add_action( 'admin_menu', 'het_add_admin_menu' );
add_action( 'admin_init', 'het_settings_init' );


function het_add_admin_menu(  ) {

	add_options_page( 'Hive Easy Tag', 'Hive Easy Tag', 'manage_options', 'hive_easy_tag', 'het_options_page' );

}


function het_settings_init(  ) {

	register_setting( 'pluginPage', 'het_settings' );

	add_settings_section(
		'het_pluginPage_section',
		__( '', 'hive' ),
		'het_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'het_textarea_field_0',
		__( 'HEAD Tag Start', 'hive' ),
		'het_textarea_field_0_render',
		'pluginPage',
		'het_pluginPage_section'
	);

	add_settings_field(
		'het_textarea_field_1',
		__( 'HEAD Tag End', 'hive' ),
		'het_textarea_field_1_render',
		'pluginPage',
		'het_pluginPage_section'
	);

	add_settings_field(
		'het_textarea_field_2',
		__( 'After BODY Open', 'hive' ),
		'het_textarea_field_2_render',
		'pluginPage',
		'het_pluginPage_section'
	);

	add_settings_field(
		'het_textarea_field_3',
		__( 'Before BODY Close', 'hive' ),
		'het_textarea_field_3_render',
		'pluginPage',
		'het_pluginPage_section'
	);


}


function het_textarea_field_0_render(  ) {

	$options = get_option( 'het_settings' );
	?>
	<textarea cols='80' rows='10' name='het_settings[het_textarea_field_0]'><?php echo $options['het_textarea_field_0']; ?></textarea>
	<?php

}


function het_textarea_field_1_render(  ) {

	$options = get_option( 'het_settings' );
	?>
	<textarea cols='80' rows='10' name='het_settings[het_textarea_field_1]'><?php echo $options['het_textarea_field_1']; ?></textarea>
	<?php

}


function het_textarea_field_2_render(  ) {

	$options = get_option( 'het_settings' );
	?>
	<textarea cols='80' rows='10' name='het_settings[het_textarea_field_2]'><?php echo $options['het_textarea_field_2']; ?></textarea>
	<?php

}

function het_textarea_field_3_render(  ) {

	$options = get_option( 'het_settings' );
	?>
	<textarea cols='80' rows='10' name='het_settings[het_textarea_field_3]'><?php echo $options['het_textarea_field_3']; ?></textarea>
	<?php

}


function het_settings_section_callback(  ) {

	echo __( 'Add all tags here and they will inject into the specified location.', 'hive' );

}


function het_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Hive Easy Tag</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}