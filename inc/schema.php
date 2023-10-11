<?php 

function hive_hook_schema() {
	$schema = get_field('schema');
		if(!empty($schema)) {
		echo $schema;
	}
}
add_action('wp_head', 'hive_hook_schema');

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5a9572e1e3a4e',
		'title' => 'Schema Settings',
		'fields' => array(
			array(
				'key' => 'field_5a9574777e6eb',
				'label' => 'Schema Generator',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'message' => '<a href="https://www.schemaapp.com/tools/jsonld-schema-generator/">https://www.schemaapp.com/tools/jsonld-schema-generator/</a>',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_5a9572e98fb61',
				'label' => 'Schema',
				'name' => 'schema',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '70',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
	
	endif;