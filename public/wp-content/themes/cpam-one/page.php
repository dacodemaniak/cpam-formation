<?php
get_header();
while(have_posts()): the_post();
?>
    <h1><?php the_title();?></h1>

    <div class="container">
        <?php the_content();?>
    </div>
<?php
endwhile;
get_footer();