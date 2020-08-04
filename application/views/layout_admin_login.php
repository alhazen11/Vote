<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login | Pemira Online</title>
	  <link rel='shortcut icon' type='image/x-icon' href='<?=base_url()?>/logo.png' />
<link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	<style type="text/css">
js_index
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.ui_login{
		margin-top: 100px;
		border-radius: 8px;
		border: 1px solid #D0D0D0;
		padding: 10px;
		background:#FFFF;

	}
	.input_ct{
		width: 100px;
	}
	.ui_login_title{
		padding: 10px; 
	}
	.ui_login_body{

	}
	.ui_ct_body{
		background-color: #009ee0;
	}
	</style>
</head>
<body class="ui_ct_body">
<div class="container ">
  <div class="row">
		<div class="col-sm-4">
		</div>
    <div class="col-sm-4 ui_login">
				<div class="ui_login_title">
						<div class="row">
							<div class="col-sm-8">
							<div class="font-weight-bolder"><h4>Login</h4>		</div>
							<div class="font-weight-light">Please log in to enter the system.</div>
						</div>
						<div class="col-sm-4" align="right">
							<img width="60" src="<?=base_url();?>image/cl-ver.png">
						</div>
					</div>
					
				</div>
				<form class="form-login" method="post">
				<div class="ui_login_body">
					<div class="hasil"></div>
					<div class="input-group mb-2">
					<div class="input-group-prepend">
							<span class="input-group-text input_ct" id="basic-addon2">Username</span>
						</div>
						<input type="text" class="form-control" id="username" name="username">
					</div>
					<div class="input-group mb-2">
					<div class="input-group-prepend">
							<span class="input-group-text input_ct" id="basic-addon2">Password</span>
						</div>
						<input type="password" class="form-control" id="password" name="password" >
					</div>
				</div>
					<button type="submit" class="btn btn-info btn-md btn-block btn-login">Login</button>
					</form>
		</div>
		<div class="col-sm-4">
		</div>
  </div>
</div>
</body>
<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>js/adminlte.min.js"></script>
<script src="<?=base_url()?>js/jquery.confirm.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>js/demo.js"></script>
<?php if($js_index!=null){ 
      include $_SERVER['DOCUMENT_ROOT']."/vote/js/pages/".$js_index;
    }
  ?>
</html>