<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;

use Response;
use App\Lop;
use App\HocPhan;
use App\Phong;
use App\SinhVien;
use App\Nhom;
use App\Ngay;

class AdminController extends Controller
{
	public static function login(Request $request){

		$username = $request['username'];

		$password = $request['password'];


		if(Auth::attempt(['name'=>$username,'password'=>$password])){

			return redirect('list_subject');
		}
		else return view('login.login');

	}

	public static function logout(){

		Auth::logout();

        return redirect('/');
	}



	public static function homeAdmin(){

		return view('admin.index');
	}

	public static function listSubject(){

		$subject = HocPhan::all();

		return view('admin.list_subject', ['subject'=> $subject]);
	}

	public static function editSubject(Request $request){

		$id = $request['id'];

		$subject = HocPhan::where('id', $id)->first();

		$all_subject = HocPhan::all()->toArray();

		return view('admin.edit_subject', ['subject' => $subject, 'all_subject' => $all_subject]);
	}

	public static function updateSubject(Request $request){

		$id = $request['id'];

		$subject = HocPhan::where('id', $id)->first();

		$ma_hoc_phan = '';

		$ten_hoc_phan = '';

		if($request['ma_hoc_phan'] == NULL)	{

			$ma_hoc_phan = $subject['ma_hoc_phan'];
		}
		else { 
		
			$ma_hoc_phan = $request['ma_hoc_phan'];

		}

		if($request['ten_hoc_phan'] == NULL){

			$ten_hoc_phan = $subject['ten_hoc_phan'];
		} 
		else {
		
			$ten_hoc_phan = $request['ten_hoc_phan'];
		}

		echo $ma_hoc_phan;

		HocPhan::where('id', $id)->update(array('ma_hoc_phan'=>$ma_hoc_phan, 'ten_hoc_phan'=>$ten_hoc_phan));

		return redirect('list_subject');
	}

	public static function deleteSubject(Request $request){

		
		$subject = $request->toArray();

		foreach($subject as $key => $value){

			if($value == 'on'){

				$all_class = Lop::where('id_hoc_phan', $key)->get()->toArray();

				for($i = 0; $i < count($all_class); $i++){
					
					Nhom::where('id_lop', $all_class[$i]['id'])->delete();
				}

				Lop::where('id_hoc_phan', $key)->delete();

				HocPhan::where('id', $key)->delete();

			}
		}

		AdminController::scheduled();

		return redirect('list_subject');

	}

	public static function addSubject(){

		$subject = HocPhan::all()->toArray();

		return view('admin.add_subject', ['subject'=>$subject]);
	}

	public static function insertSubject(Request $request){

	 	$ma_hoc_phan = $request['ma_hoc_phan'];

	 	$ten_hoc_phan = $request['ten_hoc_phan'];

	 	$max_id = HocPhan::max('id');

	 	$id = $max_id + 1;

	 	$subject = new HocPhan;

	 	$subject->id = $id;

	 	$subject->ma_hoc_phan = $ma_hoc_phan;

	 	$subject->ten_hoc_phan = $ten_hoc_phan;

	 	$subject->save();

	 	return redirect('list_subject');
	}

	public static function listClass(){

		$class = Lop::all();

		for($i =0; $i < count($class); $i++){

			$class[$i]['ma_hoc_phan'] = HocPhan::find($class[$i]['id_hoc_phan'])->ma_hoc_phan;

			$class[$i]['ten_hoc_phan'] = HocPhan::find($class[$i]['id_hoc_phan'])->ten_hoc_phan;
		}


		return view('admin.list_class', ['class'=>$class]);
	}

	public static function listStudentByClassRequest(Request $request){

		$id_class = $request['id'];

		$id_class = (string)$id_class;
		
		return AdminController::listStudentByClass($id_class);

	}

