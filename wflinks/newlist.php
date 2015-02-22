<?php
/**
 * $Id: newlist.php 9692 2012-06-23 18:19:45Z beckmi $
 * Module: WF-links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

include 'header.php';

$xoopsOption['template_main'] = 'wflinks_newlistindex.html';
include XOOPS_ROOT_PATH . '/header.php';

global $xoopsDB, $xoopsModule, $xoopsModuleConfig;

$catarray['imageheader'] = wfl_imageheader();
//$catarray['letters'] = wfl_letters();
//$catarray['toolbar'] = wfl_toolbar();
$xoopsTpl -> assign( 'catarray', $catarray );

if (isset($_GET['newlinkshowdays'])) {
	$newlinkshowdays = intval($_GET['newlinkshowdays']) ? intval($_GET['newlinkshowdays']) : 7;
	if ($newlinkshowdays != 7) {
          if ($newlinkshowdays != 14) {
            if ($newlinkshowdays != 30) {
              redirect_header( 'newlist.php?newlinkshowdays=7', 5, _MD_WFL_STOPIT . '<br /><img src="' . XOOPS_URL . '/modules/' . $xoopsModule -> getvar( 'dirname' ) . '/images/icon/security.png" />' );
              exit();
            }
          }
        }
	$time_cur = time();
	$duration = ( $time_cur - ( 86400 * 30 ) );
	$duration_week = ( $time_cur - ( 86400 * 7 ) );
	$allmonthlinks = 0;
	$allweeklinks = 0;
	$result = $xoopsDB -> query( "SELECT lid, cid, published, updated FROM " . $xoopsDB -> prefix( 'wflinks_links' ) . " WHERE (published >= " . $duration . " AND published <= " . $time_cur . ") OR updated >= " . $duration . " AND (expired = 0 OR expired > " . $time_cur . ") AND offline = 0" );
	while ( $myrow = $xoopsDB -> fetcharray( $result ) ) {
	    $published = ( $myrow['updated'] > 0 ) ? $myrow['updated'] : $myrow['published'];
	    $allmonthlinks++;
	    if ( $published > $duration_week ) {
	        $allweeklinks++;
	    }
	}
	$xoopsTpl -> assign( 'allweeklinks', $allweeklinks );
	$xoopsTpl -> assign( 'allmonthlinks', $allmonthlinks );

// List Last VARIABLE Days of links
	$newlinkshowdays = (!isset($_GET['newlinkshowdays'])) ? 7 : $_GET['newlinkshowdays'];
	$xoopsTpl -> assign( 'newlinkshowdays', intval($newlinkshowdays) );

	$dailylinks = array();
	for( $i = 0; $i < $newlinkshowdays; $i++ ) {
	    $key = $newlinkshowdays - $i - 1;
	    $time = $time_cur - ( 86400 * $key );
	    $dailylinks[$key]['newlinkdayRaw'] = $time;
	    $dailylinks[$key]['newlinkView'] = formatTimestamp( $time, $xoopsModuleConfig['dateformat'] );
	    $dailylinks[$key]['totallinks'] = 0;
	} 
}

$duration = ( $time_cur - ( 86400 * ( intval($newlinkshowdays) - 1 ) ) );
$result = $xoopsDB -> query( "SELECT lid, cid, published, updated FROM " . $xoopsDB -> prefix( 'wflinks_links' ) . " WHERE (published > " . $duration . " AND published <= " . $time_cur . ") OR (updated >= " . $duration . " AND updated <= " . $time_cur . ") AND (expired = 0 OR expired > " . $time_cur . ") AND offline = 0" );
while ( $myrow = $xoopsDB -> fetcharray( $result ) ) {
    $published = ( $myrow['updated'] > 0 ) ? $myrow['updated'] : $myrow['published'];
    $d = date( "j", $published );
    $m = date( "m", $published );
    $y = date( "Y", $published );
    $key = intval( ( $time_cur - mktime ( 0, 0, 0, $m, $d, $y ) ) / 86400 );
    $dailylinks[$key]['totallinks']++;
}
ksort( $dailylinks );
reset( $dailylinks );
$xoopsTpl -> assign( 'dailylinks', $dailylinks );
unset( $dailylinks );

$mytree = new XoopsTree( $xoopsDB -> prefix( 'wflinks_cat' ), 'cid', 'pid' );
$sql = "SELECT * FROM " . $xoopsDB -> prefix( 'wflinks_links' );
$sql .="WHERE   (published > 0 AND published <= " . $time_cur . ")
                OR
		(updated > 0 AND updated <= " . $time_cur . ")
		AND
		(expired = 0 OR expired > " . $time_cur . ")
		AND
		offline = 0
		ORDER BY " . $xoopsModuleConfig['linkxorder'];
$result = $xoopsDB -> query( $sql, 10 , 0 );
while ( $link_arr = $xoopsDB -> fetchArray( $result ) ) {
    include XOOPS_ROOT_PATH . '/modules/' . $xoopsModule -> getVar( 'dirname' ) . '/include/linkloadinfo.php';
} 

// Screenshots display
if ( $xoopsModuleConfig['screenshot'] ) {
    $xoopsTpl -> assign( 'shots_dir', $xoopsModuleConfig['screenshots'] );
    $xoopsTpl -> assign( 'shotwidth', $xoopsModuleConfig['shotwidth'] );
    $xoopsTpl -> assign( 'shotheight', $xoopsModuleConfig['shotheight'] );
    $xoopsTpl -> assign( 'show_screenshot', true );
}
$xoopsTpl -> assign( 'module_dir', $xoopsModule -> getVar( 'dirname' ) );
include XOOPS_ROOT_PATH . '/footer.php';

?>