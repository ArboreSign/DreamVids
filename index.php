<?php
session_start();

$content = 'pages/vidslist.php';
$model = 'models/m_vidslist.php';
$view = 'views/v_vidslist.php';

if(!empty($_GET['page'])) {
    $page = htmlentities($_GET['page']);
    $pages = scandir('./pages');

    if(!empty($page) && in_array($page.'.php', $pages)) {
            $content = 'pages/'.$page.'.php';
            $model = 'models/m_'.$page.'.php';
            $view = 'views/v_'.$page.'.php';
    }
}

include 'includes/bdd.class.php';
include 'includes/functions.php';
include 'classes/LoggedUser.php';
include 'classes/Video.php';
include 'classes/Comment.php';
include 'classes/Message.php';
include 'includes/tasks.php';

if ($config['maintenance'] == '1' || $session->getRank() == $config['rank_adm'])
{
	if (isset($session) || @$_GET['page'] == 'log')
	{
		include $model;
		include $content;
		
		if (@$_GET['page'] != 'ajax')
		{
			include 'views/_top.php';
			include $view;
			include 'views/_btm.php';
		}
		else
		{
			include $view;
		}
	}
	else
	{
		header('location:http://beta.dreamvids.fr/?page=log');
		exit();
	}
}
else
{
	echo '<!doctype><html><head><meta charset="utf-8" /><title>Maintenance - DreamVids</title>
<style type="text/css">
body
{
	background-color: #0986f9;
	background-image: url("img/maintenance.png");
	background-position: center;
	background-attachment:fixed;
	background-repeat: no-repeat;
}
</style>	
</head><body></body></html>';
}
?>