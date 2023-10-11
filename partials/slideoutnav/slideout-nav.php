<div class="slideout-nav" hive-type="component">
    <div class="navicon-close">
        <i class="fa fa-navicon"></i>
    </div><!-- .navicon-close -->
    <div class="slideout-nav__inner">
        <nav id="site-navigation" class="mobile-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'mobile-menu',
			) );
			?>
        </nav><!-- #site-navigation -->
    </div> <!-- .slideout-nav__inner -->
</div><!-- .hive slideout-nav -->   