<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

    <title>{$page_title|default:"Tytuł domyślny"}</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
{if $hide_intro }
    <link rel="stylesheet" href="{$conf->app_url}/css/style_hide_intro.css">
{/if}
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="{$conf->app_url}/js/jquery.min.js"></script>
	<script src="{$conf->app_url}/js/softscroll.js"></script>
</head>
<body>
<form action="{$conf->action_url}logout" method="post" >
<div id="app_top" class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="">{$page_title|default:"Tytuł domyślny"}</a>
        <ul>
            <li class="pure-menu-selected"><a href="#app_top">Góra strony</a></li>
            
            <input type="submit" value="Logowanie" class="pure-button pure-button-primary"/>
            
            
            <li><a href="#app_content">Idź do formularza</a></li>
        </ul>
    </div>
</div>
</form>
<form action="{$conf->action_url}rejestrshow" method="post" >
<div class="splash-container" >
    <div class="splash" >
        <h1 class="splash-head">{$page_title|default:"Tytuł domyślny"}</h1>
      
        
    </div>
</div>
</form>
<div class="content-wrapper">

    <div id="app_content" class="content">

{block name=content} Domyślna treść zawartości .... {/block}

    </div>

    <div class="footer l-box is-center">
		<p>
{block name=footer}Carent z nami bezpiecznie wypożyczysz samochód!!{/block}
		</p>
        <p></p>
    </div>

</div>


</body>
</html>
