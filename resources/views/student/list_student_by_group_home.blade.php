<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Calliope</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="shortcut icon" href="public/images/favicon.gif" />
		<link rel="stylesheet" type="text/css" href="public/css/style">
		<script type="text/javascript" src="public/js/swfobject/swfobject.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			flashvars.xml = "config.xml";
			flashvars.font = "font.swf";	
			var attributes = {};
			attributes.wmode = "transparent";
			attributes.id = "slider";
			swfobject.embedSWF("public/cu3er.swf", "public/cu3er-container", "960", "270", "9", "expressInstall.swf", flashvars, attributes);
		</script>
		<style type="text/css">
			/*Template: Calliope
				Author: Towfiq I.
				website: www.towfiqi.com
			*/
			body {margin: 0px;padding: 0px;border: 0px;font-family:Arial, Helvetica, sans-serif;background:#E6E6E6;color:#666}

			/*Fonts*/
			a { font-size:12px; color:#666;}
			a:link{color:#999999; text-decoration:none;}
			a:visited{color:#999999; text-decoration:none;}
			h1 { font-size:20px; font-weight:bold; color:#333;}
			h2 { font-size:24px; font-weight:bold; color:#222; margin:0px;}
			h3 {font-size:14px; font-weight:bold; color:#333;}
			/*Fonts END*/

			#header {background:#222222;height:100px;border-bottom:solid 1px #333333;}

			#toprow {height:372px;border-top:solid 1px #1d1d1d;background: #FFFFFF url(images/background: em;	gif) repeat-x;}
			#toprowsub {height:70px;border-bottom:solid 1px #ccc;background: #FFFFFF url(images/bg2.gif) repeat-x;}
			#toprowsub h2{padding:15px 30px;}
			#midrow {width:960px;margin:0 auto;}
			#bottomrow {width:960px;margin:0 auto;}

			/*LOGO*/
			#logo{padding-top:25px;width:207px;float:left;}
			#logo a{background:url(public/images/logo.gif) no-repeat;display:block;width:207px;height:53px;text-indent:-10000px;}
			/*LOGO END*/

			/*Menu Begin*/
			#menu{float:right;margin-top:30px;}
			#menu ul li{ display:inline; list-style-type:none;}
			#menu ul li a{padding:5px 0px; font-size:14px; text-decoration:none; margin:0px 10px; font-weight:bold;}
			#menu ul li a span{font-size:14px; text-decoration:none; padding:0px 10px; color:#999999;}
			#menu ul li a.active{background:url(public/images/menur.gif) no-repeat right;}
			#menu ul li a.active span{background:url(public/images/menul.gif) no-repeat left; padding:5px 10px;color:#333;}
			#menu ul li a:hover{background:url(public/images/menur.gif) no-repeat right; font-weight:bold;}
			#menu ul li a:hover span{background:url(public/images/menul.gif) no-repeat left; padding:5px 10px;color:#333;}
			/*Menu End*/

			.center{width:960px;margin:0 auto;}

			/*SlideShow Begin*/
			#cu3er-container {margin-top:60px;padding-left:0px;padding-right:0px;width:960px;}
			#cubershadow{width:960px;height:372px;background:url(public/images/shadow.jpg) no-repeat bottom;}
			/*SlideShow End*/

			/*Homepage Boxs*/
			#container {float:left;}
			.box {margin-top:20px;padding-top:10px;width:310px;height:auto;float:left;background:url(public/images/border.jpg) no-repeat bottom right;}
			.box h1{padding-left:10px;}
			.box p {margin:0px;width:200px;padding:15px 5px 10px 5px;float:left;}
			.last{background:none;}

			a.plan{float:left;display:block;width:83px;height:101px;background:url(public/images/plan.jpg) no-repeat 0px -101px;text-indent:-1000px;}
			a.plan:hover{ background-position: 0px 1px;}
			a.whyus{margin-top:10px;float:left;display:block;width:83px;height:87px;background:url(public/images/whyus.jpg) no-repeat 0px 0px;text-indent:-1000px;}
			a.whyus:hover{ background-position: 0px -88px;}
			a.support{margin-top:14px;float:left;display:block;width:83px;height:72px;background:url(public/images/support.jpg) no-repeat 0px 0px;text-indent:-1000px;}
			a.support:hover{ background-position: 0px -70px;}
	
			a.button{background:url(public/images/buttonr.gif) no-repeat right; padding:3px 0px; margin-left:2px; color:#CCCCCC; text-decoration:none; }
			.button span{background:url(public/images/buttonl.gif) no-repeat left; padding:3px 5px;}
			/*Homepage Boxs END*/

			/*Subpage Boxs*/
			#box2holder{padding: 20px 30px;}
			.box2{width:450px; float:left; padding:20px 0px;}
			.box2 img{ border: solid 5px #F2F2F2; float:left;}
			.box2 h3{margin:0px; padding:0px 5px; float:left;}
			.box2 p{width:220px; float:left;padding:5px 5px; margin:0px;}
			/*Subpage Boxs END*/


			/*Footer*/
			#footer {background:#222222;float:left;width:100%;height:50px;border-top:solid 1px #333333;}
			.foot{width:960px;margin:0 auto; padding:10px 0px; font-size:12px;}
			.foot a:link{color:#999;text-decoration:none;}
			/*Footer END*/


			.textbox{float:left;padding:50px 0px;width:700px;}
			.textbox2{padding:10px 30px; background:url(public/images/textbox2bg.gif) repeat-x;}
			.feed{width:auto; float:left;}
			.feed img{ border: solid 0px; margin-top:120px; padding:0px 7px;}

			@charset "UTF-8";
			@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

			.lich_thi{
  				font-family: 'Open Sans', sans-serif;
  				font-weight: 300;
  				line-height: 1.42em;
  				color:#A7A1AE;
  				background-color:#1F2739;
			}

			#table {
		  		font-size:3em; 
		  		font-weight: 300;
		  		line-height:1em;
		  		text-align: center;
		  		color: #4DC3FA;
				}

			h2 {
		  		font-size:1em; 
		  		font-weight: 300;
				text-align: center;
				display: block;
				line-height:1em;
				padding-bottom: 2em;
				color: #FB667A;
			}

			h2 a {
			  	font-weight: 700;
			  	text-transform: uppercase;
			  	color: #FB667A;
			  	text-decoration: none;
			}

			.blue { color: black; }
			.yellow { color: #FFF842; }

			.container th h1 {
	  			font-weight: bold;
	  			font-size: 1em;
  				text-align: left;
  				color: #185875;
			}

			.container td {
	  			font-weight: normal;
	  			font-size: 1em;
  				-webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   			-moz-box-shadow: 0 2px 2px -2px #0E1119;
	        	box-shadow: 0 2px 2px -2px #0E1119;
			}

			.container {
	  			text-align: left;
	  			overflow: hidden;
	  			width: 80%;
	  			margin: 0 auto;
  				display: table;
  				padding: 0 0 8em 0;
			}

			.container td, .container th {
	  			padding-bottom: 2%;
	  			padding-top: 2%;
  				padding-left:2%;  
			}

			/* Background-color of the odd rows */
			.container tr:nth-child(odd) {
	  			background-color: #323C50;
			}

			/* Background-color of the even rows */
			.container tr:nth-child(even) {
	  			background-color: #2C3446;
			}

			.container th {
	  			background-color: #1F2739;
			}

			.container td:first-child { color: #FB667A; }

			.container tr:hover {
   				background-color: #464A52;
				-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   			-moz-box-shadow: 0 6px 6px -6px #0E1119;
	        	box-shadow: 0 6px 6px -6px #0E1119;
			}

			.container td:hover {
  				background-color: #FFF842;
  				color: #403E10;
  				font-weight: bold;
  
  				box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  				transform: translate3d(6px, -6px, 0);
  
  				transition-delay: 0s;
	  			transition-duration: 0.4s;
	  			transition-property: all;
  				transition-timing-function: line;
			}

			@media (max-width: 800px) {
				.container td:nth-child(4),
				.container th:nth-child(4) { display: none; }
			}


		</style>
	</head>
	<body>
		<!--Header Begin-->
		<div id="header">
			<div class="center">
				<div id="logo"><a href="#">Calliope</a></div>
				<!--Menu Begin-->
				<div id="menu">
					<ul>
						<li><a class="active" href="home_page"><span>Home</span></a></li>
						<li><a href="login_form"><span>Login</span></a></li>
						<li><a href="#"><span>Services</span></a></li>
						<li><a href="#"><span>Contact</span></a></li>
					</ul>
				</div>
				<!--Menu END-->
			</div>
		</div>
		<!--Header END-->

		<div class="lich_thi">
			</br>
			<h1 id="table"><span class="blue"></span>Danh sách sinh viên của lớp <?php echo $class; ?> nhóm <?php echo $group; ?><span class="blue"></span></h1>
			<h2>Created with love by <a href="http://pablogarciafernandez.com" target="_blank">Trịnh Văn Tân</a></h2>
			<table class="container">
				<thead>
					<tr>
						<th><h1>#</h1></th>
						<th><h1>Mã Sinh Viên</h1></th>
						<th><h1>Họ Tên</h1></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					for($i=0; $i <count($all_student); $i++){
					?>
					<tr>
						<td><?php echo $i+1; ?></td>
						<td><?php echo $all_student[$i]['ma_sinh_vien']; ?></td>
						<td><?php echo $all_student[$i]['ho_ten']; ?></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<!-- <div class="panel-footer" style="width: 960px">
			          		<div class="row">
			            		<div class="col col-xs-4"> </div>
			            		<div class="col col-xs-8">
			              			<ul class="pagination hidden-xs pull-right">
			              			</ul>
			              			<ul class="pagination visible-xs pull-right">
			                			<li><a href="#">&laquo;</a></li>
			                			<li><a href="#">&raquo;</a></li>
			              			</ul>
			            		</div>
			          		</div>
			        	</div> -->
        	
		</div>
		<div id="midrow">
			<div id="container">
				<div class="box">
					<h1>Business Plan</h1>
					<a class="plan" href="#">Business Plan</a>
					<p>
						<a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget consequat odio. 	Proin sapien erat, venenatis ut mollis vel, pulvinar in eros. Cras vel felis massa, a vulputate leo.
						</a>
						<br /><br />
						<a href="#" class="button">	
							<span>Learn More</span>
						</a>
					</p>
				</div>
				<div class="box">
					<h1>Why Choose Us?</h1>
					<a class="whyus" href="#">Why Choose Us?</a>
					<p>
						<a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget consequat odio. Proin sapien erat, venenatis ut mollis vel, pulvinar in eros. Cras vel felis massa, a vulputate leo.
						</a>
						<br/><br />
						<a href="#" class="button">
							<span>Learn More</span>
						</a>
					</p>
				</div>
				<div class="box last">
					<h1>Our Support</h1>
					<a class="support" href="#">Our Support</a>
					<p>
						<a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget consequat odio. Proin sapien erat, venenatis ut mollis vel, pulvinar in eros. Cras vel felis massa, a vulputate leo.
						</a>
						<br /><br />
						<a href="#" class="button"><span>Learn More</span></a>
					</p>
				</div>
			</div>
		</div>
		<!--MiddleRow END-->

		<!--BottomRow Begin-->
		<div>
		<div id="bottomrow"s>
			<div class="textbox">
				<h1>Lorem ipsum dolor sit amet</h1>
					<a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget consequat odio. Proin sapien erat, venenatis ut mollis vel, pulvinar in eros. Cras vel felis massa, a vulputate leo. Donec posuere, orci in congue faucibus, erat metus feugiat augue, congue ultricies orci nulla in velit. Morbi pulvinar, justo nec suscipit bibendum, nisl est cursus orci, non sagittis ipsum enim sed orci. Sed imperdiet tristique condimentum. Proin eget ipsum odio, in adipiscing leo. In hac habitasse platea dictumst. Maecenas id dui non nisl lobortis porta sed sed mi. Nunc molestie tempor semper. Aenean non eros risus. Maecenas tincidunt vehicula lectus, id posuere orci consequat eget. Nam dictum ante vitae turpis interdum accumsan. Nullam est libero, porttitor vitae venenatis et, commodo viverra turpis. Ut aliquam facilisis dignissim.
					</a> 
			</div>
			<div class="feed"> 
				<a href="#">
					<img alt="" src="images/twitter.jpg" height="80" width="75" /></a> <a href="#"><img alt="" src="images/rss.jpg" height="80" width="67" />
				</a> 
			</div>
		</div>
		<!--BottomRow END-->

		<!--Footer Begin-->
		<div id="footer">
			<div class="foot"> 
				<span>Calliope</span> by 
					<a href="http://www.towfiqi.com">Towfiq I.</a> is licensed under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 Unported License.
				</a> 
			</div>
		</div>
		</div>
	</body>		
</html>
