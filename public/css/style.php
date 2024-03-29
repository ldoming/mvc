<?php
session_start();
header("Content-type: text/css; charset: UTF-8");
$base_url = $_SESSION['base_url'];
?>

.messages { width: 100%; -moz-border-radius: 4px; border-radius: 4px; display: block; padding: 10px 0; margin: 10px auto 10px; clear: both; }
.messages a.closeMessage { margin: -14px -8px 0 0; display:none; width: 16px; height: 16px; float: right; background: url(<?php echo $base_url;?>public/img/close.png) no-repeat; }
/*.messages:hover a.closeMessage { visibility:visible; }*/
.messages p { margin: 3px 0 3px 10px !important; padding: 0 10px 0 23px !important; font-size: 14px; line-height: 16px; }
.messages.error { border: 1px solid #C42608; color: #c00 !important; background: #FFF0EF; }
.messages.error p { background: url(<?php echo $base_url;?>public/img/cross.png ) no-repeat 0px 50%; color:#c00 !important; }
.messages.success {background: #E0FBCC; border: 1px solid #6DC70C; } 
.messages.success p { background: url(<?php echo $base_url;?>public/img/tick.png) no-repeat 0px 50%; color: #2B6301 !important; }
.messages.warning { background: #FFFCD3; border: 1px solid #EBCD41; color: #000; }
.messages.warning p { background: url(<?php echo $base_url;?>public/img/warning.png ) no-repeat 0px 50%; color: #5F4E01; }
.messages.information, .messages.info { background: #DFEBFB; border: 1px solid #82AEE7; }
.messages.information p, .messages.info p { background: url(<?php echo $base_url;?>public/img/help.png ) no-repeat 0px 50%; color: #064393; }
.messages.information a { text-decoration: underline; }