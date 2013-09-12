<?php

/**
 *  Cleaner Class
 * 	Author Pouya Darabi
 *	Contact  : Pouyyadrabi@gmail.com
 */
class Cleaner {
	public static function CleanXssString($str) {
		$str = strip_tags ( $str );
		$str = htmlentities ( $str, ENT_QUOTES, 'utf-8' );
		return $str;
	}
	public static function CleanUrlChar($page) {
		$filter = array (
				'0',
				'1',
				'2',
				'3',
				'4',
				'5',
				'6',
				'7',
				'8',
				'9',
				'/',
				'.',
				'%',
				'\\',
				'../',
				"http://",
				"php" 
		);
		
		return str_replace ( $filter, '', $page );
	}
	public static function CleanUploadsChar($file) {
		$windowsReserved = array (
				'CON',
				'PRN',
				'AUX',
				'NUL',
				'COM1',
				'COM2',
				'COM3',
				'COM4',
				'COM5',
				'COM6',
				'COM7',
				'COM8',
				'COM9',
				'LPT1',
				'LPT2',
				'LPT3',
				'LPT4',
				'LPT5',
				'LPT6',
				'LPT7',
				'LPT8',
				'LPT9' 
		);
		$badWinChars = array_merge ( array_map ( 'chr', range ( 0, 31 ) ), array (
				"<",
				">",
				":",
				'"',
				"/",
				"\\",
				"|",
				"?",
				"*" 
		) );
		
		$file = str_replace ( $badWinChars, '', $file );
		$file = str_replace ( $windowsReserved, '', $file );
		
		return $file;
	}
	public static function CleanFilterInteger($id) {
		if (trim( $id ) != '' && is_numeric ( $id )) {
			return $id;
		} else {
			return false;
		}
	}
	public static function HtmlDecode($str) {
		return html_entity_decode ( $str );
	}
	public static function CheckInput($Name) {
		if (isset ( $_REQUEST [$Name] ) && trim ( $_REQUEST [$Name] ) != '') {
			return true;
		} else
			return false;
	}
	public static function CleanArrayFilterInteger($ids) {
		if (count ( $ids ) < 1) {
			return false;
		}
		$flag = true;
		foreach ( $ids as $id ) {
			
			if (self::CleanFilterInteger ( $id ) === false) {
				$flag = false;
			}
		}
		return $flag;
	}
	public static function CleanDownloadChar($file) {
		$badWinChars = array_merge ( array_map ( 'chr', range ( 0, 31 ) ), array (
				"<",
				">",
				":",
				'"',
				"/",
				"\\",
				"|",
				"?",
				"*" 
		) );
		
		$file = str_replace ( $badWinChars, '', $file );
		return $file;
	}
}
