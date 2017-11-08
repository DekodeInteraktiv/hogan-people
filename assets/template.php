<?php
/**
 * Template for people module
 *
 * $this is an instance of the People object.
 *
 * @package Hogan
 */

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) || ! ( $this instanceof People ) ) {
	return; // Exit if accessed directly.
}

?>
<section class="<?php echo esc_attr( $this->get_wrapper_classes( true ) ); ?>">
	<ul>
		<?php foreach ( $this->items as $item ) : ?>
			<li class="columns">
				<div class="column">
					<div class="<?php echo implode( ' ', apply_filters( 'hogan/module/people/image_wrapper_classes', [] ) ); ?>">
						<?php echo wp_get_attachment_image( $item['image']['id'], apply_filters( 'hogan/module/people/image_size', 'medium' ), false, apply_filters( 'hogan/module/people/image_attr', [] ) ) ?: ''; ?>
					</div>
				</div>
				<div class="column">
					<?php
					echo '<div class="name">' . $item['name'] . '</div>';
					echo ! empty( $item['position'] ) ? '<div class="position">' . $item['position'] . '</div>' : '';

					do_action( 'hogan/module/people/before/description' );
					?>
					<div class="description"
						 aria-expanded="false"><?php echo wp_kses_post( $item['description'] ); ?></div>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
