<?php

get_header();

    if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <article id="<?php the_ID(); ?>">

            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>

        </article>

    <?php endwhile;  else : ?>

        <p>Sorry, there is no content for you.</p>

    <?php endif;

get_sidebar();

get_footer();
