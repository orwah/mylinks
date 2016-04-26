<?php
// $Id: xoops_version.php 11819 2013-07-09 18:21:40Z zyspec $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

if (!defined('XOOPS_ROOT_PATH')) exit;
$module_dirname = basename(dirname(__FILE__));
global $xoopsUser, $xoopsDB, $xoopsModule, $xoopsModuleConfig;

$modversion['dirname']     = basename( dirname( __FILE__ ) );
$modversion['name']        = _MI_MYLINKS_NAME;
$modversion['version']     = 3.11;
$modversion['description'] = _MI_MYLINKS_DESC;
$modversion["author"]      = "Kazumi Ono";
$modversion["nickname"]    = "Onokazu";
$modversion['credits']     = "Wanikoo, ZySpec, Mamba";
$modversion['official']    = 1;
//$modversion['release_date']= 1300453080;
$modversion['image']       = "images/mylinks_slogo.png";
$modversion['help']        = 'page=help';
$modversion['license']     = 'GNU GPL 2.0';
$modversion['license_url'] = "www.gnu.org/licenses/gpl-2.0.html";
$modversion["module_website_url"]    = "http://xoops.org";
$modversion["module_website_name"]    = "XOOPS";
$modversion["author_website_url"]    = "http://xoops.org";
$modversion["author_website_name"]    = "XOOPS";

//about
$modversion['release_date']     = '2016/04/25';
$modversion['module_status']    = "RC5";
$modversion['min_php']          = '5.3.0';
$modversion['min_xoops']        = '2.5.7';
$modversion['min_db']           = array('mysql'=>'5.0.7', 'mysqli'=>'5.0.7');
$modversion['min_admin']        = '1.1';
$modversion['dirmoduleadmin']   = '/Frameworks/moduleclasses/moduleadmin';
$modversion['icons16']          = '../../Frameworks/moduleclasses/icons/16';
$modversion['icons32']          = '../../Frameworks/moduleclasses/icons/32';

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
//$modversion['sqlfile']['postgresql'] = "sql/pgsql.sql";

// Tables created by sql file (without prefix!)
$modversion['tables'] = array(
                            "mylinks_broken",
                            "mylinks_cat",
                            "mylinks_links",
                            "mylinks_mod",
                            "mylinks_text",
                            "mylinks_votedata"
                        );

// Admin things
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu']  = "admin/menu.php";

//Install/Uninstall Functions
$modversion['onInstall']    = 'include/oninstall.inc.php';
$modversion['onUpdate']     = 'include/onupdate.inc.php';
$modversion['onUninstall']  = 'include/onuninstall.inc.php';

// Blocks
$modversion['blocks'][1] = array(
                            'file'        => "mylinks_top.php",
                            'name'        => _MI_MYLINKS_BNAME1,
                            'description' => _MI_MYLINKS_BNAME1DESC,
                            'show_func'   => "b_mylinks_top_show",
                            'edit_func'   => "b_mylinks_top_edit",
                            'options'     => "date|10|25",
                            'template'    => 'mylinks_block_new.html'
                );

$modversion['blocks'][2] = array(
                            'file'        => "mylinks_top.php",
                            'name'        => _MI_MYLINKS_BNAME2,
                            'description' => _MI_MYLINKS_BNAME2DESC,
                            'show_func'   => "b_mylinks_top_show",
                            'edit_func'   => "b_mylinks_top_edit",
                            'options'     => "hits|10|25",
                            'template'    => 'mylinks_block_top.html'
                );

$modversion['blocks'][3] = array(
                            'file'        => "mylinks_rand.php",
                            'name'        => _MI_MYLINKS_BNAME3,
                            'description' => _MI_MYLINKS_BNAME3DESC,
                            'show_func'   => "b_mylinks_random_show",
                            'template'    => 'mylinks_block_rand.html'
                );

