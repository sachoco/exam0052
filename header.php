<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FC2新着ブログ情報</title>
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" />
		<link rel="stylesheet" href="style.css">
    </head>
    <body>
	    <div class="container">
			<div class="header clearfix">
				<nav>
					<ul class="nav nav-pills pull-right">
						<li role="presentation" class="<?php if($page=="index") echo active; ?>"><a href="index.php">メイン</a></li>
						<li role="presentation" class="<?php if($page=="about") echo active; ?>"><a href="about.php">本アプリについて</a></li>
						<li role="presentation"><a href="#">コンタクト</a></li>
					</ul>
				</nav>
				<h3 class="text-muted">FC2新着ブログ情報</h3>
			</div>