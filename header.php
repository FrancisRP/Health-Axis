<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hive-starter
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<?php
$het_options = get_option( 'het_settings', '' );
if(is_array($het_options)){
	echo $het_options['het_textarea_field_0'];
}

?>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<?php
if(is_array($het_options)) {
	echo $het_options['het_textarea_field_1'];
}
?>

<style type="text/css">

	<?php if (get_field('default_section_padding', 'option')): ?>
		<?php $section_padding = get_field('default_section_padding', 'option'); ?>
		#content .fl-row:not(.custom-padding) > .fl-row-content-wrap {
			padding-top: <?php echo $section_padding; ?>;
			padding-bottom: <?php echo $section_padding; ?>;
		}
	<?php endif; ?>
</style>

</head>

<body <?php body_class(); ?>>

	<?php
	if(is_array($het_options)) {
		echo $het_options['het_textarea_field_2'];
	}
	?>

	<header class="site-header">

		<?php

			if( get_field('notice_bar', 'option') && get_field('notice_bar_placement', 'option') == 'top' ) {
				echo '<div class="notice-bar"><div class="wrap">';
				echo get_field('notice_bar_message', 'option');
				echo '<button class="close"><i class="fa fa-times-circle"></i> <span>Close Notice Bar</span></button>';
				echo '</div></div>';
			}

			if( get_field('sub_header', 'option') ) {
				echo do_shortcode('[fl_builder_insert_layout slug="sub-header"]');
			}

			echo do_shortcode('[fl_builder_insert_layout slug="site-header"]');

			if( get_field('notice_bar', 'option') && get_field('notice_bar_placement', 'option') == 'bottom' ) {
				echo '<div class="notice-bar"><div class="wrap">';
				echo get_field('notice_bar_message', 'option');
				echo '<button class="close"><i class="fa fa-times-circle"></i> <span>Close Notice Bar</span></button>';
				echo '</div></div>';
			}
		?>

	</header>

	<div id="content" class="site-content">