// Menu
$modversion['hasMain'] = 1;
$i = 1;
$hModConfig = xoops_getHandler('config');
$hModule = xoops_getHandler('module');
if ($mylinksModule =& $hModule->getByDirname($module_dirname)) {
    if ($mylinksConfig =& $hModConfig->getConfigsByCat(0, $mylinksModule->getVar('mid'))) {
        if (($xoopsUser) || ($mylinksConfig['anonpost'] == 1)) {
            $modversion['sub'][$i] = array('name' => _MI_MYLINKS_SMNAME1,
                                           'url'  => 'submit.php');
            $i++;
        }
    }
}
//$modversion['sub'][1]['name'] = _MI_MYLINKS_SMNAME1;
//$modversion['sub'][1]['url']  = "submit.php";
/*
 * sort =    1    Top Rated
 *             2    Popular
 *             3    Most Recent
 */
$modversion['sub'][$i] = array('name' => _MI_MYLINKS_SMNAME3,
                               'url'  => "topten.php?sort=1");
$i++;
$modversion['sub'][$i] = array('name' => _MI_MYLINKS_SMNAME2,
                               'url'  => "topten.php?sort=2");
$i++;
$modversion['sub'][$i] = array('name' => _MI_MYLINKS_SMNAME4,
                               'url'  => "topten.php?sort=3");

// Set to 1 if you want to display menu generated by system module
$modversion['system_menu'] = 1;

// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "mylinks_search";

// Comments
$modversion['hasComments']             = 1;
$modversion['comments']['itemName']    = 'lid';
$modversion['comments']['pageName']    = 'singlelink.php';
$modversion['comments']['extraParams'] = array('cid');
// Comment callback functions
$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'mylinks_com_approve';
$modversion['comments']['callback']['update']  = 'mylinks_com_update';

// Templates
$i = 1;
$modversion['templates'][$i]['file']        = 'mylinks_brokenlink.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_BROKEN;
$i++;
$modversion['templates'][$i]['file']        = 'mylinks_link.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_LINK;
$i++;
$modversion['templates'][$i]['file']        = 'mylinks_index.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_INDEX;
$i++;
$modversion['templates'][$i]['file']        = 'mylinks_modlink.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_MODLINK;
$i++;
$modversion['templates'][$i]['file']        = 'mylinks_ratelink.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_RATELINK;
$i++;
$modversion['templates'][$i]['file']        = 'mylinks_singlelink.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_SINGLELINK;
$i++;
$modversion['templates'][$i]['file']        = 'mylinks_submit.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_SUBMIT;
$i++;
$modversion['templates'][$i]['file']        = 'mylinks_topten.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_TOPTEN;
$i++;
$modversion['templates'][$i]['file']        = 'mylinks_viewcat.html';
$modversion['templates'][$i]['description'] = _MI_MYLINKS_TPLDESC_VIEWCAT;
/*
$i++;
$modversion["templates"][$i]["file"]         = "admin/" . $module_dirname . "_admin_index.html";
$modversion["templates"][$i]["description"] = _MI_MYLINKS_TPLDESC_ADMIN_INDEX;
$i++;
$modversion["templates"][$i]["file"]         = "admin/" . $module_dirname . "_admin_about.html";
$modversion["templates"][$i]["description"] = _MI_MYLINKS_TPLDESC_ADMIN_ABOUT;
$i++;
$modversion["templates"][$i]["file"]         = "admin/" . $module_dirname . "_admin_help.html";
$modversion["templates"][$i]["description"] = _MI_MYLINKS_TPLDESC_ADMIN_HELP;
*/
$i++;
$modversion["templates"][$i]["file"]        = 'mylinks_search_inc.html';
$modversion["templates"][$i]["description"] = _MI_MYLINKS_TPLDESC_SEARCHINC;
$i++;
$modversion["templates"][$i]["file"]        = 'mylinks_atom.html';
$modversion["templates"][$i]["description"] = _MI_MYLINKS_TPLDESC_ATOM;
$i++;
$modversion["templates"][$i]["file"]        = 'mylinks_pda.html';
$modversion["templates"][$i]["description"] = _MI_MYLINKS_TPLDESC_PDA;
$i++;
$modversion["templates"][$i]["file"]        = 'mylinks_rss.html';
$modversion["templates"][$i]["description"] = _MI_MYLINKS_TPLDESC_RSS;

