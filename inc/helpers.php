<?php


// Add excerpt limit
function excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( " ", $excerpt ) . ' [...]';
	} else {
		$excerpt = implode( " ", $excerpt );
	}
	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

	return $excerpt;
}

function trim_content( $limit ) {
	$get_the_content = explode( ' ', get_the_content(), $limit );
	if ( count( $get_the_content ) >= $limit ) {
		array_pop( $get_the_content );
		$get_the_content = implode( " ", $get_the_content ) . ' [...]';
	} else {
		$get_the_content = implode( " ", $get_the_content );
	}
	$get_the_content = preg_replace( '`[[^]]*]`', '', $get_the_content );

	return $get_the_content;
}

// add check for if page is blog
function is_blog() {
	return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() ) && 'post' == get_post_type();
}