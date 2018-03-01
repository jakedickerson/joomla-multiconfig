<?php defined('_JEXEC') or die('Restricted access'); ?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
</head>
<body>
	<div class="error-main">
		<div class="error-heading">
			<h1>Error</h1>
		</div>
		<h2>Configuration malfunction</h2>
		<p>The server encountered a temporary error and could not complete your request.</p>
	</div>
</body>
<style>
	body{
		font-family: 'Ropa Sans', sans-serif;
		margin: 0px;
		background-color: #e1e1e1;
	}
	.error-main{
		margin: 150px auto;
		text-align: center;
	}
	.error-heading{
		margin: 0 auto;
		width: 300px;
		border-radius: 5px;
		box-shadow: 0px 7px 15px -10px #000;
	}
	.error-heading h1{
		margin: 0;
		background-color: #C81F3E;
		font-size: 120px;
		color: #f1f1f1;
	}
	.error-main h2{
		font-size: 36px;
		color: #C81F3E;
		text-shadow: 1px 2px 1px #c1c1c1;
	}
	.error-main p{
		color: #797979;
	}
</style>
</html>