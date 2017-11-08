<?php
/**
 * People module class
 *
 * @package Hogan
 */

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( '\\Dekode\\Hogan\\People' ) ) {

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
		 * Number of items in template.
		 *
		 * @var $items
		 */
		public $number_of_items;

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
		 */
		public function get_fields() {

			return [
				[
					'key'               => $this->field_key . '_items',
					'name'              => 'items',
					'type'              => 'repeater',
					'min'               => 1,
					'max'               => 0,
					'layout'            => 'block',
					'button_label'      => __( 'Add person', 'hogan-people' ),
					'sub_fields'        => [
						[
							'key'               => $this->field_key . '_items_image',
							'label'             => __( 'Image', 'hogan-people' ),
							'name'              => 'image',
							'type'              => 'image',
							'required'          => 1,
							'wrapper'           => array(
								'width' => '30',
								'class' => '',
								'id'    => '',
							),
							'return_format'     => 'array',
							'preview_size'      => 'thumbnail',
							'library'           => 'all',
						],
						[
							'key'               => $this->field_key . '_items_name',
							'label'             => __( 'Name', 'hogan-people' ),
							'name'              => 'name',
							'type'              => 'text',
							'required'          => 1,
							'wrapper'           => array(
								'width' => '35',
								'class' => '',
								'id'    => '',
							),
						],
						[
							'key'               => $this->field_key . '_items_position',
							'label'             => __( 'Position', 'hogan-people' ),
							'name'              => 'position',
							'type'              => 'text',
							'wrapper'           => array(
								'width' => '35',
								'class' => '',
								'id'    => '',
							),
						],
						[
							'key'               => $this->field_key . '_items_description',
							'label'             => __( 'Description', 'hogan-people' ),
							'name'              => 'description',
							'type'              => 'wysiwyg',
							'tabs'              => apply_filters( 'hogan/module/people/content/tabs', 'all' ),
							'media_upload'      => false,
							'toolbar'           => apply_filters( 'hogan/module/people/content/toolbar', 'hogan' ),
							'delay'             => 1,
						],
					],
				],
			];
		}

		/**
		 * Map fields to object variable.
		 *
		 * @param array $content The content value.
		 */
		public function load_args_from_layout_content( $content ) {
			$this->number_of_items = count( $content['items'] );
			$this->items           = $content['items'];

			parent::load_args_from_layout_content( $content );
		}
	}
}
