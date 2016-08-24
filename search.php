<?php
/**
 * Created by PhpStorm.
 * User: alejandro.seisdedos
 * Date: 18/05/2016
 * Time: 12:07
 */

get_header(); ?>

    <p>Found <?php echo $wp_query->found_posts; ?> results for "<?php the_search_query(); ?>"</p>

    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

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