	public static function listStudentByClass($id_class){

		$class = Lop::find($id_class)->ma_lop;

		$all_student = Lop::find($id_class)->danh_sach_sinh_vien;

		$all_student = explode(' ', $all_student);

		for($i = 0; $i <count($all_student); $i++){

			$student[$i]['id'] = $all_student[$i];

			$student[$i]['ma_sinh_vien'] = SinhVien::where('id', $student[$i]['id'])->value('ma_sinh_vien');

			$student[$i]['ho_ten'] = SinhVien::where('id', $student[$i]['id'])->value('ho_ten'); 
		}

	 	return view('admin.list_student_by_class', ['student' => $student, 'class' => $class, 'id_class' => $id_class]);
	
	}

	public static function addStudentByClass(Request $request){

		$id_class = $request['id_class'];

		$class = Lop::find($id_class)->ma_lop;

		$all_student = Lop::find($id_class)->ma_lop;

		$all_student = Lop::find($id_class)->danh_sach_sinh_vien;

		$all_student = explode(' ', $all_student);

		for($i = 0; $i <count($all_student); $i++){

			$student[$i]['id'] = $all_student[$i];

			$student[$i]['ma_sinh_vien'] = SinhVien::where('id', $student[$i]['id'])->value('ma_sinh_vien');

			$student[$i]['ho_ten'] = SinhVien::where('id', $student[$i]['id'])->value('ho_ten');
		}

		unset($all_student);
		
		$all_student = SinhVien::all();

		return view('admin.add_student_by_class',['all_student'=>$all_student, 'student_by_class'=>$student, 'class'=>$class, 'id_class'=>$id_class]);
	}

	public static function insertStudentByClass(Request $request){

		$id_class = $request['id_class'];

		$danh_sach_sinh_vien = Lop::where('id', $id_class)->value('danh_sach_sinh_vien');

		if($danh_sach_sinh_vien != ""){

			$danh_sach_sinh_vien .= " ";
		}


		$ma_sinh_vien = $request['ma_sinh_vien'];

		$ho_ten = $request['ho_ten'];

		$id_sinh_vien = SinhVien::where('ma_sinh_vien', $ma_sinh_vien)->value('id');

		if($id_sinh_vien != NULL){


			$danh_sach_sinh_vien .= $id_sinh_vien;

			Lop::where('id', $id_class)->update(array('danh_sach_sinh_vien' => $danh_sach_sinh_vien));

			$danh_sach_lop = SinhVien::where('id', $id_sinh_vien)->value('danh_sach_lop');

			$danh_sach_lop .= ' ';

			$danh_sach_lop .= $id_class;

			SinhVien::where('id', $id_sinh_vien)->update(array('danh_sach_lop' => $danh_sach_lop));
		}
		else {

			$id_sinh_vien_max = SinhVien::max('id');

			$id_sinh_vien = $id_sinh_vien_max + 1;

			$student = new SinhVien;

			$student->id = $id_sinh_vien;

			$student->ma_sinh_vien = $ma_sinh_vien;

			$student->ho_ten = $ho_ten;

			$student->danh_sach_lop = $id_class;

			$student->save();

			$danh_sach_sinh_vien .= $id_sinh_vien;

			Lop::where('id', $id_class)->update(array('danh_sach_sinh_vien' => $danh_sach_sinh_vien));
		}

		AdminController::scheduled();

		return AdminController::listStudentByClass($id_class);
	}

	public static function deleteStudentByClass(Request $request){

		$id_class = $request['id_class'];

		$danh_sach_sinh_vien = Lop::where('id', $id_class)->value('danh_sach_sinh_vien');

		$danh_sach_sinh_vien = explode(' ', $danh_sach_sinh_vien);

		$danh_sach_sinh_vien_moi = array();

		for($i = 0; $i <count($danh_sach_sinh_vien); $i++){

			if($request[$danh_sach_sinh_vien[$i]] == 'on'){

				$danh_sach_lop = SinhVien::where('id', $danh_sach_sinh_vien[$i])->value('danh_sach_lop');

				$danh_sach_lop = explode(' ', $danh_sach_lop);

				$danh_sach_lop_moi = array();

				for($j = 0; $j < count($danh_sach_lop); $j++){

					if($danh_sach_lop[$j] == $id_class) continue;

					else $danh_sach_lop_moi[] = $danh_sach_lop[$j];
				}

				$danh_sach_lop_moi = implode(' ',$danh_sach_lop_moi);

				SinhVien::where('id', $danh_sach_sinh_vien[$i])->update(array('danh_sach_lop'=>$danh_sach_lop_moi));

				continue;
			} 

			else $danh_sach_sinh_vien_moi[] = $danh_sach_sinh_vien[$i];
		}

		$danh_sach_sinh_vien_moi = implode(' ', $danh_sach_sinh_vien_moi);

		Lop::where('id', $id_class)->update(array('danh_sach_sinh_vien'=>$danh_sach_sinh_vien_moi));

		AdminController::scheduled();

		return AdminController::listStudentByClass($id_class);

	}