// Config Settings (only for modules that need config settings generated automatically)

// name of config option for accessing its specified value. i.e. $xoopsModuleConfig['storyhome']
$modversion['config'][1]['name'] = 'popular';

// title of this config option displayed in config settings form
$modversion['config'][1]['title'] = '_MI_MYLINKS_POPULAR';

// description of this config option displayed under title
$modversion['config'][1]['description'] = '_MI_MYLINKS_POPULARDSC';

// form element type used in config form for this option. can be one of either textbox, textarea, select, select_multi, yesno, group, group_multi
$modversion['config'][1]['formtype'] = 'select';

// value type of this config option. can be one of either int, text, float, array, or other
// form type of 'group_multi', 'select_multi' must always be 'array'
// form type of 'yesno', 'group' must be always be 'int'
$modversion['config'][1]['valuetype'] = 'int';

// the default value for this option
// ignore it if no default
// 'yesno' formtype must be either 0(no) or 1(yes)
$modversion['config'][1]['default'] = 100;

// options to be displayed in selection box
// required and valid for 'select' or 'select_multi' formtype option only
// language constants can be used for both array keys and values
$modversion['config'][1]['options'] = array('5' => 5, '10' => 10, '50' => 50, '100' => 100, '200' => 200, '500' => 500, '1000' => 1000);

$modversion['config'][] = array(
                            'name'        => 'newlinks',
                            'title'       => '_MI_MYLINKS_NEWLINKS',
                            'description' => '_MI_MYLINKS_NEWLINKSDSC',
                            'formtype'    => 'select',
                            'valuetype'   => 'int',
                            'default'     => 10,
                            'options'     => array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50)
                          );

$modversion['config'][] = array(
                            'name'        => 'perpage',
                            'title'       => '_MI_MYLINKS_PERPAGE',
                            'description' => '_MI_MYLINKS_PERPAGEDSC',
                            'formtype'    => 'select',
                            'valuetype'   => 'int',
                            'default'     => 10,
                            'options'     => array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50)
                          );

$modversion['config'][] = array(
                            'name'        => 'anonpost',
                            'title'       => '_MI_MYLINKS_ANONPOST',
                            'description' => '',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 0
                          );

$modversion['config'][] = array(
                            'name'        => 'autoapprove',
                            'title'       => '_MI_MYLINKS_AUTOAPPROVE',
                            'description' => '_MI_MYLINKS_AUTOAPPROVEDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 0
                            );

$modversion['config'][] = array(
                            'name'        => 'frame',
                            'title'       => '_MI_MYLINKS_USEFRAMES',
                            'description' => '_MI_MYLINKS_USEFRAMEDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 0
                          );

$modversion['config'][] = array(
                            'name'        => 'useshots',
                            'title'       => '_MI_MYLINKS_USESHOTS',
                            'description' => '_MI_MYLINKS_USESHOTSDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 0
                          );

$modversion['config'][] = array(
                            'name'        => 'shotwidth',
                            'title'       => '_MI_MYLINKS_SHOTWIDTH',
                            'description' => '_MI_MYLINKS_SHOTWIDTHDSC',
                            'formtype'    => 'textbox',
                            'valuetype'   => 'int',
                            'default'     => 140
                          );

$options = array('None'=>_NONE);
$fileList = XoopsLists::getFileListAsArray(XOOPS_ROOT_PATH . "/modules/" . $modversion['dirname'] . "/class/providers");
foreach ($fileList as $filename) {
    if ('.php' == (substr($filename, - 4))
        && (file_exists(XOOPS_ROOT_PATH . "/modules/" . $modversion['dirname'] . "/class/providers/{$filename}"))
    ) {
        include_once XOOPS_ROOT_PATH . "/modules/" . $modversion['dirname'] . "/class/providers/{$filename}";
        $provider = substr($filename, 0, -4);
        $providerKey = ucfirst($provider);
        $provClass = ucfirst($modversion['dirname']) . $providerKey;
        $provObj = new $provClass;
        if ($provObj instanceof MylinksThumbPlugin) {
            $options[$providerKey] = $provObj->getProviderName();
        }
    }
}

