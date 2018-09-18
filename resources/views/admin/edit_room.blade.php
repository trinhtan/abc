@if(Auth::check())
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Chỉnh sửa phòng</title>
	</head>
	<style type="text/css">

		@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

		body { background:rgb(30,30,40); }
		form { max-width:420px; margin:50px auto; }
		#form {

			max-width:420px; margin:50px auto; 
		}

		.feedback-input {
	  		color:white;
	  		font-family: Helvetica, Arial, sans-serif;
	  		font-weight:500;
	  		font-size: 18px;
	  		border-radius: 5px;
	  		line-height: 22px;
	  		background-color: transparent;
		  	border:2px solid #CC6666;
		  	transition: all 0.3s;
		  	padding: 13px;
		  	margin-bottom: 15px;
		  	width:100%;
		  	box-sizing: border-box;
		  	outline:0;
		}

		.feedback-input:focus { border:2px solid #CC4949; }

		textarea {
		  	height: 150px;
		  	line-height: 150%;
		  	resize:vertical;
		}

		[type="submit"] {
		  	font-family: 'Montserrat', Arial, Helvetica, sans-serif;
		  	width: 100%;
		  	background:#CC6666;
		  	border-radius:5px;
		  	border:0;
		  	cursor:pointer;
		  	color:white;
		  	font-size:24px;
		  	padding-top:10px;
		  	padding-bottom:10px;
		  	transition: all 0.3s;
		  	margin-top:-4px;
		  	font-weight:700;
		}
		[type="submit"]:hover { background:#CC4949; }

	</style>
	<script type="text/javascript">

		var room = <?php echo  json_encode($room); ?>

		var all_room = <?php echo json_encode($all_room); ?>

		function checkEditRoom(){

			var flag = 0;

			var a = document.getElementById("ten_phong");

			var ten_phong = String(a.value);

			var b = document.getElementById("suc_chua");

			var suc_chua = String(b.value);

			var div = document.getElementById("editRoom");

			var infor = document.getElementById("infor");

			if( ten_phong == ''){

				flag = 0;
			}
			else {

				for(i = 0; i < all_room.length; i++){

					flag = 2;

					if( ten_phong == all_room[i]['ten_phong'] && all_room[i]['ten_phong'] != room['ten_phong']){

						flag = 1;

						break; 
					}
				}
			}

			var flag_suc_chua = 0;

			for( i = 0; i< suc_chua.length; i++){

				if(suc_chua.charCodeAt(i) < 48 || suc_chua.charCodeAt(i) > 57) {

					flag_suc_chua = 1;

					break;
				}
			}

			if( flag == 0){

				div.innerHTML = "";

				infor.innerHTML = "";
			}
			else
				if( flag == 1){

					infor.innerHTML = "<input type='submit' value='TÊN PHÒNG ĐÃ TỒN TẠI'/>";

					div.innerHTML = "";
				}
				else 
					if( flag == 2){

						if( suc_chua != 0 && flag_suc_chua == 0){

							div.innerHTML = "</br></br><input type='submit' value='UPDATE'/>";

							infor.innerHTML = "";
						}

						else {

							infor.innerHTML = "<input type='submit' value='SỨC CHỨA PHẢI LÀ SỐ'/>";

							div.innerHTML = "";
						}
					}

			
		}

	</script>
	<body>
		<div id="form">
			<form action="update_room" method="get">
				<input type="hidden" name='id' value ="<?php echo $room['id']; ?>">      
	  			<input id="ten_phong" name="ten_phong" type="text" class="feedback-input" placeholder="Tên phòng: <?php echo $room['ten_phong']; ?>" onkeyup="checkEditRoom()"/>   
	  			<textarea id="suc_chua" name="suc_chua" class="feedback-input" placeholder="Sức Chứa: <?php echo $room['suc_chua']; ?>" onkeyup="checkEditRoom()"></textarea>
	  			<div id="editRoom">
	
	  			</div>
			</form>
			<div id="infor">
				
			</div>
		</div>
	</body>
</html>
@else 
<div class="container" style="">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top: 100px ">
            <h1 class="text-center login-title" style="text-align: center; color: green">Bạn Chưa Đăng Nhập</h1>
            <p style="text-align: center;"><a href="login_form">Click vào đây để đăng nhập</a></p>
            
        </div>
    </div>
</div>
@endif