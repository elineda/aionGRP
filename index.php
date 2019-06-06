<?php
/**
 * Created by PhpStorm.
 * User: henec
 * Date: 01/04/2019
 * Time: 15:47
 */


define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();
$request->enable_super_globals();




if (isset($_GET['w'])){
    include __DIR__ . '/src/controller/'.$_GET['w'].'.php';
}
else{
    include __DIR__ . '/src/controller/index.php';
}