	public static function addClass(){

		$class = Lop::all()->toArray();

		$subject = HocPhan::all()->toArray();

		for($i = 0; $i < count($class); $i++){

			$class[$i]['ma_hoc_phan'] = HocPhan::where('id', $class[$i]['id_hoc_phan'])->value('ma_hoc_phan');
		
			$class[$i]['ten_hoc_phan'] = HocPhan::where('id', $class[$i]['id_hoc_phan'])->value('ten_hoc_phan');
		}

		return view('admin.add_class', ['class' => $class, 'subject'=>$subject]);
	}

	public static function insertClass(Request $request){

		$ma_lop = $request['ma_lop'];

		$id_hoc_phan = $request['id_hoc_phan'];

		$max_id = Lop::max('id');

		$id_class = $max_id + 1;

		$class = new Lop;

		$class->id = $id_class;

		$class->ma_lop = $ma_lop;

		$class->id_hoc_phan = $id_hoc_phan;

		$class->kip = '';

		$class->id_ngay = NULL;

		$class->save();

		return redirect('list_class');
	}

	public static function deleteClass(Request $request){

		$class = $request->toArray();

		foreach ($class as $key => $value) {
			
			if($value == 'on'){

				$all_student = SinhVien::all()->toArray();

				for($i = 0; $i < count($all_student); $i++){

					$danh_sach_lop = array();

					$danh_sach_lop = explode(' ', $all_student[$i]['danh_sach_lop']);

					$danh_sach_lop_moi = array();

					for($j = 0; $j < count($danh_sach_lop); $j++){

						if($danh_sach_lop[$j] == $key) continue;

						else $danh_sach_lop_moi[] = $danh_sach_lop[$j];
					}

					$danh_sach_lop_moi = implode(' ', $danh_sach_lop_moi);

					SinhVien::where('id', $all_student[$i]['id'])->update(array('danh_sach_lop' => $danh_sach_lop_moi));

					unset($danh_sach_lop);

					unset($danh_sach_lop_moi);
				}

				Nhom::where('id_lop', $key)->delete();

				Lop::where('id', $key)->delete();
			}

		}

		AdminController::scheduled();

		return redirect('list_class');
	}

	public static function editClass(Request $request){

		$id_class = $request['id'];

		$class = Lop::where('id', $id_class)->first();

		$class['ma_hoc_phan'] = HocPhan::where('id', $class['id_hoc_phan'])->value('ma_hoc_phan');

		$class['ten_hoc_phan'] = HocPhan::where('id', $class['id_hoc_phan'])->value('ten_hoc_phan');

		$subject = HocPhan::all()->toArray();

		$all_class = Lop::all()->toArray();

		return view('admin.edit_class', ['class' => $class, 'all_class' => $all_class, 'subject' => $subject]);
	}

	public static function updateClass(Request $request){

		$id_class = $request['id_class'];

		$id_hoc_phan = $request['id_hoc_phan'];

		$ma_lop = $request['ma_lop'];

		Lop::where('id', $id_class)->update(array('ma_lop'=>$ma_lop, 'id_hoc_phan'=>$id_hoc_phan));

		AdminController::scheduled();

		return redirect('list_class');
	}