$modversion['config'][] = array(
                            'name'        => 'shotprovider',
                            'title'       => '_MI_MYLINKS_SHOTPROVIDER',
                            'description' => '_MI_MYLINKS_SHOTPROVIDERDSC',
                            'formtype'    => 'select',
                            'valuetype'   => 'text',
                            'default'     => _NONE,
                            'options'     => $options);
/*
$modversion['config'][] = array(
                            'name'        => 'shotprovider',
                            'title'       => '_MI_MYLINKS_SHOTPROVIDER',
                            'description' => '_MI_MYLINKS_SHOTPROVIDERDSC',
                            'formtype'    => 'select',
                            'valuetype'   => 'text',
                            'default'     => _MI_MYLINKS_SHPROV0_VAL,
                            'options'     => array('_MI_MYLINKS_SHPROV0' => _MI_MYLINKS_SHPROV0_VAL,
                                                   '_MI_MYLINKS_SHPROV1' => _MI_MYLINKS_SHPROV1_VAL,
                                                   '_MI_MYLINKS_SHPROV2' => _MI_MYLINKS_SHPROV2_VAL)
                          );
*/

$modversion['config'][] = array(
                            'name'        => 'shotpubkey',
                            'title'       => '_MI_MYLINKS_SHOTPUBKEY',
                            'description' => '_MI_MYLINKS_SHOTPUBKEYDSC',
                            'formtype'    => 'textbox',
                            'valuetype'   => 'text',
                            'default'     => '',
                          );

$modversion['config'][] = array(
                            'name'        => 'shotprivkey',
                            'title'       => '_MI_MYLINKS_SHOTPRIVKEY',
                            'description' => '_MI_MYLINKS_SHOTPRIVKEYDSC',
                            'formtype'    => 'textbox',
                            'valuetype'   => 'text',
                            'default'     => '',
                          );

$modversion['config'][] = array(
                            'name'        => 'shotattribution',
                            'title'       => '_MI_MYLINKS_DISPATTR',
                            'description' => '_MI_MYLINKS_DISPATTRRDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 1
                          );
$modversion['config'][] = array(
                            'name'        => 'incadmin',
                            'title'       => '_MI_MYLINKS_INCADMIN',
                            'description' => '_MI_MYLINKS_INCADMINDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 1
                          );

$modversion['config'][] = array(
                            'name'        => 'showextrafunc',
                            'title'       => '_MI_MYLINKS_SHOWEXTRAFUNC',
                            'description' => '_MI_MYLINKS_SHOWEXTRAFUNCDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 1
                          );

$modversion['config'][] = array(
                            'name'        => 'canprint',
                            'title'       => '_MI_MYLINKS_CANPRINT',
                            'description' => '_MI_MYLINKS_CANPRINTDSC',
                            'formtype'    => 'select',
                            'valuetype'   => 'int',
                            'default'     => _MI_MYLINKS_ALLOW,
                            'options'     => array('_MI_MYLINKS_DISALLOWDSC' => _MI_MYLINKS_DISALLOW, '_MI_MYLINKS_MEMBERONLYDSC' => _MI_MYLINKS_MEMBERONLY, '_MI_MYLINKS_ALLOWDSC' => _MI_MYLINKS_ALLOW)
                          );

$modversion['config'][] = array(
                            'name'        => 'canpdf',
                            'title'       => '_MI_MYLINKS_CANPDF',
                            'description' => '_MI_MYLINKS_CANPDFDSC',
                            'formtype'    => 'select',
                            'valuetype'   => 'int',
                            'default'     => _MI_MYLINKS_ALLOW,
                            'options'     => array('_MI_MYLINKS_DISALLOWDSC' => _MI_MYLINKS_DISALLOW, '_MI_MYLINKS_MEMBERONLYDSC' => _MI_MYLINKS_MEMBERONLY, '_MI_MYLINKS_ALLOWDSC' => _MI_MYLINKS_ALLOW)
                          );

