<?php

/**
 * Module: WF-Links
 * Developer: McDonald
 * Licence: GNU
 * @param $lid
 * @return string
 */
function wflinks_sbmarks($lid)
{
    global $xoopsDB, $xoopsModule, $myts;

    $sbmark_arr          = $xoopsDB->fetchArray($xoopsDB->query('SELECT title FROM ' . $xoopsDB->prefix('wflinks_links') . ' WHERE lid=' . (int)$lid . ''));
    $sbmark_arr['title'] = htmlspecialchars($sbmark_arr['title'], ENT_QUOTES | ENT_HTML5);
    $sbmark_arr['link']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/singlelink.php?lid=' . (int)$lid;

    //Definitions for social bookmarks

    //Backflip
    $sbmarks['blackflip'] = '<a href="http://www.backflip.com/add_page_pop.ihtml?url='
                            . $sbmark_arr['link']
                            . '&title='
                            . $sbmark_arr['title']
                            . '"'
                            . ' target="_blank"><img border="0" src="'
                            . XOOPS_URL
                            . '/modules/'
                            . $xoopsModule->getVar('dirname')
                            . '/assets/images/sbookmarks/backflip.png" align="middle" title="'
                            . _MD_WFL_ADDTO
                            . 'BackFlip" alt="'
                            . _MD_WFL_ADDTO
                            . 'BackFlip"></a>';

    //Bibsonomy
    $sbmark['bibsonomy'] = '<a href="http://www.bibsonomy.org/ShowBookmarkEntry?c=b&jump=yes&url='
                           . $sbmark_arr['link']
                           . '&description='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/bibsonomy.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'Bibsonomy alt="'
                           . _MD_WFL_ADDTO
                           . 'Bibsonomy"></a>';

    //BlinkList
    $sbmarks['blinklist'] = '<a href="http://www.blinklist.com/index.php?Action=Blink/addblink.php&Quick=true&Url='
                            . $sbmark_arr['link']
                            . '&Title='
                            . $sbmark_arr['title']
                            . '&Pop=yes" target="_blank"><img border="0" src="'
                            . XOOPS_URL
                            . '/modules/'
                            . $xoopsModule->getVar('dirname')
                            . '/assets/images/sbookmarks/blinklist.png" align="middle" title="'
                            . _MD_WFL_ADDTO
                            . 'BlinkList" alt="'
                            . _MD_WFL_ADDTO
                            . 'BlinkList"></a>';

    //Blogmark
    $sbmark['blogmark'] = '<a href="http://blogmarks.net/my/new.php?title='
                          . $sbmark_arr['title']
                          . '&url='
                          . $sbmark_arr['link']
                          . '"'
                          . ' target="_blank"><img border="0" src="'
                          . XOOPS_URL
                          . '/modules/'
                          . $xoopsModule->getVar('dirname')
                          . '/assets/images/sbookmarks/blogmarks.png" align="middle" title="'
                          . _MD_WFL_ADDTO
                          . 'BlogMarks" alt="'
                          . _MD_WFL_ADDTO
                          . 'BlogMarks" ></a>';

    //CiteUlike
    $sbmark['citeulike'] = '<a href="http://www.citeulike.org/posturl?url='
                           . $sbmark_arr['link']
                           . '&title='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/citeulike.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'CiteUlike" alt="'
                           . _MD_WFL_ADDTO
                           . 'CiteUlike" ></a>';

    //Connotea
    $sbmarks['connotea'] = '<a href="http://www.connotea.org/add?continue=return&uri='
                           . $sbmark_arr['link']
                           . '&title='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/connotea.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'Connotea" alt="'
                           . _MD_WFL_ADDTO
                           . 'Connotea" ></a>';

    //del.icio.us
    $sbmarks['delicio'] = '<a href="http://del.icio.us/post?v=4&noui&jump=close&url='
                          . $sbmark_arr['link']
                          . '&title='
                          . $sbmark_arr['title']
                          . '"'
                          . ' target="_blank"><img border="0" src="'
                          . XOOPS_URL
                          . '/modules/'
                          . $xoopsModule->getVar('dirname')
                          . '/assets/images/sbookmarks/del.png" align="middle" title="'
                          . _MD_WFL_ADDTO
                          . 'del.icio.us" alt="'
                          . _MD_WFL_ADDTO
                          . 'del.icio.us" ></a>';

    //Digg
    $sbmarks['digg'] = '<a href="http://digg.com/submit?phase=2&url='
                       . $sbmark_arr['link']
                       . '&title='
                       . $sbmark_arr['title']
                       . '"'
                       . ' target="_blank"><img border="0" src="'
                       . XOOPS_URL
                       . '/modules/'
                       . $xoopsModule->getVar('dirname')
                       . '/assets/images/sbookmarks/digg.png" align="middle" title="'
                       . _MD_WFL_ADDTO
                       . 'Digg" alt="'
                       . _MD_WFL_ADDTO
                       . 'Digg"></a>';

    //Diigo
    $sbmarks['diigo'] = '<a href="http://www.diigo.com/post?url='
                        . $sbmark_arr['link']
                        . '&title='
                        . $sbmark_arr['title']
                        . '"'
                        . ' target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/diigo.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'Diigo" alt="'
                        . _MD_WFL_ADDTO
                        . 'Diigo"></a>';

    //DZone
    $sbmarks['dzone'] = '<a href="http://www.dzone.com/links/add.html?url='
                        . $sbmark_arr['link']
                        . '&title='
                        . $sbmark_arr['title']
                        . '"'
                        . ' target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/dzone.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'DZone" alt="'
                        . _MD_WFL_ADDTO
                        . 'DZone"></a>';

    //Earthlink
    $sbmarks['earthlink'] = '<a href="http://myfavorites.earthlink.net/my/add_favorite?v=1&url='
                            . $sbmark_arr['link']
                            . '&title='
                            . $sbmark_arr['title']
                            . '"'
                            . ' target="_blank"><img border="0" src="'
                            . XOOPS_URL
                            . '/modules/'
                            . $xoopsModule->getVar('dirname')
                            . '/assets/images/sbookmarks/earthlink.png" align="middle" title="'
                            . _MD_WFL_ADDTO
                            . 'EarthLink MyFavorites" alt="'
                            . _MD_WFL_ADDTO
                            . 'EarthLink MyFavorites"></a>';

    //EatMyHamster
    $sbmarks['eatmyhamster'] = '<a href="http://www.eatmyhamster.com/post?u='
                               . $sbmark_arr['link']
                               . '&h='
                               . $sbmark_arr['title']
                               . '"'
                               . ' target="_blank"><img border="0" src="'
                               . XOOPS_URL
                               . '/modules/'
                               . $xoopsModule->getVar('dirname')
                               . '/assets/images/sbookmarks/eatmyhamster.png" align="middle" title="'
                               . _MD_WFL_ADDTO
                               . 'EatMyHamster" alt="'
                               . _MD_WFL_ADDTO
                               . 'EatMyHamster"></a>';

    //FaceBook
    $sbmarks['facebook'] = '<a href="http://www.facebook.com/sharer.php?u='
                           . $sbmark_arr['link']
                           . '&title='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"> <img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/facebook.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'Facebook" alt="'
                           . _MD_WFL_ADDTO
                           . 'Facebook"></a>';

    //Fantacular
    $sbmarks['fantacular'] = '<a href="http://fantacular.com/add.asp?url='
                             . $sbmark_arr['link']
                             . '&title='
                             . $sbmark_arr['title']
                             . '"'
                             . ' target="_blank"><img border="0" src="'
                             . XOOPS_URL
                             . '/modules/'
                             . $xoopsModule->getVar('dirname')
                             . '/assets/images/sbookmarks/fantacular.png" align="middle" title="'
                             . _MD_WFL_ADDTO
                             . 'Fantacular" alt="'
                             . _MD_WFL_ADDTO
                             . 'Fantacular"></a>';

    //Fark
    $sbmarks['fark'] = '<a href="http://cgi.fark.com/cgi/fark/edit.pl?new_url='
                       . $sbmark_arr['link']
                       . '&new_comment='
                       . $sbmark_arr['title']
                       . '"'
                       . ' target="_blank"><img border="0" src="'
                       . XOOPS_URL
                       . '/modules/'
                       . $xoopsModule->getVar('dirname')
                       . '/assets/images/sbookmarks/fark.png" align="middle" title="'
                       . _MD_WFL_ADDTO
                       . 'Fark" alt="'
                       . _MD_WFL_ADDTO
                       . 'Fark"></a>';

    //FeedMarker
    $sbmarks['feedmarker'] = '<a href="http://www.feedmarker.com/admin.php?do=bookmarklet_mark&url='
                             . $sbmark_arr['link']
                             . '&title='
                             . $sbmark_arr['title']
                             . '"'
                             . ' target="_blank"><img border="0" src="'
                             . XOOPS_URL
                             . '/modules/'
                             . $xoopsModule->getVar('dirname')
                             . '/assets/images/sbookmarks/feedmarker.png" align="middle" title="'
                             . _MD_WFL_ADDTO
                             . 'FeedMarker" alt="'
                             . _MD_WFL_ADDTO
                             . 'FeedMarker"></a>';

    //FeedMeLinks
    $sbmarks['feedmelinks'] = '<a href="http://feedmelinks.com/categorize?from=toolbar&op=submit&name='
                              . $sbmark_arr['title']
                              . '&url='
                              . $sbmark_arr['link']
                              . '"'
                              . ' target="_blank"><img border="0" src="'
                              . XOOPS_URL
                              . '/modules/'
                              . $xoopsModule->getVar('dirname')
                              . '/assets/images/sbookmarks/feedmelinks.png" align="middle" title="'
                              . _MD_WFL_ADDTO
                              . 'FeedMeLinks" alt="'
                              . _MD_WFL_ADDTO
                              . 'FeedMeLinks"></a>';

    //Furl
    $sbmarks['furl'] = '<a href="http://www.furl.net/storeIt.jsp?t='
                       . $sbmark_arr['title']
                       . '&u='
                       . $sbmark_arr['link']
                       . '"'
                       . ' target="_blank"><img border="0" src="'
                       . XOOPS_URL
                       . '/modules/'
                       . $xoopsModule->getVar('dirname')
                       . '/assets/images/sbookmarks/furl.png" align="middle" title="'
                       . _MD_WFL_ADDTO
                       . 'Furl" alt="'
                       . _MD_WFL_ADDTO
                       . 'Furl"></a>';

    //Google
    $sbmarks['google'] = '<a href="http://www.google.com/bookmarks/mark?op=edit&output=popup&bkmk='
                         . $sbmark_arr['link']
                         . '&title='
                         . $sbmark_arr['title']
                         . '"'
                         . ' target="_blank"><img border="0" src="'
                         . XOOPS_URL
                         . '/modules/'
                         . $xoopsModule->getVar('dirname')
                         . '/assets/images/sbookmarks/google.png" align="middle" title="'
                         . _MD_WFL_ADDTO
                         . 'Google" alt="'
                         . _MD_WFL_ADDTO
                         . 'Google"></a>';

    //Gravee
    $sbmarks['gravee'] = '<a href="http://www.gravee.com/account/bookmarkpop?u='
                         . $sbmark_arr['link']
                         . '&t='
                         . $sbmark_arr['title']
                         . '"'
                         . ' target="_blank"><img border="0" src="'
                         . XOOPS_URL
                         . '/modules/'
                         . $xoopsModule->getVar('dirname')
                         . '/assets/images/sbookmarks/gravee.png" align="middle" title="'
                         . _MD_WFL_ADDTO
                         . 'Gravee" alt="'
                         . _MD_WFL_ADDTO
                         . 'Gravee"></a>';

    //igooi
    $sbmarks['igooi'] = '<a href="http://www.igooi.com/addnewitem.aspx?self=1&noui=yes&jump=close&url='
                        . $sbmark_arr['link']
                        . '&title='
                        . $sbmark_arr['title']
                        . '"'
                        . ' target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/igooi.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'igooi" alt="'
                        . _MD_WFL_ADDTO
                        . 'igooi"></a>';

    //iTalkNews
    $sbmarks['italknews'] = '<a href="http://italknews.com/member/write_link.php?content='
                            . $sbmark_arr['link']
                            . '&headline='
                            . $sbmark_arr['title']
                            . '"'
                            . ' target="_blank"><img border="0" src="'
                            . XOOPS_URL
                            . '/modules/'
                            . $xoopsModule->getVar('dirname')
                            . '/assets/images/sbookmarks/italknews.png" align="middle" title="'
                            . _MD_WFL_ADDTO
                            . 'iTalkNews" alt="'
                            . _MD_WFL_ADDTO
                            . 'iTalkNews"></a>';

    //Jookster
    $sbmarks['jookster'] = '<a href="http://www.jookster.com/JookThis.aspx?url='
                           . $sbmark_arr['link']
                           . '"'
                           . 'target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/jookster.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'Jookster" alt="'
                           . _MD_WFL_ADDTO
                           . 'Jookster"></a>';

    //Kinja
    $sbmarks['kinja'] = '<a href="http://kinja.com/id.knj?url='
                        . $sbmark_arr['link']
                        . '"'
                        . 'target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/kinja.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'Kinja" alt="'
                        . _MD_WFL_ADDTO
                        . 'Kinja"></a>';

    //Linkagogo
    $sbmarks['linkagogo'] = '<a href="http://www.linkagogo.com/go/AddNoPopup?title='
                            . $sbmark_arr['title']
                            . '&url='
                            . $sbmark_arr['link']
                            . '"'
                            . 'target="_blank"><img border="0" src="'
                            . XOOPS_URL
                            . '/modules/'
                            . $xoopsModule->getVar('dirname')
                            . '/assets/images/sbookmarks/linkagogo.png" align="middle" title="'
                            . _MD_WFL_ADDTO
                            . 'Linkagogo" alt="'
                            . _MD_WFL_ADDTO
                            . 'Linkagogo"></a>';

    //LinkRoll
    $sbmarks['linkroll'] = '<a href="http://linkroll.com/insert.php?url='
                           . $sbmark_arr['link']
                           . '&title='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/linkroll.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'LinkRoll" alt="'
                           . _MD_WFL_ADDTO
                           . 'LinkRoll"></a>';

    //linuxquestions.org
    $sbmarks['linuxquestions'] = '<a href="http://bookmarks.linuxquestions.org/linux/post?uri='
                                 . $sbmark_arr['link']
                                 . '&title='
                                 . $sbmark_arr['title']
                                 . '&when_done=go_back"'
                                 . 'target="_blank"><img border="0" src="'
                                 . XOOPS_URL
                                 . '/modules/'
                                 . $xoopsModule->getVar('dirname')
                                 . '/assets/images/sbookmarks/linuxquestions.png" align="middle" title="'
                                 . _MD_WFL_ADDTO
                                 . 'linuxquestions.org" alt="'
                                 . _MD_WFL_ADDTO
                                 . 'linuxquestions.org"></a>';

    //LookMarks
    $sbmarks['lookmarks'] = '<a href="http://www.lookmarks.com/AddLinkFrame.aspx?Url='
                            . $sbmark_arr['link']
                            . '&Title='
                            . $sbmark_arr['title']
                            . '"'
                            . ' target="_blank"><img border="0" src="'
                            . XOOPS_URL
                            . '/modules/'
                            . $xoopsModule->getVar('dirname')
                            . '/assets/images/sbookmarks/lookmarks.png" align="middle" title="'
                            . _MD_WFL_ADDTO
                            . 'LookMarks" alt="'
                            . _MD_WFL_ADDTO
                            . 'LookMarks"></a>';

    //Lycos
    $sbmarks['lycos'] = '<a href="http://iq.lycos.co.uk/lili/my/add?url='
                        . $sbmark_arr['link']
                        . '"'
                        . ' target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/lycos.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'Lycos" alt="'
                        . _MD_WFL_ADDTO
                        . 'Lycos"></a>';

    //Windows Live
    $sbmarks['live'] = '<a href="https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&title='
                       . $sbmark_arr['title']
                       . '&url='
                       . $sbmark_arr['link']
                       . '&top=1'
                       . '"'
                       . 'target="_blank"><img border="0" src="'
                       . XOOPS_URL
                       . '/modules/'
                       . $xoopsModule->getVar('dirname')
                       . '/assets/images/sbookmarks/windows_live.png" align="middle" title="'
                       . _MD_WFL_ADDTO
                       . 'Windows Live" alt="'
                       . _MD_WFL_ADDTO
                       . 'Windows Live"></a>';

    //Magnolia
    $sbmarks['magnolia'] = '<a href="http://ma.gnolia.com/bookmarklet/add?url='
                           . $sbmark_arr['link']
                           . '&title='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/magnolia.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'Ma.gnolia" alt="'
                           . _MD_WFL_ADDTO
                           . 'Ma.gnolia"></a>';

    //Markabboo
    $sbmarks['markabboo'] = '<a href="http://www.markaboo.com/resources/new?url='
                            . $sbmark_arr['link']
                            . '&title='
                            . $sbmark_arr['title']
                            . '"'
                            . ' target="_blank"><img border="0" src="'
                            . XOOPS_URL
                            . '/modules/'
                            . $xoopsModule->getVar('dirname')
                            . '/assets/images/sbookmarks/markabboo.png" align="middle" title="'
                            . _MD_WFL_ADDTO
                            . 'Markabboo" alt="'
                            . _MD_WFL_ADDTO
                            . 'Markabboo"></a>';

    //Netscape
    $sbmarks['netscape'] = '<a href="http://www.netscape.com/submit/?U='
                           . $sbmark_arr['link']
                           . '&T='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/netscape.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'Netscape" alt="'
                           . _MD_WFL_ADDTO
                           . 'Netscape"></a>';

    //Netvouz
    $sbmarks['netvouz'] = '<a href="http://www.netvouz.com/action/submitBookmark?url='
                          . $sbmark_arr['link']
                          . '&title='
                          . $sbmark_arr['title']
                          . '&popup=no"'
                          . ' target="_blank"><img border="0" src="'
                          . XOOPS_URL
                          . '/modules/'
                          . $xoopsModule->getVar('dirname')
                          . '/assets/images/sbookmarks/netvouz.png" align="middle" title="'
                          . _MD_WFL_ADDTO
                          . 'Netvouz" alt="'
                          . _MD_WFL_ADDTO
                          . 'Netvouz"></a>';

    //Newsvine
    $sbmarks['newsvine'] = '<a href="http://www.newsvine.com/_tools/seed&save?u='
                           . $sbmark_arr['link']
                           . '&h='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/newsvine.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'Newsvine" alt="'
                           . _MD_WFL_ADDTO
                           . 'Newsvine"></a>';

    //Ning
    $sbmarks['ning'] = '<a href="http://bookmarks.ning.com/addItem.php?url='
                       . $sbmark_arr['link']
                       . '&title='
                       . $sbmark_arr['title']
                       . '"'
                       . ' target="_blank"><img border="0" src="'
                       . XOOPS_URL
                       . '/modules/'
                       . $xoopsModule->getVar('dirname')
                       . '/assets/images/sbookmarks/ning.png" align="middle" title="'
                       . _MD_WFL_ADDTO
                       . 'Ning" alt="'
                       . _MD_WFL_ADDTO
                       . 'Ning"></a>';

    //NowPublic
    $sbmarks['nowpublic'] = '<a href="http://view.nowpublic.com/?src='
                            . $sbmark_arr['link']
                            . '&t='
                            . $sbmark_arr['title']
                            . '"'
                            . ' target="_blank"><img border="0" src="'
                            . XOOPS_URL
                            . '/modules/'
                            . $xoopsModule->getVar('dirname')
                            . '/assets/images/sbookmarks/nowpublic.png" align="middle" title="'
                            . _MD_WFL_ADDTO
                            . 'NowPublic" alt="'
                            . _MD_WFL_ADDTO
                            . 'NowPublic"></a>';

    //RawSugar
    $sbmarks['rawsugar'] = '<a href="http://www.rawsugar.com/pages/tagger.faces?turl='
                           . $sbmark_arr['link']
                           . '&tttl='
                           . $sbmark_arr['title']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/rawsugar.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'RawSugar" alt="'
                           . _MD_WFL_ADDTO
                           . 'RawSugar"></a>';

    //Reddit
    $sbmarks['reddit'] = '<a href="http://reddit.com/submit?url='
                         . $sbmark_arr['link']
                         . '&title='
                         . $sbmark_arr['title']
                         . '"'
                         . ' target="_blank"><img border="0" src="'
                         . XOOPS_URL
                         . '/modules/'
                         . $xoopsModule->getVar('dirname')
                         . '/assets/images/sbookmarks/reddit.png" align="middle" title="'
                         . _MD_WFL_ADDTO
                         . 'reddit" alt="'
                         . _MD_WFL_ADDTO
                         . 'reddit"></a>';

    //Riffs
    $sbmarks['riffs'] = '<a href="http://www.riffs.com/item.cgi?section=init_url&url='
                        . $sbmark_arr['link']
                        . '&name='
                        . $sbmark_arr['title']
                        . '"'
                        . ' target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/riffs.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'Riffs" alt="'
                        . _MD_WFL_ADDTO
                        . 'Riffs"></a>';

    //Rojo
    $sbmarks['rojo'] = '<a href="http://www.rojo.com/submit/?title='
                       . $sbmark_arr['title']
                       . '&url='
                       . $sbmark_arr['link']
                       . '"'
                       . ' target="_blank"><img border="0" src="'
                       . XOOPS_URL
                       . '/modules/'
                       . $xoopsModule->getVar('dirname')
                       . '/assets/images/sbookmarks/rojo.png" align="middle" title="'
                       . _MD_WFL_ADDTO
                       . 'Rojo" alt="'
                       . _MD_WFL_ADDTO
                       . 'Rojo"></a>';

    //Shadows
    $sbmarks['shadow'] = '<a href="http://www.shadows.com/features/tcr.htm?title='
                         . $sbmark_arr['title']
                         . '&url='
                         . $sbmark_arr['link']
                         . '"'
                         . ' target="_blank"><img border="0" src="'
                         . XOOPS_URL
                         . '/modules/'
                         . $xoopsModule->getVar('dirname')
                         . '/assets/images/sbookmarks/shadows.png" align="middle" title="'
                         . _MD_WFL_ADDTO
                         . 'Shadows" alt="'
                         . _MD_WFL_ADDTO
                         . 'Shadows"></a>';

    //Simpy
    $sbmarks['simpy'] = '<a href="http://simpy.com/simpy/LinkAdd.do?title='
                        . $sbmark_arr['title']
                        . '&href='
                        . $sbmark_arr['link']
                        . '"'
                        . ' target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/simpy.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'Simpy" alt="'
                        . _MD_WFL_ADDTO
                        . 'Simpy"></a>';

    //Spurl
    $sbmarks['spurl'] = '<a href="http://www.spurl.net/spurl.php?url='
                        . $sbmark_arr['link']
                        . '&title='
                        . $sbmark_arr['title']
                        . '"'
                        . ' target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/spurl.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'Spurl" alt="'
                        . _MD_WFL_ADDTO
                        . 'Spurl"></a>';

    //Squidoo
    $sbmarks['squidoo'] = '<a href="http://www.squidoo.com/lensmaster/bookmark?'
                          . $sbmark_arr['link']
                          . '"'
                          . ' target="_blank"><img border="0" src="'
                          . XOOPS_URL
                          . '/modules/'
                          . $xoopsModule->getVar('dirname')
                          . '/assets/images/sbookmarks/squidoo.png" align="middle" title="'
                          . _MD_WFL_ADDTO
                          . 'Squidoo" alt="'
                          . _MD_WFL_ADDTO
                          . 'Squidoo"></a>';

    //StumbleUpon
    $sbmarks['stumble'] = '<a href="http://www.stumbleupon.com/submit?url='
                          . $sbmark_arr['link']
                          . '&title='
                          . $sbmark_arr['title']
                          . '"'
                          . ' target="_blank"><img border="0" src="'
                          . XOOPS_URL
                          . '/modules/'
                          . $xoopsModule->getVar('dirname')
                          . '/assets/images/sbookmarks/stumbleupon.png" align="middle" title="'
                          . _MD_WFL_ADDTO
                          . 'StumbleUpon" alt="'
                          . _MD_WFL_ADDTO
                          . 'StumbleUpon"></a>';

    //tagtooga
    $sbmarks['tagtooga'] = '<a href="http://www.tagtooga.com/tapp/db.exe?c=jsEntryForm&b=fx&title='
                           . $sbmark_arr['title']
                           . '&url='
                           . $sbmark_arr['link']
                           . '"'
                           . ' target="_blank"><img border="0" src="'
                           . XOOPS_URL
                           . '/modules/'
                           . $xoopsModule->getVar('dirname')
                           . '/assets/images/sbookmarks/tagtooga.png" align="middle" title="'
                           . _MD_WFL_ADDTO
                           . 'tagtooga" alt="'
                           . _MD_WFL_ADDTO
                           . 'tagtooga"></a>';

    //Technorati
    $sbmarks['techno'] = '<a="http://www.technorati.com/faves?add='
                         . $sbmark_arr['link']
                         . $sbmark_arr['title']
                         . '"'
                         . ' target="_blank"><img border="0" src="'
                         . XOOPS_URL
                         . '/modules/'
                         . $xoopsModule->getVar('dirname')
                         . '/assets/images/sbookmarks/technorati.png" align="middle" title="'
                         . _MD_WFL_ADDTO
                         . 'Technorati" alt="'
                         . _MD_WFL_ADDTO
                         . 'Technorati"></a>';

    //Wink
    $sbmarks['wink'] = '<a href="http://www.wink.com/_/tag?url='
                       . $sbmark_arr['link']
                       . '&doctitle='
                       . $sbmark_arr['title']
                       . '"'
                       . ' target="_blank"><img border="0" src="'
                       . XOOPS_URL
                       . '/modules/'
                       . $xoopsModule->getVar('dirname')
                       . '/assets/images/sbookmarks/wink.png" align="middle" title="'
                       . _MD_WFL_ADDTO
                       . 'Wink" alt="'
                       . _MD_WFL_ADDTO
                       . 'Wink"></a>';

    // Yahoo
    $sbmarks['yahoo'] = '<a href="http://myweb2.search.yahoo.com/myresults/bookmarklet?t='
                        . $sbmark_arr['title']
                        . '&u='
                        . $sbmark_arr['link']
                        . '"'
                        . ' target="_blank"><img border="0" src="'
                        . XOOPS_URL
                        . '/modules/'
                        . $xoopsModule->getVar('dirname')
                        . '/assets/images/sbookmarks/yahoo.png" align="middle" title="'
                        . _MD_WFL_ADDTO
                        . 'Yahoo MyWeb" alt="'
                        . _MD_WFL_ADDTO
                        . 'Yahoo MyWeb"></a>';

    //Information
    $sbmarks['info'] = '<a href="http://en.wikipedia.org/wiki/Social_bookmarking" target="_blank"><img border="0" src="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/assets/images/sbookmarks/what.png" align="middle" title="Information" alt="' . _MD_WFL_INFORMATION . '"></a>';

    // Make list of selected social bookmarks
    // Comment out thosr social bookmarks which should not be visible

    $sbmarks['sbmarks'] = //$sbmarks['blackflip'] . " " .
        //$sbmark['bibsonomy'] . " " .
        $sbmarks['blinklist'] . ' ' . //$sbmark['blogmark'] . " " .
        //$sbmark['citeulike'] . " " .
        //$sbmarks['connotea'] . " " .
        $sbmarks['delicio'] . ' ' . $sbmarks['digg'] . ' ' . //$sbmarks['diigo'] . " " .
        //$sbmarks['dzone'] . " " .
        //$sbmarks['earthlink'] . " " .
        //$sbmarks['eatmyhamster'] . " " .
        $sbmarks['facebook'] . ' ' . //$sbmarks['fantacular'] . " " .
        //$sbmarks['fark'] . " " .
        //$sbmarks['feedmarker'] . " " .
        //$sbmarks['feedmelinks'] . " " .
        $sbmarks['furl'] . ' ' . $sbmarks['google'] . ' ' . //$sbmarks['gravee'] . " " .
        //$sbmarks['igooi'] . " " .
        //$sbmarks['italknews'] . " " .
        //$sbmarks['jookster'] . " " .
        //$sbmarks['kinja'] . " " .
        //$sbmarks['linkagogo'] . " " .
        //$sbmarks['linkroll'] . " " .
        //$sbmarks['linuxquestions'] . " " .
        //$sbmarks['live'] . " " .         <==== Don't use doesn't work properly
        //$sbmarks['lookmarks'] . " " .
        //$sbmarks['lycos'] . " " .
        //$sbmarks['magnolia'] . " " .
        //$sbmarks['markabboo'] . " " .
        //$sbmarks['netscape'] . " " .
        //$sbmarks['netvouz'] . " " .
        //$sbmarks['newsvine'] . " " .
        //$sbmarks['ning'] . " " .
        //$sbmarks['nowpublic'] . " " .
        //$sbmarks['rawsugar'] . " " .
        $sbmarks['reddit'] . ' ' . //$sbmarks['riffs'] . " " .
        //$sbmarks['rojo'] . " " .
        //$sbmarks['shadow'] . " " .
        $sbmarks['simpy'] . ' ' . $sbmarks['spurl'] . ' ' . //$sbmarks['squidoo'] . " " .
        $sbmarks['stumble'] . ' ' . //$sbmarks['tagtooga'] . " " .
        //$sbmarks['techno'] . " " .
        $sbmarks['wink'] . ' ' . $sbmarks['yahoo'] . ' ' . $sbmarks['info'];

    return $sbmarks['sbmarks'];
}