	public static function listClassBySubject(Request $request){

		$id_hoc_phan = $request['id'];

		$subject = HocPhan::where('id', $id_hoc_phan)->first();

		$class = Lop::where('id_hoc_phan', $id_hoc_phan)->get()->toArray();

		return view('admin.list_class_by_subject', ['subject'=>$subject, 'class'=>$class]);

	}

	public static function listStudent(){

		$student = SinhVien::all();

		return view('admin.list_student', ['student' => $student]);
	}

	public static function deleteStudent(Request $request){

		$student = $request->toArray();

		foreach ($student as $key => $value) {
			
			if($value = 'on') {

				$danh_sach_lop = SinhVien::where('id', $key)->value('danh_sach_lop');

				$danh_sach_lop = explode(' ', $danh_sach_lop);

				for($i = 0; $i < count($danh_sach_lop); $i++){

					$danh_sach_sinh_vien = Lop::where('id', $danh_sach_lop[$i])->value('danh_sach_sinh_vien');

					$danh_sach_sinh_vien = explode(' ',$danh_sach_sinh_vien);

					$danh_sach_sinh_vien_moi = array();

					for($j = 0; $j < count($danh_sach_sinh_vien); $j++){

						if($danh_sach_sinh_vien[$j] == $key) continue;

						else $danh_sach_sinh_vien_moi[] = $danh_sach_sinh_vien[$j];
					}

					$danh_sach_sinh_vien_moi = implode(' ', $danh_sach_sinh_vien_moi);

					Lop::where('id', $danh_sach_lop[$i])->update(array('danh_sach_sinh_vien'=>$danh_sach_sinh_vien_moi));
				}

				SinhVien::where('id', $key)->delete();
			}
		}

		AdminController::scheduled();

		return redirect('list_student');
	}

	public static function editStudent(Request $request){

		$id_sinh_vien = $request['id'];

		$student = SinhVien::where('id', $id_sinh_vien)->first();

		$all_student = SinhVien::all()->toArray();

		return view('admin.edit_student', ['student'=>$student, 'all_student'=>$all_student]);

	}

	public static function updateStudent(Request $request){

		$id_sinh_vien = $request['id'];

		$ma_sinh_vien = $request['ma_sinh_vien'];

		$ho_ten = $request['ho_ten'];

		SinhVien::where('id', $id_sinh_vien)->update(array('ma_sinh_vien'=>$ma_sinh_vien, 'ho_ten'=>$ho_ten));

		return redirect('list_student');
	}

	public static function addStudent(){

		$all_student = SinhVien::all()->toArray();

		return view('admin.add_student', ['all_student' => $all_student]);
	}

	public static function insertStudent(Request $request){

		$id_max = SinhVien::max('id');

		$id_sinh_vien = $id_max + 1;

		$ma_sinh_vien = $request['ma_sinh_vien'];

		$ho_ten = $request['ho_ten'];

		$student = new SinhVien;

		$student->id = $id_sinh_vien;

		$student->ma_sinh_vien = $ma_sinh_vien;

		$student->ho_ten = $ho_ten;

		$student->danh_sach_lop = '';

		$student->save();

		return redirect('list_student');

	}

	public static function listRoom(){

		$room = Phong::all()->toArray();

		return view('admin.list_room', ['room' => $room]);
	}

	public static function addRoom(){

		$all_room = Phong::all()->toArray();

		return view('admin.add_room',['all_room' => $all_room]);
	}

	public static function insertRoom(Request $request){

		$ten_phong = $request['ten_phong'];

		$suc_chua = (int)($request['suc_chua']);

		$id_max = Phong::max('id');

		$id = $id_max + 1;

		$room = new Phong;

		$room->id = $id;

		$room->ten_phong = $ten_phong;

		$room->suc_chua = $suc_chua;

		$room->save();

		AdminController::scheduled();

		return redirect('list_room');
	}

	public static function editRoom(Request $request){

		$id_room = $request['id'];

		$room = Phong::where('id', $id_room)->first();

		$all_room = Phong::all()->toArray();

		return view('admin.edit_room', ['room'=>$room, 'all_room' => $all_room]);
	}

