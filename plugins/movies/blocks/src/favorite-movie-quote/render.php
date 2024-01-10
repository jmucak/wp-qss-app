<?php
/**
 *
 * @var array $attributes
 *
 */

if ( ! empty( $attributes['quote'] ) ) { ?>
    <div>"<?php echo esc_html( $attributes['quote'] ); ?>"</div>
<?php }