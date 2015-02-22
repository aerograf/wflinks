<?php
/**
 * $Id: search.inc.php 9692 2012-06-23 18:19:45Z beckmi $
 * Module: WF-Links
 * Version: v1.0.3
 * Release Date: 21 June 2005
 * Developer: John N
 * Team: WF-Projects
 * Licence: GNU
 */

function checkSearchgroups( $cid = 0, $permType = 'WFLinkCatPerm', $redirect = false ) {
    $mydirname = basename( dirname( __FILE__ ) );
    global $xoopsUser;

    $groups = is_object( $xoopsUser ) ? $xoopsUser -> getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler = &xoops_gethandler( 'groupperm' );

    $module_handler = &xoops_gethandler( 'module' );
    $module = &$module_handler -> getByDirname( $mydirname );

    if ( !$gperm_handler -> checkRight( $permType, $cid, $groups, $module -> getVar( 'mid' ) ) ) {
        if ( $redirect == false ) {
            return false;
        } else {
            redirect_header( 'index.php', 3, _NOPERM );
            exit();
        } 
    } 
    unset( $module );
    return true;
} 

function wflinks_search( $queryarray, $andor, $limit, $offset, $userid ) {
    global $xoopsDB, $xoopsUser;

    $sql = "SELECT cid, pid FROM " . $xoopsDB -> prefix( 'wflinks_cat' );
    $result = $xoopsDB -> query( $sql );
    while ( $_search_group_check = $xoopsDB -> fetchArray( $result ) )
    {
        $_search_check_array[$_search_group_check['cid']] = $_search_group_check;
    } 

    $sql = "SELECT lid, cid, title, submitter, published, description FROM " . $xoopsDB -> prefix( 'wflinks_links' );
    $sql .= " WHERE published > 0 AND published <= " . time()
     . " AND ( expired = 0 OR expired > " . time() . ") AND offline = 0 AND cid > 0";

    if ( $userid != 0 )
    {
        $sql .= " AND submitter=" . $userid . " ";
    } 

    // because count() returns 1 even if a supplied variable
    // is not an array, we must check if $querryarray is really an array
    if ( is_array( $queryarray ) && $count = count( $queryarray ) )     {
        $sql .= " AND ((title LIKE LOWER('%$queryarray[0]%') OR LOWER(description) LIKE LOWER('%$queryarray[0]%'))";
        for( $i = 1;$i < $count;$i++ ) {
            $sql .= " $andor ";
            $sql .= "(title LIKE LOWER('%$queryarray[$i]%') OR LOWER(description) LIKE LOWER('%$queryarray[$i]%'))";
        } 
        $sql .= ") ";
    } 
    $sql .= "ORDER BY title ASC";
    $result = $xoopsDB -> query( $sql, $limit, $offset );
    $ret = array();
    $i = 0;

    while ( $myrow = $xoopsDB -> fetchArray( $result ) ) {
//        if ( false == checkSearchgroups( $myrow['cid'] ) ) {
//            continue;
//        } 
        $ret[$i]['image'] = "images/size2.gif";
        $ret[$i]['link'] = "singlelink.php?cid=" . $myrow['cid'] . "&amp;lid=" . $myrow['lid'];
        $ret[$i]['title'] = $myrow['title'];
        $ret[$i]['time'] = $myrow['published'];
        $ret[$i]['uid'] = $myrow['submitter'];
        $i++;
    } 
    unset( $_search_check_array );
    return $ret;
} 

?>
