<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once(PATH_THEMES . DS . 'system' . DS . 'responsive.php');
global $mainframe;
$Device = $mainframe->get( 'device' );
switch ( $Device )
{
	case 'mobile':
		require_once dirname( __FILE__ ) . DS . 'index_desktop.php';
		break;
	case 'tablet':
		require_once dirname( __FILE__ ) . DS . 'index_desktop.php';
		break;
	default:
		require_once dirname( __FILE__ ) . DS . 'index_desktop.php';
		break;
}