@if(Auth::check())
@extends('admin.index')

@section('content')
	
	
            <style type="text/css">

                h1{
                    font-size: 30px;
                    color: #fff;
                    text-transform: uppercase;
                    font-weight: 300;
                    text-align: center;
                    margin-bottom: 15px;
                }

                table{
                  width:100%;
                  height: 300px;
                  table-layout: fixed;
                }

                .tbl-header{
                  background-color: rgba(255,255,255,0.3);
                }
                .tbl-content{
                  height:300px;
                  overflow-x:auto;
                  margin-top: 0px;
                  border: 1px solid rgba(255,255,255,0.3);
                }

                th{
                  padding: 20px 15px;
                  text-align: left;
                  font-weight: 500;
                  font-size: 12px;
                  color: #fff;
                  text-transform: uppercase;
                }
                td{
                  padding: 15px;
                  text-align: left;
                  vertical-align:middle;
                  font-weight: 300;
                  font-size: 12px;
                  color: #fff;
                  border-bottom: solid 1px rgba(255,255,255,0.1);
                }


                /* demo styles */

                @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
                body{
                  background: -webkit-linear-gradient(left, #2C3E50, #FD746C);
                  background: -o-linear-gradient(left, #2C3E50, #FD746C);
                  background: linear-gradient(to right, #2C3E50, #FD746C);
                  font-family: 'Roboto', sans-serif;
                }

                section{
                    margin: 50px;
                }

                /* for custom scrollbar for webkit browser*/

                ::-webkit-scrollbar {
                    width: 6px;
                } 
                ::-webkit-scrollbar-track {
                    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
                } 
                ::-webkit-scrollbar-thumb {
                    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
                }

                *{font-family: 'Roboto', sans-serif;}

                @keyframes click-wave {
                    0% {
                        height: 20px;
                        width: 20px;
                        opacity: 0.35;
                        position: relative;
                    }
                    100% {
                        height: 200px;
                        width: 200px;
                        margin-left: -80px;
                        margin-top: -80px;
                        opacity: 0;
                    }
                }

                .option-input {
                  -webkit-appearance: none;
                  -moz-appearance: none;
                  -ms-appearance: none;
                  -o-appearance: none;
                  appearance: none;
                  position: relative;
                  top: 10.5px;
                  right: 0;
                  bottom: 0;
                  left: 0;
                  height: 20px;
                  width: 20px;
                  transition: all 0.15s ease-out 0s;
                  background: #cbd1d8;
                  border: none;
                  color: #fff;
                  cursor: pointer;
                  display: inline-block;
                  margin-right: 0.5rem;
                  outline: none;
                  position: relative;
                  z-index: 1000;
                }
                .option-input:hover {
                  background: #9faab7;
                }
                .option-input:checked {
                  background: #40e0d0;
                }
                .option-input:checked::before {
                  height: 20px;
                  width: 20px;
                  position: absolute;
                  content: '✔';
                  display: inline-block;
                  font-size: 26.66667px;
                  text-align: center;
                  line-height: 20px;
                }
                .option-input:checked::after {
                  -webkit-animation: click-wave 0.65s;
                  -moz-animation: click-wave 0.65s;
                  animation: click-wave 0.65s;
                  background: #40e0d0;
                  content: '';
                  display: block;
                  position: relative;
                  z-index: 100;
                }


                .links {
                    width: 90%;
                    margin: 0 auto;
                }

                .underline {
                  
                  border: 2px solid transparent;

                }
                .underline::after {
                  width: 0%;
                  height: 2px;
                  display: block;
                  background-color: #fff;
                  content: " ";
                  position: absolute;
                  top: 34px;
                  left: 50%;
                  -webkit-transition: left 0.2s cubic-bezier(0.215, 0.61, 0.355, 1), width 0.2s cubic-bezier(0.215, 0.61, 0.355, 1);
                  transition: left 0.2s cubic-bezier(0.215, 0.61, 0.355, 1), width 0.2s cubic-bezier(0.215, 0.61, 0.355, 1);
                }
                .underline:hover::after {
                  width: 35%;
                  height: 2px;
                  display: block;
                  background-color: #fff;
                  content: " ";
                  position: absolute;
                  top: 34px;
                  left: 0;
                }

                .link {
                  display: inline-block;
                  vertical-align: top;
                  width: 100px;
                  height: 34px;
                  line-height: 36px;
                  text-transform: uppercase;
                  text-decoration: none;
                  color: #fff;
                  letter-spacing: 0.1em;
                  font-size: 0.7rem;
                  margin: 10px;
                  position: relative;
                  
                }

                .wipe {
                  border: 2px solid #fff;
                  border-radius: 4px;
                  overflow: hidden;
                }

                .wipe {
                  -webkit-transition: color 0.3s ease-out;
                  transition: color 0.3s ease-out;
                }
                .wipe::after {
                  width: 100%;
                  height: 100%;
                  display: block;
                  background-color: #fff;
                  content: " ";
                  position: absolute;
                  top: 0;
                  -webkit-transition: -webkit-transform 0.2s cubic-bezier(0.215, 0.61, 0.355, 1);
                  transition: -webkit-transform 0.2s cubic-bezier(0.215, 0.61, 0.355, 1);
                  transition: transform 0.2s cubic-bezier(0.215, 0.61, 0.355, 1);
                  transition: transform 0.2s cubic-bezier(0.215, 0.61, 0.355, 1), -webkit-transform 0.2s cubic-bezier(0.215, 0.61, 0.355, 1);
                  -webkit-transform: translateY(34px);
                          transform: translateY(34px);
                  z-index: -1;
                }
                .wipe:hover {
                  color: #124a58;
                }
                .wipe:hover::after {
                  -webkit-transform: translateY(0px);
                          transform: translateY(0px);
                }

                .wrap {
                    height: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    float:right;
                    padding-right:50px;
                    padding-top: 30px;
                    padding-bottom: 10px;
                }

                .button {
                  width: 120px;
                  height: 40px;
                  font-family: 'Roboto', sans-serif;
                  font-size: 11px;
                  text-transform: uppercase;
                  letter-spacing: 2.5px;
                  font-weight: 500;
                  color: #000;
                  background-color: #fff;
                  border: none;
                  border-radius: 45px;
                  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                  transition: all 0.3s ease 0s;
                  cursor: pointer;
                  outline: none;
                }

                .button:hover {
                  background-color: #2EE59D;
                  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
                  color: #fff;
                  transform: translateY(-7px);
                }
               
            </style>
            <section>
                <!--for demo wrap-->
                <form action="delete_student_by_class" method="get">
                    <input type="hidden" name="id_class" value="<?php echo $id_class; ?>"/>
                    <h1>Danh sach sinh vien lop <?php echo $class; ?>
                        <section class="links">
                            </br></br>
                            <a class="link wipe" href="add_student_by_class?id_class=<?php echo $id_class?>">Thêm</a>
                        </section>
                    </h1>
                        <div class="tbl-header">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mã sinh viên</th>
                                        <th>Họ tên</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tbl-content">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                    <?php 
                                        if(isset($student)){

                                            for($i = 0; $i <count($student); $i++){
                                        ?>
                                                <tr>
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo $student[$i]['ma_sinh_vien']; ?></td>
                                                    <td><?php echo $student[$i]['ho_ten']; ?></td>
                                                    <td>
                                                        <div>
                                                            <label>
                                                                <input type="checkbox" class="option-input checkbox" name="<?php echo $student[$i]['id']?>"/>
                                                                    Xóa
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php 
                                            }
                                        }
                                        ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="wrap">
                            <button class="button">Xóa</button>
                        </div>
                </form>
            </section>
@endsection
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