	public static function updateRoom( Request $request){

		$id_room = $request['id'];

		$ten_phong = $request['ten_phong'];

		$suc_chua = $request['suc_chua'];

		Phong::where('id', $id_room)->update(array('ten_phong' => $ten_phong, 'suc_chua' => $suc_chua));

		AdminController::scheduled();

		return redirect('list_room'); 
	}

	public static function deleteRoom( Request $request){

		$room = $request->toArray();

		foreach ($room as $key => $value) {
			
			if($value == 'on'){

				Nhom::where('id_phong', $key)->update(array('id_phong' => NULL));

				Phong::where('id', $key)->delete();
				
			}
		}

		AdminController::scheduled();

		return redirect('list_room');
	}

	public static function listDate(){

		$all_date = Ngay::all()->toArray();

		return view('admin.list_date', ['all_date' => $all_date]);
	}

	public static function addDate(){

		$date_max= Ngay::max('ngay_thi_thu');

		$date_max++;

		return view('admin.add_date', ['datemax' => $date_max]);
	}

	public static function insertDate(Request $request){

		$id_max = Ngay::max('id');

		$id = $id_max + 1;

		$ngay= $request['date'];

		$ngay_thi_thu = Ngay::max('ngay_thi_thu');

		$ngay_thi_thu++;

		$date = new Ngay();

		$date->id = $id;

		$date->ngay_thi_thu = $ngay_thi_thu;

		$date->ngay = $ngay;

		$date->save();

		return redirect('list_date');
	}

	public static function editDate(Request $request){

		$id = $request['id'];

		$date = Ngay::where('id', $id)->get()->toArray();

		return view('admin.edit_date', ['date' => $date]);
	}

	public static function updateDate(Request $request){

		$id = $request['id'];

		$ngay_thi_thu = $request['ngay_thi_thu'];

		$ngay = $request['ngay'];

		Ngay::where('id', $id)->update(array('ngay'=>$ngay));

		return redirect('list_date');
	}

	public static function scheduled(){

		$all_group = Nhom::all()->toArray();

		for($i = 0; $i < count($all_group); $i++){

			Nhom::where('id', $all_group[$i]['id'])->delete();

		}

		$all_subject = HocPhan::all()->toArray();

		for($i = 0; $i <count($all_subject); $i++){

			$all_subject[$i]['danh_sach_sinh_vien'] = array();

			$danh_sach_lop = Lop::where('id_hoc_phan', $all_subject[$i]['id'])->get()->toArray();

			for($j = 0; $j < count($danh_sach_lop); $j++){

				$all_subject[$i]['danh_sach_lop'][] = $danh_sach_lop[$j]['id'];

				$all_subject[$i]['danh_sach_sinh_vien'][] = Lop::where('id', $danh_sach_lop[$j]['id'])->value('danh_sach_sinh_vien');

			}

			$all_subject[$i]['danh_sach_sinh_vien'] = implode(' ', $all_subject[$i]['danh_sach_sinh_vien']);

			$all_subject[$i]['danh_sach_sinh_vien'] = explode(' ', $all_subject[$i]['danh_sach_sinh_vien']);

			unset($danh_sach_lop);	
		}

		$table = AdminController::createTable($all_subject);

		for($i = 0; $i < count($all_subject); $i++){

			unset($all_subject[$i]['danh_sach_sinh_vien']);

			unset($all_subject[$i]['id']);

			unset($all_subject[$i]['ten_hoc_phan']);

			unset($all_subject[$i]['ma_hoc_phan']);

		}

		$result = AdminController::tincture( $table, $all_subject);

		$id = 1;

		for($i = 0; $i < count($result); $i++){

			$kip =	($i%4) + 1;

			$ngay_thi_thu = (int)($i/4) + 1;

			$id_ngay = Ngay::where('ngay_thi_thu', $ngay_thi_thu)->value('id');
			
			for($j = 0; $j < count($result[$i]); $j++){

				Lop::where('id', $result[$i][$j]['id_lop'])->update(array('kip' => $kip, 'id_ngay' => $id_ngay));
			
				$nhom = new Nhom;

				$nhom->id = $id;

				$nhom->nhom = $result[$i][$j]['nhom'];

				$nhom->id_lop = $result[$i][$j]['id_lop'];

				$nhom->danh_sach_sinh_vien = $result[$i][$j]['danh_sach_sinh_vien'];

				$nhom->id_phong = $result[$i][$j]['id'];

				$nhom->save();

				$id++;
			}
		}

	}

