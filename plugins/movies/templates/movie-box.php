<?php
/**
 *
 * @var array $args
 *
 */
?>
<label for="movie_title">Movie title</label>
<input type="text" name="movie_title" id="movie_title"
       value="<?php echo ! empty( $args['movie_title'] ) ? esc_attr( $args['movie_title'] ) : ''; ?>">