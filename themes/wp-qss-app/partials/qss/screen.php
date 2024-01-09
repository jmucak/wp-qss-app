<?php
extract( $args );
/**
 *
 * @var array $qss_user
 *
 */
?>
<div>
	<?php if ( ! empty( $qss_user['first_name'] ) && ! empty( $qss_user['last_name'] ) ) {
		echo sprintf( '%s %s', $qss_user['first_name'], $qss_user['last_name'] );
	} ?>

    Email: <?php echo ! empty( $qss_user['email'] ) ? esc_html( $qss_user['email'] ) : ''; ?>
    User ID: <?php echo esc_html( $qss_user['id'] ); ?>
    Email confirmed: <?php echo ! empty( $qss_user['email_confirmed'] ); ?>
</div>