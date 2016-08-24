<?php
/**
 * Created by PhpStorm.
 * User: alejandro.seisdedos
 * Date: 29/05/2015
 * Time: 14:34
 */

get_header();

    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article id="<?php the_ID(); ?>">

            <h1><?php the_title(); ?></h1>
            <p>Write by <?php the_author(); ?> on <time><?php the_time('j/n/Y'); ?></time></p>

            <?php the_content();

            if ( comments_open() || get_comments_number() ) {
                comments_template();
            } ?>

        </article>

    <?php endwhile;  else : ?>

    <p>Sorry, there is no content for you.</p>

    <?php endif;

get_sidebar();

get_footer();