	public static function createTable($all_subject){

		$array = array();

		for($i = 0; $i < count($all_subject); $i++){

			$array[$i][$i] = 0;

			for( $j = $i+1; $j < count($all_subject); $j++){

				$check = array();

				$check = array_intersect($all_subject[$i]['danh_sach_sinh_vien'], $all_subject[$j]['danh_sach_sinh_vien']);

				if( count($check) > 0){

					$array[$i][$j] = $array[$j][$i] = 1;
				}

				else $array[$i][$j] = $array[$j][$i] = 0;
			}
		}
		return $array;
	}

	public static function tincture($array, $all_subject ){

		$all_room = Phong::all()->toArray();

		$all_room = AdminController::sortRoomByDisk($all_room);

		$n = count($array);

		$color = array();

		$numColor = 1;

		$rank = array(); 

		for($i = 0; $i < $n; $i++){
			
			$color[$i] = -1;

			$rank[$i] = 0;

			for($j = 0; $j < $n; $j++){

				$rank[$i] += $array[$i][$j];
			}
			
		}

		asort($rank);

		$key_rank = array_keys($rank);

		$temp_color = array();

		$result = array();
		
			for($m = count($key_rank) -1; $m >= 0; $m--){

				$node = $m;

				if($color[$node] == -1 ){

					$color[$node] = $numColor;

					$temp_color[$numColor][] = $node; 

					$temp = array();

					$temp_result = array();

					$temp_result = $all_room;

					unset($subject);

					$subject = array();

					$subject = $all_subject[$node];

					$temp_subject = $subject;

					$temp_result = AdminController::sortedInRoom($all_room, $subject);

					for($i = 0; $i < $n; $i++){

						if($array[$node][$i] == 0){

							$flag = true;

							for($j = 0;  $j < count($temp_color[$numColor]); $j++ ){

								$k = $temp_color[$numColor][$j];

								if( $array[$i][$k] == 1 ){

									$flag = false;

									break;
								}
							}

							if( $flag == false ) continue;

							else{
	
								if( $color[$i] == -1 ){

									$temp_subject = $subject;

									$subject = AdminController::totalClassByNode($subject, $all_subject[$i]);

									unset($temp);

									$temp = array();

									$temp = AdminController::sortedInRoom($all_room, $subject);

									if($temp == $all_room){

										$subject = $temp_subject;

										continue;
									}

									else{

										unset($temp_result);

										$temp_result = $temp;
									
										$color[$i] = $numColor;
									
										$node = $i;
									
										$temp_color[$numColor][$j] = $i;
									}
								}
								else continue;
							} 
							
						}else continue;
					}

					$numColor++;

					$result[] = $temp_result;
				}
				else continue;
			}

		return $result;
	}