$modversion['config'][] = array(
                            'name'        => 'canbookmark',
                            'title'       => '_MI_MYLINKS_CANBOOKMARK',
                            'description' => '_MI_MYLINKS_CANBOOKMARKDSC',
                            'formtype'    => 'select',
                            'valuetype'   => 'int',
                            'default'     => _MI_MYLINKS_ALLOW,
                            'options'     => array('_MI_MYLINKS_DISALLOWDSC' => _MI_MYLINKS_DISALLOW, '_MI_MYLINKS_MEMBERONLYDSC' => _MI_MYLINKS_MEMBERONLY, '_MI_MYLINKS_ALLOWDSC' => _MI_MYLINKS_ALLOW)
                          );

$modversion['config'][] = array(
                            'name'        => 'canqrcode',
                            'title'       => '_MI_MYLINKS_CANQRCODE',
                            'description' => '_MI_MYLINKS_CANQRCODEDSC',
                            'formtype'    => 'select',
                            'valuetype'   => 'int',
                            'default'     => _MI_MYLINKS_MEMBERONLY,
                            'options'     => array('_MI_MYLINKS_DISALLOWDSC' => _MI_MYLINKS_DISALLOW, '_MI_MYLINKS_MEMBERONLYDSC' => _MI_MYLINKS_MEMBERONLY, '_MI_MYLINKS_ALLOWDSC' => _MI_MYLINKS_ALLOW)
                          );

$modversion['config'][] = array(
                            'name'        => 'showlogo',
                            'title'       => '_MI_MYLINKS_SHOWLOGO',
                            'description' => '_MI_MYLINKS_SHOWLOGODSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 1
                          );

$modversion['config'][] = array(
                            'name'        => 'showxoopssearch',
                            'title'       => '_MI_MYLINKS_SHOWXOOPSSEARCH',
                            'description' => '_MI_MYLINKS_SHOWXOOPSSEARCHDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 0
                          );

$modversion['config'][] = array(
                            'name'        => 'showtoolbar',
                            'title'       => '_MI_MYLINKS_SHOWTOOLBAR',
                            'description' => '_MI_MYLINKS_SHOWTOOLBARDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 0
                          );

$modversion['config'][] = array(
                            'name'        => 'showletters',
                            'title'       => '_MI_MYLINKS_SHOWLETTERS',
                            'description' => '_MI_MYLINKS_SHOWLETTERSDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 1
                          );

$modversion['config'][] = array(
                            'name'        => 'showfeed',
                            'title'       => '_MI_MYLINKS_SHOWFEED',
                            'description' => '_MI_MYLINKS_SHOWFEEDDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 1
                          );

$modversion['config'][] = array(
                            'name'        => 'showsiteinfo',
                            'title'       => '_MI_MYLINKS_SHOWSITEINFO',
                            'description' => '_MI_MYLINKS_SHOWSITEINFODSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 1
                          );

$modversion['config'][] = array(
                            'name'        => 'anontellafriend',
                            'title'       => '_MI_MYLINKS_ANONTELLAFRIEND',
                            'description' => '_MI_MYLINKS_ANONTELLAFRIENDDSC',
                            'formtype'    => 'yesno',
                            'valuetype'   => 'int',
                            'default'     => 1
                          );

// Notification

$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'mylinks_notify_iteminfo';

$modversion['notification']['category'][1]['name']           = 'global';
$modversion['notification']['category'][1]['title']          = _MI_MYLINKS_GLOBAL_NOTIFY;
$modversion['notification']['category'][1]['description']    = _MI_MYLINKS_GLOBAL_NOTIFYDSC;
$modversion['notification']['category'][1]['subscribe_from'] = array('index.php','viewcat.php','singlelink.php');

