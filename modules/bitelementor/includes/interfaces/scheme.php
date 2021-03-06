<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

interface Scheme_Interface {
	public static function get_type();
	public static function get_system_schemes();

	public function get_title();
	public function get_disabled_title();
	public function get_scheme_titles();
	public function get_default_scheme();
}
