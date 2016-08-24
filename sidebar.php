<?php
/**
 * Created by PhpStorm.
 * User: alejandro.seisdedos
 * Date: 24/08/2016
 * Time: 14:42
 */

if ( is_active_sidebar( 'main-sidebar' )  ) { ?>

    <aside>
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    </aside>

<?php } ?>