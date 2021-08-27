<?php get_header(); ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12">
                <?php
                while (have_posts()): the_post();
                    the_content(); endwhile;
                ?>
            </div>
        </div>
    </div>
<?php get_footer();
