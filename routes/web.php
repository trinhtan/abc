<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@homePage')->name('/');

Route::get('home_page', 'HomeController@homePage')->name('/');

Route::get('login_form',function(){

		return view('login.login');
});

Route::post('login', 'AdminController@login' );

Route::get('logout', 'AdminController@logout');

Route::get('home_admin', 'AdminController@homeAdmin');

Route::get('list_subject', 'AdminController@listSubject')->name('list_subject');

Route::get('edit_subject', 'AdminController@editSubject')->name('edit_subject');

Route::get('update_subject', 'AdminController@updateSubject')->name('update_subject');

Route::get('delete_subject', 'AdminController@deleteSubject')->name('delete_subject');

Route::get('add_subject', 'AdminController@addSubject')->name('add_subject');

Route::get('insert_subject', 'AdminController@insertSubject')->name('insert_subject');

Route::get('list_class', 'AdminController@listClass')->name('list_class');

Route::get('list_student_by_class', 'AdminController@listStudentByClassRequest')->name('list_student_by_class');

Route::get('add_student_by_class', 'AdminController@addStudentbyClass')->name('add_student_by_class');

Route::get('insert_student_by_class', 'AdminController@insertStudentByClass')->name('insert_student_by_class');

Route::get('delete_student_by_class', 'AdminController@deleteStudentByClass')->name('delete_student_by_class');

Route::get('add_class', 'AdminController@addClass')->name('add_class');

Route::get('insert_class', 'AdminController@insertClass')->name('insert_class');

Route::get('delete_class', 'AdminController@deleteClass')->name('delete_class');

Route::get('edit_class', 'AdminController@editClass')->name('edit_class');

Route::get('update_class', 'AdminController@updateClass')->name('update_class');

Route::get('list_class_by_subject', 'AdminController@listClassBySubject')->name('list_class_by_subject');

Route::get('list_student', 'AdminController@listStudent')->name('list_student');

Route::get('delete_student', 'AdminController@deleteStudent')->name('delele_student');

Route::get('edit_student', 'AdminController@editStudent')->name('edit_student');

Route::get('update_student', 'AdminController@updateStudent')->name('update_student');

Route::get('add_student', 'AdminController@addStudent')->name('add_student');

Route::get('insert_student', 'AdminController@insertStudent')->name('insert_student');

Route::get('list_room', 'AdminController@listRoom')->name('list_room');

Route::get('add_room', 'AdminController@addRoom')->name('add_room');

Route::get('insert_room', 'AdminController@insertRoom')->name('insert_room');

Route::get('edit_room', 'AdminController@editRoom')->name('edit_room');

Route::get('update_room', 'AdminController@updateRoom')->name('update_room');

Route::get('delete_room', 'AdminController@deleteRoom')->name('delete_room');

Route::get('scheduled', 'AdminController@scheduled')->name('scheduled');

Route::get('them_sinh_vien', 'AdminController@themSinhVien')->name('them_sinh_vien');

Route::get('them_lop_vao_sinh_vien', 'AdminController@themLopVaoSinhVien')->name('them_lop_vao_sinh_vien');

Route::get('list_student_by_group_home', 'HomeController@listStudentByGroupHome')->name('list_student_by_group_home');

Route::get('list_date', 'AdminController@listDate')->name('list_date');

Route::get('add_date', 'AdminController@addDate')->name('add_date');

Route::get('insert_date', 'AdminController@insertDate')->name('insert_date');

Route::get('edit_date', 'AdminController@editDate')->name('edit_date');

Route::get('update_date', 'AdminController@updateDate')->name('update_date');

Route::get('search', 'AdminController@search')->name('search');
