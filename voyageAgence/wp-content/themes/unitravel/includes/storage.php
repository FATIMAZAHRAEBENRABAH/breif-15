<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('unitravel_storage_get')) {
	function unitravel_storage_get($var_name, $default='') {
		global $UNITRAVEL_STORAGE;
		return isset($UNITRAVEL_STORAGE[$var_name]) ? $UNITRAVEL_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('unitravel_storage_set')) {
	function unitravel_storage_set($var_name, $value) {
		global $UNITRAVEL_STORAGE;
		$UNITRAVEL_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('unitravel_storage_empty')) {
	function unitravel_storage_empty($var_name, $key='', $key2='') {
		global $UNITRAVEL_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($UNITRAVEL_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($UNITRAVEL_STORAGE[$var_name][$key]);
		else
			return empty($UNITRAVEL_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('unitravel_storage_isset')) {
	function unitravel_storage_isset($var_name, $key='', $key2='') {
		global $UNITRAVEL_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($UNITRAVEL_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($UNITRAVEL_STORAGE[$var_name][$key]);
		else
			return isset($UNITRAVEL_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('unitravel_storage_inc')) {
	function unitravel_storage_inc($var_name, $value=1) {
		global $UNITRAVEL_STORAGE;
		if (empty($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = 0;
		$UNITRAVEL_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('unitravel_storage_concat')) {
	function unitravel_storage_concat($var_name, $value) {
		global $UNITRAVEL_STORAGE;
		if (empty($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = '';
		$UNITRAVEL_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('unitravel_storage_get_array')) {
	function unitravel_storage_get_array($var_name, $key, $key2='', $default='') {
		global $UNITRAVEL_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($UNITRAVEL_STORAGE[$var_name][$key]) ? $UNITRAVEL_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($UNITRAVEL_STORAGE[$var_name][$key][$key2]) ? $UNITRAVEL_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('unitravel_storage_set_array')) {
	function unitravel_storage_set_array($var_name, $key, $value) {
		global $UNITRAVEL_STORAGE;
		if (!isset($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = array();
		if ($key==='')
			$UNITRAVEL_STORAGE[$var_name][] = $value;
		else
			$UNITRAVEL_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('unitravel_storage_set_array2')) {
	function unitravel_storage_set_array2($var_name, $key, $key2, $value) {
		global $UNITRAVEL_STORAGE;
		if (!isset($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = array();
		if (!isset($UNITRAVEL_STORAGE[$var_name][$key])) $UNITRAVEL_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$UNITRAVEL_STORAGE[$var_name][$key][] = $value;
		else
			$UNITRAVEL_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('unitravel_storage_merge_array')) {
	function unitravel_storage_merge_array($var_name, $key, $value) {
		global $UNITRAVEL_STORAGE;
		if (!isset($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = array();
		if ($key==='')
			$UNITRAVEL_STORAGE[$var_name] = array_merge($UNITRAVEL_STORAGE[$var_name], $value);
		else
			$UNITRAVEL_STORAGE[$var_name][$key] = array_merge($UNITRAVEL_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('unitravel_storage_set_array_after')) {
	function unitravel_storage_set_array_after($var_name, $after, $key, $value='') {
		global $UNITRAVEL_STORAGE;
		if (!isset($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = array();
		if (is_array($key))
			unitravel_array_insert_after($UNITRAVEL_STORAGE[$var_name], $after, $key);
		else
			unitravel_array_insert_after($UNITRAVEL_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('unitravel_storage_set_array_before')) {
	function unitravel_storage_set_array_before($var_name, $before, $key, $value='') {
		global $UNITRAVEL_STORAGE;
		if (!isset($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = array();
		if (is_array($key))
			unitravel_array_insert_before($UNITRAVEL_STORAGE[$var_name], $before, $key);
		else
			unitravel_array_insert_before($UNITRAVEL_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('unitravel_storage_push_array')) {
	function unitravel_storage_push_array($var_name, $key, $value) {
		global $UNITRAVEL_STORAGE;
		if (!isset($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($UNITRAVEL_STORAGE[$var_name], $value);
		else {
			if (!isset($UNITRAVEL_STORAGE[$var_name][$key])) $UNITRAVEL_STORAGE[$var_name][$key] = array();
			array_push($UNITRAVEL_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('unitravel_storage_pop_array')) {
	function unitravel_storage_pop_array($var_name, $key='', $defa='') {
		global $UNITRAVEL_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($UNITRAVEL_STORAGE[$var_name]) && is_array($UNITRAVEL_STORAGE[$var_name]) && count($UNITRAVEL_STORAGE[$var_name]) > 0) 
				$rez = array_pop($UNITRAVEL_STORAGE[$var_name]);
		} else {
			if (isset($UNITRAVEL_STORAGE[$var_name][$key]) && is_array($UNITRAVEL_STORAGE[$var_name][$key]) && count($UNITRAVEL_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($UNITRAVEL_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('unitravel_storage_inc_array')) {
	function unitravel_storage_inc_array($var_name, $key, $value=1) {
		global $UNITRAVEL_STORAGE;
		if (!isset($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = array();
		if (empty($UNITRAVEL_STORAGE[$var_name][$key])) $UNITRAVEL_STORAGE[$var_name][$key] = 0;
		$UNITRAVEL_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('unitravel_storage_concat_array')) {
	function unitravel_storage_concat_array($var_name, $key, $value) {
		global $UNITRAVEL_STORAGE;
		if (!isset($UNITRAVEL_STORAGE[$var_name])) $UNITRAVEL_STORAGE[$var_name] = array();
		if (empty($UNITRAVEL_STORAGE[$var_name][$key])) $UNITRAVEL_STORAGE[$var_name][$key] = '';
		$UNITRAVEL_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('unitravel_storage_call_obj_method')) {
	function unitravel_storage_call_obj_method($var_name, $method, $param=null) {
		global $UNITRAVEL_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($UNITRAVEL_STORAGE[$var_name]) ? $UNITRAVEL_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($UNITRAVEL_STORAGE[$var_name]) ? $UNITRAVEL_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('unitravel_storage_get_obj_property')) {
	function unitravel_storage_get_obj_property($var_name, $prop, $default='') {
		global $UNITRAVEL_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($UNITRAVEL_STORAGE[$var_name]->$prop) ? $UNITRAVEL_STORAGE[$var_name]->$prop : $default;
	}
}
?>