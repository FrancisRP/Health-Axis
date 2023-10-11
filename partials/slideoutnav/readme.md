# How to setup this Hive Component

* Place this folder (containing the .js, .php, .scss, and .md files) inside the
`/.site-components` folder.

* Ensure that the gulp command is watching the `./site-components` folder:

```
// Watch with browser sync
gulp.task('watch', ['compile', 'browserSync'], function() {
    gulp.watch( [WP_THEME_PATH + '/sass/**/*.scss', WP_THEME_PATH + '/site-components/**/*.scss'], ['compile']);
});
```

* Add the following jQuery click script to the main.js file. This script will
load the component and append it to the `#request--slideout-nav` element.

```
$('.slideout-navicon').on("click", function() {
  $('#request--slideout-nav').load('assets/themes/hive-starter/site-components/slideout-nav/slideout-nav.php');
})
```

* Add the `.scss` file as an import to the `/sass/style.scss` file at the bottom
under the comment `// Site Components`

* Place the following code in the header.php file above the `div.site`. It must
go above the `.site` element to make sure it can still be clicked on when the
navigation pane is out. The jQuery click script is looking for an element with
the class `.slideout-navicon`

```
<div id="request--slideout-nav"></div>
<i class="fa fa-navicon slideout-navicon"></i>
```

# How to customize

* The component is built as a skeleton. Put whatever content you need to inside
the `.hive--slideout-nav__inner` element.

* Any CSS pertaining to this element should be kept within this folder. This
is so you, and whoever handles this code after you knows where to find the CSS.

Do whatever you want to the .scss file.
