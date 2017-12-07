<?php
/**
 * People module class
 *
 * @package Hogan
 */

declare( strict_types=1 );

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( '\\Dekode\\Hogan\\People' ) && class_exists( '\\Dekode\\Hogan\\Module' ) ) {

	/**
	 * People module class.
	 *
	 * @extends Modules base class.
	 */
	class People extends Module {

		/**
		 * Items in template.
		 *
		 * @var $items
		 */
		public $items;

		/**
		 * Module constructor.
		 */
		public function __construct() {

			$this->label    = __( 'People', 'hogan-people' );
			$this->template = __DIR__ . '/assets/template.php';

			parent::__construct();
		}

		/**
		 * Field definitions for module.
		 *
		 * @return array $fields Fields for this module
		 */
		public function get_fields() : array {

			return [
				[
					'key'          => $this->field_key . '_items',
					'name'         => 'items',
					'type'         => 'repeater',
					'min'          => 1,
					'max'          => 0,
					'layout'       => 'block',
					'button_label' => __( 'Add person', 'hogan-people' ),
					'sub_fields'   => [
						[
							'key'           => $this->field_key . '_items_image',
							'label'         => __( 'Image', 'hogan-people' ),
							'name'          => 'image',
							'type'          => 'image',
							'required'      => 1,
							'wrapper'       => array(
								'width' => '30',
								'class' => '',
								'id'    => '',
							),
							'return_format' => 'array',
							'preview_size'  => 'thumbnail',
							'library'       => 'all',
						],
						[
							'key'      => $this->field_key . '_items_name',
							'label'    => __( 'Name', 'hogan-people' ),
							'name'     => 'name',
							'type'     => 'text',
							'required' => 1,
							'wrapper'  => array(
								'width' => '35',
								'class' => '',
								'id'    => '',
							),
						],
						[
							'key'     => $this->field_key . '_items_position',
							'label'   => __( 'Position', 'hogan-people' ),
							'name'    => 'position',
							'type'    => 'text',
							'wrapper' => array(
								'width' => '35',
								'class' => '',
								'id'    => '',
							),
						],
						[
							'key'          => $this->field_key . '_items_description',
							'label'        => __( 'Description', 'hogan-people' ),
							'name'         => 'description',
							'type'         => 'wysiwyg',
							'tabs'         => apply_filters( 'hogan/module/people/content/tabs', 'all' ),
							'media_upload' => false,
							'toolbar'      => apply_filters( 'hogan/module/people/content/toolbar', 'hogan' ),
							'delay'        => 1,
						],
					],
				],
			];
		}

		/**
		 * Map raw fields from acf to object variable.
		 *
		 * @param array $raw_content Content values.
		 * @param int $counter Module location in page layout.
		 *
		 * @return void
		 */
		public function load_args_from_layout_content( array $raw_content, int $counter = 0 ) {

			$this->items = $raw_content['items'];

			parent::load_args_from_layout_content( $raw_content, $counter );
		}

		/**
		 * Validate module content before template is loaded.
		 *
		 * @return bool Whether validation of the module is successful / filled with content.
		 */
		public function validate_args() : bool {
			return ! empty( $this->items );
		}
	}
}
