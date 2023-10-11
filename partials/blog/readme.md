# How to get the Blog partial working 

Things you will need to update: 
- ACF Fields
- Gulp File
- index.php file
- single.php file
- the /blog/blog-single.scss
- functions.php
- style.scss file 
- header.php file 
- /template-parts/content-index.php
- /template-parts/content.php

---

## Step 1 
- Drop the Blog component folder into your `/assets/theme/hive-starter/partials` folder


## Step 2
- Update the gulpfile's watch task to watch the partials directory

```javascript
gulp.task('watch', ['compile', 'browserSync'], function() {
    gulp.watch( [WP_THEME_PATH + '/sass/**/*.scss', WP_THEME_PATH + '/partials/**/*.scss'] , ['compile']);  // If a file changes, re-run 'sass'
});
```

---

## Step 3
- Update the `/assets/themes/hive-starter/sass/style.scss` file to @import the Blog componenet stylesheet

```scss
// import partial components
@import '../partials/blog/blog-style';
```

---

## Step 4
- Update your index.php file to incorporate the new Blog index file structure

```php
get_header();
$show_sidebar = get_field( 'sidebars' , get_option('page_for_posts'));

if ($show_sidebar && in_array('show_sidebar_index', $show_sidebar)) :

    get_template_part('partials/blog/index/blog-index-with-sidebar');

else :

    get_template_part('partials/blog/index/blog-index-full');

endif;

get_footer();
```

---

## Step 5
- Update your single.php file to incorporate the new Blog single file structure 

```php 
get_header();

$show_sidebar = get_field( 'sidebars' , get_option('page_for_posts'));

if ($show_sidebar && in_array('show_sidebar_single', $show_sidebar)) :

  get_template_part('partials/blog/single/blog-single-with-sidebar');

else :

  get_template_part('partials/blog/single/blog-single-full');

endif;

get_footer();

```

---

## Step 6

- Update the functions.php file to include the excerpt limit function 

```php
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
```

---

## Step 7 
- Update the functions.php to add the is_blog() function to change the page header title on blog page

```php
function is_blog() {
	return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() ) && 'post' == get_post_type();
}
```

- Update the page header to change page title based on page 

```php
<?php if (is_blog()) : ?>
    <h1><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Blog</a></h1>
<?php else : ?>
    <h1><?php the_title(); ?></h1>
<?php endif; ?>
```

---

## Step 8 
- Import the ACF blog settings fields 

```json
[
    {
        "key": "group_59dbc3b3549aa",
        "title": "Setup - Blog",
        "fields": [
            {
                "key": "field_59dbc3ec6fd1d",
                "label": "Sidebars",
                "name": "sidebars",
                "type": "checkbox",
                "instructions": "",
                "required": 0,
                "conditional_logic": 0,
                "wrapper": {
                    "width": "",
                    "class": "",
                    "id": ""
                },
                "choices": {
                    "show_sidebar_single": "Show on blog single",
                    "show_sidebar_index": "Show on blog index"
                },
                "allow_custom": 0,
                "save_custom": 0,
                "default_value": [],
                "layout": "vertical",
                "toggle": 0,
                "return_format": "value"
            }
        ],
        "location": [
            [
                {
                    "param": "page",
                    "operator": "==",
                    "value": "318"
                },
                {
                    "param": "current_user_role",
                    "operator": "==",
                    "value": "administrator"
                }
            ]
        ],
        "menu_order": 0,
        "position": "side",
        "style": "default",
        "label_placement": "top",
        "instruction_placement": "label",
        "hide_on_screen": "",
        "active": 1,
        "description": ""
    }
]
```