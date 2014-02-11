<?php
include('config.php');
include('dbinit.php');

if(!isset($_GET['func']))
{
$page = $_GET['page'];

//Page logic

if(empty($page))
{
        $page = "home";
        $page_title = "Home";
        include('views/shared/header.phtml');
		include('views/home.phtml');
}
else
{
	if(!file_exists("views/" . $page . ".phtml"))
	{
                $page_title = "404";
                include('views/shared/header.phtml');
				include('views/404.phtml');
	}
	else
	{
                $page_title = ucfirst($page);
                include('views/shared/header.phtml');
				include('views/' . $page . '.phtml');
	}
}

include('views/shared/footer.phtml');
}

if(isset($_GET['func']))
{
	$func = $_GET['func'];
	$func = strip_tags($func);
	
	if(!file_exists("func/" . $func . ".php"))
	{
		header('location: index.php?page=404');
	}
	else
	{
		include('func/' . $page . '.php');
	}	
}
?>