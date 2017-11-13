<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'grandcarrental' ),
				'background-image'      => esc_attr__( 'Background Image', 'grandcarrental' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'grandcarrental' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'grandcarrental' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'grandcarrental' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'grandcarrental' ),
				'inherit'               => esc_attr__( 'Inherit', 'grandcarrental' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'grandcarrental' ),
				'cover'                 => esc_attr__( 'Cover', 'grandcarrental' ),
				'contain'               => esc_attr__( 'Contain', 'grandcarrental' ),
				'background-size'       => esc_attr__( 'Background Size', 'grandcarrental' ),
				'fixed'                 => esc_attr__( 'Fixed', 'grandcarrental' ),
				'scroll'                => esc_attr__( 'Scroll', 'grandcarrental' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'grandcarrental' ),
				'left-top'              => esc_attr__( 'Left Top', 'grandcarrental' ),
				'left-center'           => esc_attr__( 'Left Center', 'grandcarrental' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'grandcarrental' ),
				'right-top'             => esc_attr__( 'Right Top', 'grandcarrental' ),
				'right-center'          => esc_attr__( 'Right Center', 'grandcarrental' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'grandcarrental' ),
				'center-top'            => esc_attr__( 'Center Top', 'grandcarrental' ),
				'center-center'         => esc_attr__( 'Center Center', 'grandcarrental' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'grandcarrental' ),
				'background-position'   => esc_attr__( 'Background Position', 'grandcarrental' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'grandcarrental' ),
				'on'                    => esc_attr__( 'ON', 'grandcarrental' ),
				'off'                   => esc_attr__( 'OFF', 'grandcarrental' ),
				'all'                   => esc_attr__( 'All', 'grandcarrental' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'grandcarrental' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'grandcarrental' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'grandcarrental' ),
				'greek'                 => esc_attr__( 'Greek', 'grandcarrental' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'grandcarrental' ),
				'khmer'                 => esc_attr__( 'Khmer', 'grandcarrental' ),
				'latin'                 => esc_attr__( 'Latin', 'grandcarrental' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'grandcarrental' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'grandcarrental' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'grandcarrental' ),
				'arabic'                => esc_attr__( 'Arabic', 'grandcarrental' ),
				'bengali'               => esc_attr__( 'Bengali', 'grandcarrental' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'grandcarrental' ),
				'tamil'                 => esc_attr__( 'Tamil', 'grandcarrental' ),
				'telugu'                => esc_attr__( 'Telugu', 'grandcarrental' ),
				'thai'                  => esc_attr__( 'Thai', 'grandcarrental' ),
				'serif'                 => _x( 'Serif', 'font style', 'grandcarrental' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'grandcarrental' ),
				'monospace'             => _x( 'Monospace', 'font style', 'grandcarrental' ),
				'font-family'           => esc_attr__( 'Font Family', 'grandcarrental' ),
				'font-size'             => esc_attr__( 'Font Size', 'grandcarrental' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'grandcarrental' ),
				'line-height'           => esc_attr__( 'Line Height', 'grandcarrental' ),
				'font-style'            => esc_attr__( 'Font Style', 'grandcarrental' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'grandcarrental' ),
				'top'                   => esc_attr__( 'Top', 'grandcarrental' ),
				'bottom'                => esc_attr__( 'Bottom', 'grandcarrental' ),
				'left'                  => esc_attr__( 'Left', 'grandcarrental' ),
				'right'                 => esc_attr__( 'Right', 'grandcarrental' ),
				'center'                => esc_attr__( 'Center', 'grandcarrental' ),
				'justify'               => esc_attr__( 'Justify', 'grandcarrental' ),
				'color'                 => esc_attr__( 'Color', 'grandcarrental' ),
				'add-image'             => esc_attr__( 'Add Image', 'grandcarrental' ),
				'change-image'          => esc_attr__( 'Change Image', 'grandcarrental' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'grandcarrental' ),
				'add-file'              => esc_attr__( 'Add File', 'grandcarrental' ),
				'change-file'           => esc_attr__( 'Change File', 'grandcarrental' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'grandcarrental' ),
				'remove'                => esc_attr__( 'Remove', 'grandcarrental' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'grandcarrental' ),
				'variant'               => esc_attr__( 'Variant', 'grandcarrental' ),
				'subsets'               => esc_attr__( 'Subset', 'grandcarrental' ),
				'size'                  => esc_attr__( 'Size', 'grandcarrental' ),
				'height'                => esc_attr__( 'Height', 'grandcarrental' ),
				'spacing'               => esc_attr__( 'Spacing', 'grandcarrental' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'grandcarrental' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'grandcarrental' ),
				'light'                 => esc_attr__( 'Light 200', 'grandcarrental' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'grandcarrental' ),
				'book'                  => esc_attr__( 'Book 300', 'grandcarrental' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'grandcarrental' ),
				'regular'               => esc_attr__( 'Normal 400', 'grandcarrental' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'grandcarrental' ),
				'medium'                => esc_attr__( 'Medium 500', 'grandcarrental' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'grandcarrental' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'grandcarrental' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'grandcarrental' ),
				'bold'                  => esc_attr__( 'Bold 700', 'grandcarrental' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'grandcarrental' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'grandcarrental' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'grandcarrental' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'grandcarrental' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'grandcarrental' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'grandcarrental' ),
				'add-new'           	=> esc_attr__( 'Add new', 'grandcarrental' ),
				'row'           		=> esc_attr__( 'row', 'grandcarrental' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'grandcarrental' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'grandcarrental' ),
				'back'                  => esc_attr__( 'Back', 'grandcarrental' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'grandcarrental' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'grandcarrental' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'grandcarrental' ),
				'none'                  => esc_attr__( 'None', 'grandcarrental' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'grandcarrental' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'grandcarrental' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'grandcarrental' ),
				'initial'               => esc_attr__( 'Initial', 'grandcarrental' ),
				'select-page'           => esc_attr__( 'Select a Page', 'grandcarrental' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'grandcarrental' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'grandcarrental' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'grandcarrental' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'grandcarrental' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
