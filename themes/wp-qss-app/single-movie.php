<?php
get_header();


$movie      = get_post();
$title_meta = get_post_meta( $movie->ID, '_movie_title', true );

?>

    <main>
        <header>
            <h1><?php echo ! empty( $title_meta ) ? esc_html( $title_meta ) : esc_html( $movie->post_title ); ?></h1>
        </header>

        <section>
			<?php the_content(); ?>
        </section>
    </main>

<?php

get_footer();