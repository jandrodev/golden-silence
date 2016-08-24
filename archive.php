<?php
/**
 * Created by PhpStorm.
 * User: alejandro.seisdedos
 * Date: 09/06/2015
 * Time: 11:18
 */

get_header(); ?>

    <?php if ( is_category() ) { ?>
        <h1>Archive</h1>
        <p>Categoría: <?php single_cat_title(); ?></p>

    <?php } else if ( is_tag() ) { ?>
        <h1>Archive</h1>
        <p>Tag: <?php single_tag_title(); ?></p>

    <?php } else if ( is_author() ) {
        global $post;
        $author_id = $post->post_author; ?>
        <h1>Archive</h1>
        <p>Autor: <?php the_author_meta('display_name', $author_id); ?></p>

    <?php } else if ( is_day() ) { ?>
        <h1>Archive</h1>
        <p>Día: <?php the_time('j/m/Y'); ?></p>

    <?php } else if ( is_month() ) { ?>
        <h1>Archive</h1>
        <p>Mes: <?php the_time('F - Y'); ?></p>

    <?php } else if ( is_year() ) { ?>
        <h1>Archive</h1>
        <p>Año: <?php the_time('Y'); ?></p>

    <?php }


    if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <article id="<?php the_ID(); ?>">

            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

            <?php the_excerpt(); ?>

            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More...</a>

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