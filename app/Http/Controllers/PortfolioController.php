<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentPersonal;
use App\StudentReward;
use URL;

class PortfolioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'store']]);
    }

    public function index() {
      return view('portfolio.index');
    }

    public function store(Request $req) {
      $search = $req->input('search');
      $std_personal = null;
      if ($search == null) {
        $std_personal = $this->getRandomStudentPersonal();
      } else {
        $std_personal = $this->getSomeStudentPersonal($search);
      }
      $array_std_personal = $this->changeToArrayForAJAX($std_personal);
      return response()->json(array('personal' => $array_std_personal), 200);
    }

    public function show($id) {
      $std_personal = $this->getStudentPersonal($id);
      $std_reward = $this->getStudentReward($id);
      return view('portfolio.show')
        ->with('personal', $std_personal)
        ->with('reward', $std_reward);
    }

    public function edit($id) {
      $std_personal = $this->getStudentPersonal($id);
      $std_reward = $this->getStudentReward($id);
      return view('portfolio.edit')
        ->with('personal', $std_personal)
        ->with('reward', $std_reward);
    }

    public function update(Request $req, $id) {
      print_r($req);
      $std_personal = $this->getStudentPersonal($id);
      $this->updatePersonalEdit($id, $req);
      $std_reward = $this->getStudentReward($id);
      $this->updateRewardEdit($req);
      // $this->show($id);
      return view('portfolio.edit')
        ->with('personal', $std_personal)
        ->with('reward', $std_reward);
    }

    private function updateRewardEdit(Request $req) {
      $std_reward = $this->getStudentReward($id);
      foreach ($std_reward as $key=>$value) {
        StudentReward
          ::where('id', $value->id)
          ->update([
            'name' => $req->name('reward_name'),
            'rank' => $req->name('reward_rank'),
            'date' => $req->name('personal_date'),
            'place' => $req->name('personal_place'),
          ]);
      }
    }

    private function updatePersonalEdit($std_personal, $id, Request $req) {
      $std_personal = $this->getStudentPersonal($id);
      StudentPersonal
        ::where('student_id', $id)
        ->update([
          'thailand_id' => $req->name('personal_thailand_id'),
          'name' => $req->name('personal_name'),
          'surname' => $req->name('personal_surname'),
          'birthday' => $req->name('personal_birthday'),
          'address' => $req->name('personal_address'),
          'telephone' => $req->name('personal_telephone'),
          'facebook' => $req->name('personal_facebook'),
          'birthday' => $req->name('personal_line'),
        ]);
    }

    private function getStudentReward($id) {
      $payload = StudentReward
        ::where('student_id', $id)
        ->select(
          'id',
          'student_id',
          'name',
          'rank',
          'date',
          'place')
        ->get();
      return $payload;
    }

    private function getStudentPersonal($id) {
      $payload = StudentPersonal
        ::where('student_id', $id)
        ->select(
          'student_id',
          'thailand_id',
          'name',
          'surname',
          'birthday',
          'address',
          'telephone',
          'facebook',
          'line')
        ->get();
      return $payload;
    }

    private function getSomeStudentPersonal($search) {
      $payload = StudentPersonal
        ::where('student_id', 'like' , '%' . $search . '%')
        ->orWhere('name', 'like' , '%' . $search . '%')
        ->limit(20)
        ->select('name', 'student_id')
        ->get();
      return $payload;
    }

    private function getRandomStudentPersonal() {
      $payload = StudentPersonal::inRandomOrder()
        ->where('name', '<>' , null)
        ->limit(20)
        ->select('name', 'student_id')
        ->get();
      return $payload;
    }

    private function changeToArrayForAJAX($object) {
      $arr = array();
      foreach ($object as $key=>$value) {
        array_push($arr, "{$value->student_id} {$value->name}");
      }
      return $arr;
    }
}