	public static function sortedInRoom($temp_all_room, $subject){

		$temp = array();

		$temp = $temp_all_room;

		$danh_sach_lop = array();

		for($i = 0; $i < count($subject); $i++){

			$danh_sach_lop = $subject['danh_sach_lop'];
		}

		$flag = true;

		$danh_sach_sinh_vien_theo_lop = array();

		for($i = 0; $i < count($danh_sach_lop); $i++){

			$danh_sach_sinh_vien_theo_lop[$i]['id'] = $danh_sach_lop[$i];

			$danh_sach_sinh_vien_theo_lop[$i]['danh_sach_sinh_vien'] = Lop::where('id', $danh_sach_lop[$i])->value('danh_sach_sinh_vien');

			$danh_sach_sinh_vien_theo_lop[$i]['danh_sach_sinh_vien'] = explode(' ', $danh_sach_sinh_vien_theo_lop[$i]['danh_sach_sinh_vien']);

		}

		$danh_sach_sinh_vien_theo_lop = AdminController::sortClassByNumberStudent($danh_sach_sinh_vien_theo_lop);

		$result = array();

		while (1) {
			
			$class = array_pop($danh_sach_sinh_vien_theo_lop);

			if($class == NULL) break;

			else{

				$room = array_pop($temp_all_room);

				if($room == NULL ) return $temp;

				else{

					if($room['suc_chua'] >= count($class['danh_sach_sinh_vien'])){

						$room['id_lop'] = $class['id'];

						$room['danh_sach_sinh_vien'] = $class['danh_sach_sinh_vien'];

						$room['danh_sach_sinh_vien'] = implode(' ',$room['danh_sach_sinh_vien']);

						$room['nhom'] = AdminController::countNumberGroupOfClass($result, $room['id_lop']) + 1;

						$result[] = $room;

					}
					else {

						$room['id_lop'] = $class['id'];

						$danh_sach_sinh_vien_cua_phong = array();

						for($i = 0; $i < $room['suc_chua']; $i++){

							$danh_sach_sinh_vien_cua_phong[] = $class['danh_sach_sinh_vien'][$i];
						}

						$room['danh_sach_sinh_vien'] = implode(' ', $danh_sach_sinh_vien_cua_phong);

						$room['nhom'] = AdminController::countNumberGroupOfClass($result, $room['id_lop']) + 1;

						$result[] = $room;

						$danh_sach_sinh_con_lai = array();

						for($i = $room['suc_chua']; $i < count($class['danh_sach_sinh_vien']); $i++){

							$danh_sach_sinh_con_lai[] = $class['danh_sach_sinh_vien'][$i];
						}

						unset($class['danh_sach_sinh_vien']);

						$class['danh_sach_sinh_vien'] = $danh_sach_sinh_con_lai;

						$danh_sach_sinh_vien_theo_lop[] = $class;

						$danh_sach_sinh_vien_theo_lop = AdminController::sortClassByNumberStudent($danh_sach_sinh_vien_theo_lop);

					}
				}

			}

		}

		return $result;

	}

	public static function checkAllRoom($temp_all_room){

		for($i = 0; $i < count($temp_all_room); $i++){

			if($temp_all_room[$i]['flag'] == false) return false;

		}

		return true;
	}

    // Đếm số nhóm của lớp
	public static function countNumberGroupOfClass($all_room, $id_lop){

		$so_nhom = 0;

		for($i = 0; $i < count($all_room); $i++){

			if(isset($all_room[$i]['id_lop']) && $all_room[$i]['id_lop'] == $id_lop){

				$so_nhom++;
			}
		}

		return $so_nhom;
	}

	public static function findFirstRoomOfClass($temp_all_room){

		$phong_dau_cua_lop = 0;

		for($i = 0; $i < count($temp_all_room); $i++){

			if($temp_all_room[$i]['flag'] == false){

				$phong_dau_cua_lop = $i;

				break;
			}

			else continue;

		}

		return $phong_dau_cua_lop;

	}

	public static function totalClassByNode($subject_a, $subject_b){

		for($i = 0; $i < count($subject_b['danh_sach_lop']); $i++){

			$subject_a['danh_sach_lop'][] = $subject_b['danh_sach_lop'][$i];
		}

		return $subject_a;

	}


    // Danh sách lớp theo số sinh viên của lớp
	public static function sortClassByNumberStudent($danh_sach_sinh_vien_theo_lop){

		for($i = 0; $i < count($danh_sach_sinh_vien_theo_lop); $i++){

			for( $j = 1; $j < count($danh_sach_sinh_vien_theo_lop); $j++){

				if(count($danh_sach_sinh_vien_theo_lop[$j]['danh_sach_sinh_vien']) < count($danh_sach_sinh_vien_theo_lop[$j - 1]['danh_sach_sinh_vien'])){

					$temp = $danh_sach_sinh_vien_theo_lop[$j];

					$danh_sach_sinh_vien_theo_lop[$j] = $danh_sach_sinh_vien_theo_lop[$j - 1];

					$danh_sach_sinh_vien_theo_lop[$j - 1] = $temp;
				}
			}
		}

		return $danh_sach_sinh_vien_theo_lop;

	}

