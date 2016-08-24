<?php
/**
 * Created by PhpStorm.
 * User: alejandro.seisdedos
 * Date: 24/08/2016
 * Time: 13:17
 */

get_header();

    if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <article id="<?php the_ID(); ?>">

            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

            <p>Write by <?php the_author(); ?></p>

            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More...</a>

            <p><?php the_category(); ?></p>
            <p><?php comments_number( 'Sin comentarios', 'Un comentario', '% comentarios' ); ?></p>

        </article>

    <?php endwhile; ?>

        <div>
            <?php pagination(); ?>
        </div>

    <?php else : ?>

        <p>Sorry, there is no content for you.</p>

    <?php endif;

get_sidebar();

get_footer();