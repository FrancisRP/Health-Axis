<div id="primary" class="content-area">
    <main id="main" class="site-main blog-post">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-9">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						?>
                        <div class="blog-pagination">
							<?php

							previous_post_link( '%link', '< Previous' ); ?> | <?php next_post_link( '%link', 'Next >' );

							?>
                        </div>
					<?php

					endwhile; // End of the loop.
					?>
                </div><!-- .col-xs-12 col-sm-8 -->
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="blog-sidebar">
						<?php get_sidebar(); ?>
                    </div><!-- .blog-sidebar -->
                </div><!-- .col-xs-12 col-sm-4 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </main><!-- #main -->
</div><!-- #primary -->
