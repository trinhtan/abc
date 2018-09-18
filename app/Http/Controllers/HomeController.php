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

class HomeController extends Controller
{
	public static function homePage(){

		$nhom = Nhom::all()->toArray();

		for($i = 0; $i < count($nhom); $i++){

			$nhom[$i]['ma_lop'] = Lop::where('id', $nhom[$i]['id_lop'])->value('ma_lop');

			$nhom[$i]['kip'] = Lop::where('id', $nhom[$i]['id_lop'])->value('kip');

			$id_hoc_phan= Lop::where('id', $nhom[$i]['id_lop'])->value('id_hoc_phan');

			$nhom[$i]['ma_hoc_phan'] = HocPhan::where('id', $id_hoc_phan)->value('ma_hoc_phan');

			$nhom[$i]['ten_hoc_phan'] = HocPhan::where('id', $id_hoc_phan)->value('ten_hoc_phan');

			$nhom[$i]['ten_phong'] = Phong::where('id', $nhom[$i]['id_phong'])->value('ten_phong');

			$id_ngay = lop::where('id', $nhom[$i]['id_lop'])->value('id_ngay');

			$nhom[$i]['ngay'] = Ngay::where('id', $id_ngay)->value('ngay');
		}

		for($i = 0; $i < count($nhom); $i++){

			for($j = 1; $j < count($nhom); $j++){

				if($nhom[$j]['id_lop'] < $nhom[$j-1]['id_lop']){

					$temp = $nhom[$j];

					$nhom[$j] = $nhom[$j-1];

					$nhom[$j-1] = $temp;
				}
			}
		}

		return view('student.home_page', ['nhom' => $nhom]);
	}

	public static function listStudentByGroupHome(Request $request){

		$id_group = $request['id_group'];

		$id_class = Nhom::where('id', $id_group)->value('id_lop');

		$class = Lop::where('id', $id_class)->value('ma_lop');

		$group = Nhom::where('id', $id_group)->value('nhom');

		$all_student = Nhom::where('id', $id_group)->value('danh_sach_sinh_vien');

		$all_student = explode(' ', $all_student);

		$student = array();

		for($i = 0; $i < count($all_student); $i++){

			$student[$i]['id'] = $all_student[$i];

			$student[$i]['ma_sinh_vien'] = SinhVien::where('id', $student[$i]['id'])->value('ma_sinh_vien');

			$student[$i]['ho_ten'] = SinhVien::where('id', $student[$i]['id'])->value('ho_ten'); 
		}

		return view('student.list_student_by_group_home', ['all_student' => $student, 'class' => $class, 'group'=> $group]);
	}
}
