<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hive-starter
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">

	<?php echo do_shortcode('[fl_builder_insert_layout slug="site-footer"]'); ?>
	<div class="site-footer__copyright">
		<div class="container">
			<p class="text-center">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name') ?></p>
		</div>
	</div>

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<?php
$het_options = get_option( 'het_settings', '' );
if(is_array($het_options)) {
	echo $het_options['het_textarea_field_3'];
}
?>


</body>
</html>