    //Xếp danh sách phòng theo sức chứa
	public static function sortRoomByDisk($all_room){

		for($i = 0; $i < count($all_room); $i++){

			for($j = 1 ; $j < count($all_room); $j++){

				if($all_room[$j]['suc_chua'] < $all_room[$j - 1]['suc_chua']){

					$temp = $all_room[$j];

					$all_room[$j] = $all_room[$j - 1];

					$all_room[$j - 1] = $temp;
				}

			}
		}

		return $all_room;
	}

	public static function search(Request $request){

		$result = array();

		$ma_sinh_vien = $request['ma_sinh_vien'];

		$sinh_vien = SinhVien::where('ma_sinh_vien', $ma_sinh_vien)->first();

		if($sinh_vien == NULL) return redirect('home_page');

		$danh_sach_lop = SinhVien::where('ma_sinh_vien', $ma_sinh_vien)->value('danh_sach_lop');

		$danh_sach_lop = explode(' ', $danh_sach_lop);

		for($i = 0; $i < count($danh_sach_lop); $i++){

			$nhom = Nhom::where('id_lop', $danh_sach_lop[$i])->get()->toArray();

			for($j = 0; $j < count($nhom); $j++){

				$flag = false;

				$danh_sach_sinh_vien = explode(' ', $nhom[$j]['danh_sach_sinh_vien']);

				for($k = 0; $k < count($danh_sach_sinh_vien); $k++){

					if($sinh_vien['id'] == $danh_sach_sinh_vien[$k]){

						$result[] = $nhom[$j];

						$flag = true;

						break;
					}
				}

				if($flag == true) break;
			} 
		}

		for($i = 0; $i < count($result); $i++){

			$result[$i]['ma_lop'] = Lop::where('id', $result[$i]['id_lop'])->value('ma_lop');

			$result[$i]['kip'] = Lop::where('id', $result[$i]['id_lop'])->value('kip');

			$id_hoc_phan= Lop::where('id', $result[$i]['id_lop'])->value('id_hoc_phan');

			$result[$i]['ma_hoc_phan'] = HocPhan::where('id', $id_hoc_phan)->value('ma_hoc_phan');

			$result[$i]['ten_hoc_phan'] = HocPhan::where('id', $id_hoc_phan)->value('ten_hoc_phan');

			$result[$i]['ten_phong'] = Phong::where('id', $result[$i]['id_phong'])->value('ten_phong');

			$id_ngay = lop::where('id', $result[$i]['id_lop'])->value('id_ngay');

			$result[$i]['ngay'] = Ngay::where('id', $id_ngay)->value('ngay');
		}

		return view('student.result_search', ['nhom'=>$result, 'student' => $sinh_vien]);
	}

	public static function themSinhVien(){

		for($i = 92; $i <= 240; $i++){

			$sinh_vien = new SinhVien;

			$sinh_vien->id = $i;

			$sinh_vien->ma_sinh_vien = 'SV'.$i;

			$sinh_vien->ho_ten = 'Nguyễn Văn '.$i;

			$sinh_vien->danh_sach_lop = '';

			$sinh_vien->save();
		}
	}

	public static function themLopVaoSinhVien(){

		$all_class = Lop::all()->toArray();

		for($i = 0; $i < count($all_class); $i++){

			$all_class[$i]['danh_sach_sinh_vien'] = explode(' ', $all_class[$i]['danh_sach_sinh_vien']);

			for($j = 0; $j < count($all_class[$i]['danh_sach_sinh_vien']); $j++){

				$danh_sach_lop = SinhVien::where('id', $all_class[$i]['danh_sach_sinh_vien'][$j])->value('danh_sach_lop');

				$danh_sach_lop .= " ";

				$danh_sach_lop .= $all_class[$i]['id'];

				SinhVien::where('id', $all_class[$i]['danh_sach_sinh_vien'][$j])->update(array('danh_sach_lop' =>$danh_sach_lop));
			}
		}
	}
}