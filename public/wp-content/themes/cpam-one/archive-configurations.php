<?php
/**
* @name archive-configurations.php
* @author Vaelia
* @version 1.0.0
* @abstract List all configurations in a table
*/
get_header();

$args = array(
    'post_type'=> 'configurations',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
);

$wp_query = new WP_Query( $args );?>
<section>
    <header>
        <h1>Configurations</h1>
    </header>
    <!-- Début de tableau HTML -->
    <table class="table table-stripped table-condensed table-responsive">
        <!-- En-tête de tableau -->
        <thead>
            <tr>
                <th>
                    Libellé
                </th>
                <th>
                    Année
                </th>
                <th>
                    RAM
                </th>
            </tr>
        </thead>

        <tbody>
            <?php while ( $wp_query->have_posts() ) :
                $wp_query->the_post(); ?>
                <tr>
                    <td class="configuration-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </td>
                    <td>
                        <?php 
                        $annees = wp_get_post_terms(
                            $post->ID,
                            "annees",
                            array("fields" => "names")
                        );
                        echo(implode("", $annees)) ?>
                    </td>
                    <td>
                        <?php 
                        $ram = wp_get_post_terms(
                            $post->ID,
                            "ram",
                            array("fields" => "names")
                        );
                        echo(implode("", $ram)) ?>
                    </td>
                </tr>
            <?php endwhile;
            wp_reset_query();?>
        </tbody>
    </table>
</section>