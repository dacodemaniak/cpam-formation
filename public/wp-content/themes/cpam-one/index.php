<?php
/**
* @name index.php
* @author Vaelia
* @version 1.0.0
* @abstract Main file for CPAM-ONE theme
*/

// Insert Wordpress header
get_header();
?>

<!-- Loop over articles -->
<main>
    <section class="row">
        <?php
            if (have_posts()) {
                $posts = get_posts(); // Get all posts
                foreach ($posts as $post) {
                    // Convert post as datas
                    setup_postdata($post);
                ?>
                <article class="col-md-6 col-12">
                    <header>
                        <h2><?php echo the_title(); ?></h2>
                    </header>
                    <?php echo the_content(); ?>
                </article>
                <?php } // End foreach
                // else... no posts
                } else { ?>
                    <div class="alert alert-warning">
                        Désolé, aucun post à afficher
                    </div>
                <?php } // End of else ?>
    </section>
</main>

<?php
// Insert Wordpress footer
get_footer();
?>