$modversion['notification']['category'][2]['name']           = 'category';
$modversion['notification']['category'][2]['title']          = _MI_MYLINKS_CATEGORY_NOTIFY;
$modversion['notification']['category'][2]['description']    = _MI_MYLINKS_CATEGORY_NOTIFYDSC;
$modversion['notification']['category'][2]['subscribe_from'] = array('viewcat.php', 'singlelink.php');
$modversion['notification']['category'][2]['item_name']      = 'cid';
$modversion['notification']['category'][2]['allow_bookmark'] = 1;

$modversion['notification']['category'][3]['name']           = 'link';
$modversion['notification']['category'][3]['title']          = _MI_MYLINKS_LINK_NOTIFY;
$modversion['notification']['category'][3]['description']    = _MI_MYLINKS_LINK_NOTIFYDSC;
$modversion['notification']['category'][3]['subscribe_from'] = 'singlelink.php';
$modversion['notification']['category'][3]['item_name']      = 'lid';
$modversion['notification']['category'][3]['allow_bookmark'] = 1;

$modversion['notification']['event'][1]['name']              = 'new_category';
$modversion['notification']['event'][1]['category']          = 'global';
$modversion['notification']['event'][1]['title']             = _MI_MYLINKS_GLOBAL_NEWCATEGORY_NOTIFY;
$modversion['notification']['event'][1]['caption']           = _MI_MYLINKS_GLOBAL_NEWCATEGORY_NOTIFYCAP;
$modversion['notification']['event'][1]['description']       = _MI_MYLINKS_GLOBAL_NEWCATEGORY_NOTIFYDSC;
$modversion['notification']['event'][1]['mail_template']     = 'global_newcategory_notify';
$modversion['notification']['event'][1]['mail_subject']      = _MI_MYLINKS_GLOBAL_NEWCATEGORY_NOTIFYSBJ;

$modversion['notification']['event'][2]['name']              = 'link_modify';
$modversion['notification']['event'][2]['category']          = 'global';
$modversion['notification']['event'][2]['admin_only']        = 1;
$modversion['notification']['event'][2]['title']             = _MI_MYLINKS_GLOBAL_LINKMODIFY_NOTIFY;
$modversion['notification']['event'][2]['caption']           = _MI_MYLINKS_GLOBAL_LINKMODIFY_NOTIFYCAP;
$modversion['notification']['event'][2]['description']       = _MI_MYLINKS_GLOBAL_LINKMODIFY_NOTIFYDSC;
$modversion['notification']['event'][2]['mail_template']     = 'global_linkmodify_notify';
$modversion['notification']['event'][2]['mail_subject']      = _MI_MYLINKS_GLOBAL_LINKMODIFY_NOTIFYSBJ;

$modversion['notification']['event'][3]['name']          = 'link_broken';
$modversion['notification']['event'][3]['category']      = 'global';
$modversion['notification']['event'][3]['admin_only']    = 1;
$modversion['notification']['event'][3]['title']         = _MI_MYLINKS_GLOBAL_LINKBROKEN_NOTIFY;
$modversion['notification']['event'][3]['caption']       = _MI_MYLINKS_GLOBAL_LINKBROKEN_NOTIFYCAP;
$modversion['notification']['event'][3]['description']   = _MI_MYLINKS_GLOBAL_LINKBROKEN_NOTIFYDSC;
$modversion['notification']['event'][3]['mail_template'] = 'global_linkbroken_notify';
$modversion['notification']['event'][3]['mail_subject']  = _MI_MYLINKS_GLOBAL_LINKBROKEN_NOTIFYSBJ;

