<?php
/**
 * User: vagenas
 * Date: 9/15/14
 * Time: 11:32 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/15/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer\menu_pages\panels {

	use randomizer\framework;
	use wsc_v000000_dev\menu_pages\panels\panel;

	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	/**
	 *
	 * @package randomizer\menu_pages\panels
	 * @author pan.vagenas <pan.vagenas@gmail.com>
	 */
	class random_set extends panel {
		/**
		 * @var string Heading/title for this panel.
		 * @extenders Should be overridden by class extenders.
		 */
		public $heading_title = 'Random Set';

		/**
		 * @var string Content/body for this panel.
		 * @extenders Should be overridden by class extenders.
		 */
		public $content_body = '';

		/**
		 * @var string Additional documentation for this panel.
		 * @extenders Can be overridden by class extenders.
		 */
		public $documentation = '';

		/**
		 * @var string Field name prefix to use in field markups
		 */
		protected $fieldNamePrefix;

		protected $setIdx;

		/**
		 * @var array Set options
		 */
		protected $setOptions = array();

		/**
		 * @var array Default options
		 */
		protected $defaultOptions = array();

		public function __construct( $instance, $menu_page, $setId, $options ) {
			parent::__construct( $instance, $menu_page );

			/**
			 * Modify slug in order to display multiple sets
			 */
			$this->slug .= '-' . $setId;

			$this->setIdx         = $setId;
			$this->setOptions     = $options;
			$this->defaultOptions = $this->©options->get( 'sets', true );
			$this->heading_title .= ' <strong>' . $this->getOption( 'name' ) . '</strong>';
			/**
			 * Prefix in order to assemble sets array
			 */
			$this->fieldNamePrefix = $this->menu_page->option_form_fields->name_prefix . '[' . $setId . ']';

			/**
			 * Add the content
			 */
			$this->content_body .= $this->header();
			$this->content_body .= $this->main();
			$this->content_body .= $this->footer();
		}

		protected function header() {
//			return $this->©views->view( 'random_set_header.php', array(
//				'setIdx'          => $this->setIdx,
//				'fieldNamePrefix' => $this->fieldNamePrefix,
//				'menu_page'       => $this->menu_page,
//				'options'         => array_merge( $this->defaultOptions, $this->setOptions )
//			) );
			// Name
			$name           = $this->getOption( 'name' );
			$nameFieldProps = array(
				'required'    => true,
				'type'        => 'text',
				'name'        => '[name]',
				'title'       => $this->__( 'Name' ),
				'placeholder' => $this->__( 'Enter the name of the set' ),
				'name_prefix' => $this->fieldNamePrefix,
				'classes'     => 'form-control',
				'id'          => 'name-' . $this->setIdx
			);
			$out = '<div class="form-horizontal">';
			$out .= '<p class="bg-info text-center row">' . $this->__( 'Set Options' ) . '</p>
			        <div class="form-group row">
			            <label class="control-label col-sm-3" for="name-' . $this->setIdx . '">' . $this->__( 'Name' ) . '</label>
			            <div class="col-sm-9">'
			                . $this->menu_page->option_form_fields->markup( $this->menu_page->option_form_fields->value( $name ), $nameFieldProps ) . '
			            </div>
		            </div>';

			// Randomize policy
			$randomPolicy     = $this->getOption( 'randomPolicy' );
			$policyFieldProps = array(
				'required'    => true,
				'type'        => 'select',
				'name'        => '[randomPolicy]',
				'title'       => $this->__( 'Randomize policy' ),
				'placeholder' => $this->__( 'Choose how the items will be displayed' ),
				'name_prefix' => $this->fieldNamePrefix,
				'classes'       => 'form-control',
				'id'          => 'randomPolicy-' . $this->setIdx,
				'options'     => array(
					array(
						'label' => $this->__( 'Random' ),
						'value' => 'random'
					),
					array(
						'label' => $this->__( 'Cyclic' ),
						'value' => 'cyclic'
					),
				)
			);

			$out .= '<div class="form-group">
						<label class="control-label col-sm-3" for="randomPolicy-' . $this->setIdx . '">' . $this->__( 'Randomize policy' ) . '</label>
	                    <div class="col-sm-9">'
			                . $this->menu_page->option_form_fields->markup( $this->menu_page->option_form_fields->value( $randomPolicy ), $policyFieldProps )
			        . '</div>
			        </div>';


			// Element to display
			$numOfElmsToDspl = $this->getOption( 'numOfElmsToDspl' );
			$numOfElmsFieldOpts = array(
				'required'    => true,
				'type'        => 'number',
				'name'        => '[numOfElmsToDspl]',
				'title'       => $this->__( 'Choose the number of elements you want to display (this should <= of total elements and bigger that zero' ),
				'placeholder' => $this->__( 'Number of elements to display' ),
				'name_prefix' => $this->fieldNamePrefix,
				'classes'       => 'form-control',
				'id'          => 'numOfElmsToDspl-' . $this->setIdx,
				'attrs'       => ' min="1" '
			);

			$out .= '<div class="form-group">
						<label class="control-label col-sm-3" for="numOfElmsToDspl-' . $this->setIdx . '">' . $this->__( 'Number of elements to display' ) . '</label>
			            <div class="col-sm-9">'
			                . $this->menu_page->option_form_fields->markup( $this->menu_page->option_form_fields->value( $numOfElmsToDspl ), $numOfElmsFieldOpts)
			            .'</div>
			       </div>
		       </div>';

			return $out;
		}

		protected function main() {
			// Elements
			$out = '<p class="bg-info text-center row">' . $this->__( 'Elements' ) . '</p>';
			$out .= '<div class="form-horizontal">';
			foreach ( $this->getOption( 'elements' ) as $k => $v ) {
				$out .= $this->element( $k, $v );
			}

			if ( ! count( $this->getOption( 'elements' ) ) ) {
				$out .= $this->element( 0, '' );
			}
			$out .= '</div>';
			return $out;
		}

		protected function footer() {
			// Set related actions
			$out = '<p class="bg-info text-center row">' . $this->__( 'Actions' ) . '</p>
			       <div class="text-right row-fluid">
				       <button type="button" class="btn btn-danger col-sm-3 col-sm-offset-5">' . $this->__( 'Delete Set' ) . '</button>
				       <button type="button" class="btn btn-success col-sm-3 col-sm-offset-1">' . $this->__( 'Add New Set' ) . '</button>
			       </div>';

			return $out;
		}

		protected function element( $index, $content ) {
			$elementFieldProps = array(
				'required'    => true,
				'type'        => 'textarea',
				'name'        => '[elements][' . $index . ']',
				'title'       => $this->__( 'Add some text or HTML markup to this element' ),
				'placeholder' => $this->__( 'Add some text or HTML markup to this element' ),
				'name_prefix' => $this->fieldNamePrefix,
				'classes'     => 'text-area form-control',
				'id'          => 'elements-' . $index,
			);

			$out = '<div id="element-row-' . $this->slug . '-' . $index . '" class="form-group" data-index="' . $index . '">';
			$out .= '<div class="col-sm-11 text-area-wrapper">';
			$out .= $this->menu_page->option_form_fields->markup( $this->menu_page->option_form_fields->value( $content ),$elementFieldProps);
			$out .= '</div>';
			$out .= '<div class="col-sm-1 element-control">';
			if ( $index != 0) {
				$out .= '<button type="button" data-setid="' . $this->setIdx .  '" data-set="' . $this->slug . '" data-index="' . $index . '" style="font-weight: bold; width: 35px; margin-bottom:5px;" class="btn btn-danger col-sm-12 element-delete" title="Delete element">-</button>';
			}
			$out .= '<button data-setid="' . $this->setIdx .  '"  data-set="' . $this->slug . '" data-index="' . $index . '"  style="font-weight: bold; width: 35px;" type="button" class="btn btn-success col-sm-12 element-add" title="Add new element">+</button>';
			$out .= '</div>';
			$out .= '</div>';

			return $out;
		}

		protected function getOption( $optionName ) {
			if ( isset( $this->setOptions[ $optionName ] ) ) {
				return $this->setOptions[ $optionName ];
			}

			return $this->defaultOptions[ $optionName ];
		}
	}
}