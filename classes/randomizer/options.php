<?php
/**
 * User: vagenas
 * Date: 9/15/14
 * Time: 10:47 PM
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @copyright 9/15/14 XDaRk.eu <xdark.eu@gmail.com>
 * @link http://xdark.eu
 */

namespace randomizer {

	use wsc_v000000_dev\arrays;
	use wsc_v000000_dev\exception;

	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	/**
	 *
	 * @package randomizer
	 * @author pan.vagenas <pan.vagenas@gmail.com>
	 */
	class options extends \wsc_v000000_dev\options {

		/**
		 * Sets up default options and validators.
		 *
		 * @extenders Can be overridden by class extenders (i.e. to override the defaults/validators);
		 *    or to add additional default options and their associated validators.
		 *
		 * @param array $defaults An associative array of default options.
		 * @param array $validators An array of validators (can be a combination of numeric/associative keys).
		 *
		 * @return array The current array of options.
		 *
		 * @throws exception If invalid types are passed through arguments list.
		 * @throws exception If `count($defaults) !== count($validators)`.
		 */
		public function setup( $defaults, $validators ) {
			// TODO Set defaults
			$randomizerDefaults = array(
				'encryption.key'                             => 'jkiabOKBNJO89347KJBKJBasfd',
				'support.url'                                => 'xdark.eu/support',
				'styles.front_side.theme'                    => 'yeti',
				'crons.config'                               => array(),
				'menu_pages.theme'                           => 'yeti',
				'captchas.google.public_key'                 => '6LeCANsSAAAAAIIrlB3FrXe42mr0OSSZpT0pkpFK',
				'captchas.google.private_key'                => '6LeCANsSAAAAAGBXMIKAirv6G4PmaGa-ORxdD-oZ',
				'url_shortener.default_built_in_api'         => 'goo_gl',
				'url_shortener.custom_url_api'               => '',
				'url_shortener.api_keys.goo_gl'              => '',
				'menu_pages.panels.email_updates.action_url' => '',
				'menu_pages.panels.community_forum.feed_url' => '',
				'menu_pages.panels.news_kb.feed_url'         => '',
				'menu_pages.panels.videos.yt_playlist'       => '',
				'sets'                                       => array(
					array(
						'name'            => 'Default',
						'id'              => 'default',
						'randomPolicy'    => 'random',
						'elements'        => array(),
						'numOfElmsToDspl' => 0
					)
				),
				'custom_css'                                 => '',
				'before_element'                            => '',
				'after_element'                             => '',
				'widget'                                     => array(
					'name' => 'Randomizer',
					'set'  => 'Default'
				),
				'shortcode'                                  => array(
					'name' => 'Randomizer',
					'set'  => 'Default'
				),
			);

			$randomizerDefaultsValidators = array(
				'sets'            => array( 'array:!empty' ),
				'widget'          => array( 'array:!empty' ),
				'shortcode'       => array( 'array:!empty' ),
				'custom_css'      => array('string'),
				'before_element' => array('string'),
				'after_element'  => array('string'),
			);

			$defaults   = array_merge( $defaults, $randomizerDefaults );
			$validators = array_merge( $validators, $randomizerDefaultsValidators );

			$this->_setup( $defaults, $validators );
		}

		/**
		 * Fires when new options are saved. Then based on plugin page we use the appropriate method.
		 * Always call the parent at the end.
		 *
		 * @param array $new_options
		 */
		public function ®update( $new_options = array() ) {
			if ( $this->©menu_pages->is_plugin_page( $this->©menu_pages__random_sets->slug ) ) {
				$options = $this->validateRandomSetsOptions( $new_options );
			} elseif ( $this->©menu_pages->is_plugin_page( $this->©menu_pages__main_page->slug ) ) {
				$options = $this->validateMainSettingsOptions( $new_options );
			} else {
				$options = $new_options;
			}
			parent::®update( $options );
		}

		/**
		 * Validates Random Sets Options
		 *
		 * @param array $newOptions
		 *
		 * @return array
		 * @throws exception
		 */
		protected function validateRandomSetsOptions( $newOptions = array() ) {
			/**
			 * Unset any default set and validate others
			 */
			foreach ( $newOptions as $key => $set ) {
				if ( ! ( $this->©string->is( $set['name'] ) && $this->©string->is( $set['randomPolicy'] ) ) || $set['name'] == 'Default' ) {
					unset ( $newOptions[ $key ] );
					continue;
				}
				$allEmpty = true;
				foreach ( $set["elements"] as $k => $element ) {
					$allEmpty &= empty( $element );
					if ( empty( $element ) ) {
						unset( $newOptions[ $key ]["elements"][ $k ] );
					}
				}
				if ( $allEmpty ) {
					unset( $newOptions[ $key ] );
				} else {
					$newOptions[ $key ]['id'] = $this->©string->with_underscores( $set['name'] );
				}
			}

			array_push( $newOptions, $this->get( 'sets', true )[0] );

			return array( 'sets' => $newOptions );
		}

		/**
		 * Validates Main Options
		 *
		 * @param array $newOptions
		 *
		 * @return array
		 */
		protected function validateMainSettingsOptions( $newOptions = array() ) {
			return $newOptions;
		}
	}
}