$modversion['notification']['event'][4]['name']          = 'link_submit';
$modversion['notification']['event'][4]['category']      = 'global';
$modversion['notification']['event'][4]['admin_only']    = 1;
$modversion['notification']['event'][4]['title']         = _MI_MYLINKS_GLOBAL_LINKSUBMIT_NOTIFY;
$modversion['notification']['event'][4]['caption']       = _MI_MYLINKS_GLOBAL_LINKSUBMIT_NOTIFYCAP;
$modversion['notification']['event'][4]['description']   = _MI_MYLINKS_GLOBAL_LINKSUBMIT_NOTIFYDSC;
$modversion['notification']['event'][4]['mail_template'] = 'global_linksubmit_notify';
$modversion['notification']['event'][4]['mail_subject']  = _MI_MYLINKS_GLOBAL_LINKSUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][5]['name']          = 'new_link';
$modversion['notification']['event'][5]['category']      = 'global';
$modversion['notification']['event'][5]['title']         = _MI_MYLINKS_GLOBAL_NEWLINK_NOTIFY;
$modversion['notification']['event'][5]['caption']       = _MI_MYLINKS_GLOBAL_NEWLINK_NOTIFYCAP;
$modversion['notification']['event'][5]['description']   = _MI_MYLINKS_GLOBAL_NEWLINK_NOTIFYDSC;
$modversion['notification']['event'][5]['mail_template'] = 'global_newlink_notify';
$modversion['notification']['event'][5]['mail_subject']  = _MI_MYLINKS_GLOBAL_NEWLINK_NOTIFYSBJ;

$modversion['notification']['event'][6]['name']          = 'link_submit';
$modversion['notification']['event'][6]['category']      = 'category';
$modversion['notification']['event'][6]['admin_only']    = 1;
$modversion['notification']['event'][6]['title']         = _MI_MYLINKS_CATEGORY_LINKSUBMIT_NOTIFY;
$modversion['notification']['event'][6]['caption']       = _MI_MYLINKS_CATEGORY_LINKSUBMIT_NOTIFYCAP;
$modversion['notification']['event'][6]['description']   = _MI_MYLINKS_CATEGORY_LINKSUBMIT_NOTIFYDSC;
$modversion['notification']['event'][6]['mail_template'] = 'category_linksubmit_notify';
$modversion['notification']['event'][6]['mail_subject']  = _MI_MYLINKS_CATEGORY_LINKSUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][7]['name']          = 'new_link';
$modversion['notification']['event'][7]['category']      = 'category';
$modversion['notification']['event'][7]['title']         = _MI_MYLINKS_CATEGORY_NEWLINK_NOTIFY;
$modversion['notification']['event'][7]['caption']       = _MI_MYLINKS_CATEGORY_NEWLINK_NOTIFYCAP;
$modversion['notification']['event'][7]['description']   = _MI_MYLINKS_CATEGORY_NEWLINK_NOTIFYDSC;
$modversion['notification']['event'][7]['mail_template'] = 'category_newlink_notify';
$modversion['notification']['event'][7]['mail_subject']  = _MI_MYLINKS_CATEGORY_NEWLINK_NOTIFYSBJ;

$modversion['notification']['event'][8]['name']          = 'approve';
$modversion['notification']['event'][8]['category']      = 'link';
$modversion['notification']['event'][8]['invisible']     = 1;
$modversion['notification']['event'][8]['title']         = _MI_MYLINKS_LINK_APPROVE_NOTIFY;
$modversion['notification']['event'][8]['caption']       = _MI_MYLINKS_LINK_APPROVE_NOTIFYCAP;
$modversion['notification']['event'][8]['description']   = _MI_MYLINKS_LINK_APPROVE_NOTIFYDSC;
$modversion['notification']['event'][8]['mail_template'] = 'link_approve_notify';
$modversion['notification']['event'][8]['mail_subject']  = _MI_MYLINKS_LINK_APPROVE_NOTIFYSBJ;

// onUpdate
/*
if( ! empty( $_POST['fct'] ) && ! empty( $_POST['op'] ) && $_POST['fct'] == 'modulesadmin' && $_POST['op'] == 'update_ok' && $_POST['dirname'] == $modversion['dirname'] ) {
  include dirname( __FILE__ ) . "/include/onupdate.inc.php";
}
*/;
