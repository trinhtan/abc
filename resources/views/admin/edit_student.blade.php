@if(Auth::check())
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Chỉnh sửa sinh viên</title>
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

		var student = <?php echo  json_encode($student); ?>

		var all_student = <?php echo json_encode($all_student); ?>

		function checkEditStudent(){

			var flag = 0;

			var a = document.getElementById("ma_sinh_vien");

			var ma_sinh_vien = String(a.value);

			var b = document.getElementById("ho_ten");

			var ho_ten = String(b.value);

			var div = document.getElementById("editStudent");

			var infor = document.getElementById("infor");

			if(ma_sinh_vien == ''){

				flag = 0;
			}
			else{

				for(i = 0; i < all_student.length; i++){

					flag = 2;

					if(ma_sinh_vien == all_student[i]['ma_sinh_vien'] && all_student[i]['ma_sinh_vien'] !=student['ma_sinh_vien']){

						flag = 1;

						break;
					}
					
				}
			}

			if(flag == 0){

				div.innerHTML = "";

				infor.innerHTML = "";
			}
			else 
				if(flag == 1){

					infor.innerHTML = "<input type='submit' value='MÃ SINH VIÊN ĐÃ TỒN TẠI'/>";

					div.innerHTML = "";
				} 
				else 
					if(flag == 2){

						if(ho_ten != ''){

							div.innerHTML = "</br></br><input type='submit' value='UPDATE'/>";

							infor.innerHTML = "";
						
						}else {

							div.innerHTML = "";

							infor.innerHTML = "";
						}
					}
		}


	</script>
	<body>
		<div id="form">
			<form action="update_student" method="get">
				<input type="hidden" name='id' value ="<?php echo $student['id']; ?>">      
	  			<input id="ma_sinh_vien" name="ma_sinh_vien" type="text" class="feedback-input" placeholder="Mã Sinh Viên: <?php echo $student['ma_sinh_vien']; ?>" onkeyup="checkEditStudent()"/>   
	  			<textarea id="ho_ten" name="ho_ten" class="feedback-input" placeholder="Tên Sinh Viên: <?php echo $student['ho_ten']; ?>" onkeyup="checkEditStudent()"></textarea>
	  			<div id="editStudent">
	
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