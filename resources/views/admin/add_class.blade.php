@if(Auth::check())
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm lớp</title>
	<style type="text/css">
		@import url("https://fonts.googleapis.com/css?family=Source+Code+Pro:300,400");

*,
*::after,
*::before {
  box-sizing: border-box;
}

body {
  color: #fff;
  background: #949c4e;
  background: linear-gradient(
    115deg,
    rgba(86, 216, 228, 1) 10%,
    rgba(159, 1, 234, 1) 90%
  );
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial,
    sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

html,
body,
.container {
  min-height: 100vh;
}

.center {
  display: flex;
  justify-content: center;
  align-items: center;
}

a {
  color: #2c3e50;
  text-decoration: none;
}

header {
  position: relative;
  height: 150px;
  padding-top: 100px;
}

header h1 {
  text-align: center;
  font-size: 2.4rem;
  font-weight: 300;
}

#app {
  display: flex;
}

.vue-form {
  font-size: 16px;
  width: 500px;
  padding: 15px 30px;
  border-radius: 4px;
  margin: 50px auto;
  width: 500px;
  background-color: #fff;
  box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.3);
}
.vue-form fieldset {
  margin: 24px 0 0 0;
}
.vue-form legend {
  padding-bottom: 10px;
  border-bottom: 1px solid #ecf0f1;
}
.vue-form div {
  position: relative;
  margin: 20px 0;
}
.vue-form h4,
.vue-form .label {
  color: #94aab0;
  margin-bottom: 10px;
}
.vue-form .label {
  display: block;
}
.vue-form input,
.vue-form select,
.vue-form label {
  color: #2b3e51;
}
.vue-form input[type="text"],
.vue-form select,
.vue-form legend {
  display: block;
  width: 100%;
  appearance: none;
}
.vue-form input[type="text"],
.vue-form select {
  padding: 12px;
  border: 1px solid #cfd9db;
  background-color: #ffffff;
  border-radius: 0.25em;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.08);
}
.vue-form input[type="text"]:focus,
.vue-form select:focus {
  outline: none;
  border-color: #2c3e50;
  box-shadow: 0 0 5px rgba(44, 151, 222, 0.2);
}
.vue-form .select {
  position: relative;
}
.vue-form .select::after {
  content: "";
  position: absolute;
  z-index: 1;
  right: 16px;
  top: 50%;
  margin-top: -8px;
  display: block;
  width: 16px;
  height: 16px;
  background: 
    no-repeat center center;
  pointer-events: none;
}
.vue-form select {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
  cursor: pointer;
}
.vue-form select::-ms-expand {
  display: none;
}


.vue-form input[type="submit"] {
  border: none;
  background: #2c3e50;
  border-radius: 0.25em;
  padding: 12px 20px;
  color: #ffffff;
  font-weight: bold;
  float: right;
  cursor: pointer;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  appearance: none;
}
.no-touch .vue-form input[type="submit"]:hover {
  background: #42a2e1;
}
.vue-form input[type="submit"]:focus {
  outline: none;
  background: #2b3e51;
}
.vue-form input[type="submit"]:active {
  transform: scale(0.9);
}
.vue-form .error-message {
  height: 35px;
  margin: 0px;
}
.vue-form .error-message p {
  background: #e94b35;
  color: #ffffff;
  font-size: 1.4rem;
  text-align: center;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  border-radius: 0.25em;
  padding: 16px;
}


	</style>

	<script type="text/javascript">

		var all_class = <?php echo  json_encode($class); ?>

		function checkAddClass(){

			var flag = 0;

			var a = document.getElementById("ma_lop");

			var ma_lop = String(a.value);

			var div = document.getElementById("addClass");

			var infor = document.getElementById("infor");

			if(ma_lop == ''){

				flag = 0;
			}
			else{

				for(i = 0; i < all_class.length; i++){

					flag = 2;

					if(ma_lop == all_class[i]['ma_lop'] ){

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

					infor.innerHTML = "<p v-show='!email.valid'>MA LOP DA TON TAI</p>";

					div.innerHTML = "";
				} 
				else 
					if(flag == 2){

						div.innerHTML = "<input type='submit' value='ADD'>";

						infor.innerHTML = "";
					}
		}


	</script>
	
</head>
<body>
	<h1 style="text-align:center" >THÊM LỚP</h1>

	<div id="app">
  		<form class="vue-form form" action="insert_class" method="get">
    		<div class="error-message" id="infor">
    		</div>
    		<fieldset>
      			
      			<div>
        			<h4>Mã Lớp</h4>
        			<input type="text" name="ma_lop" id="ma_lop" required="" v-model="name" onkeyup="checkAddClass()">
      			</div>
      			<div>
        			<h4>Học Phần</h4>
        				<p class="select">
         		 			<select class="budget" v-model="selection.member" name="id_hoc_phan">
								<?php
									for($i = 0; $i < count($subject); $i++){
								?>
									<option value="<?php echo $subject[$i]['id']; ?>"><?php echo $subject[$i]['ma_hoc_phan']." - ".$subject[$i]['ten_hoc_phan']; ?>
									</option>
								<?php 
									}
								?>
							</select>
        				</p>
      			</div>
      			<div id="addClass">
        		</div>
    		</fieldset>
  		</form>
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