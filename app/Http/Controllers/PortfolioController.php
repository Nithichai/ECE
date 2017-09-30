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

    public function create() {
      return view('portfolio.create');
    }

    public function store(Request $req) {
      $this->createPersonal($req);
      $std_personal = $this->getStudentPersonal($req->input('student_id'));
      $std_reward = $this->getStudentReward($req->input('student_id'));
      return redirect('/portfolio/'. $req->input('student_id'))
        ->with('personal', $std_personal)
        ->with('reward', $std_reward);
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
      $std_personal = $this->getStudentPersonal($id);
      $this->updatePersonalEdit($id, $req);
      $std_reward = $this->getStudentReward($id);
      $this->updateRewardEdit($id, $req);
      return redirect('/portfolio/' . $id)
        ->with('personal', $std_personal)
        ->with('reward', $std_reward);
    }

    public function search(Request $req) {
      $search = $req->input('search');
      $std_personal = null;
      if ($search == null || count($search) < 1) {
        $std_personal = $this->getRandomStudentPersonal();
      } else {
        $std_personal = $this->getSomeStudentPersonal($search);
      }
      $array_std_personal = $this->changeToArrayForAJAX($std_personal);
      return response()->json(array('personal' => $array_std_personal), 200);
    }

    private function updateRewardEdit($id, Request $req) {
      $std_reward = $this->getStudentReward($id);
      foreach ($std_reward as $key=>$value) {
        echo $value->id;
        StudentReward
          ::where('id', $value->id)
          ->update([
            'name' => $req->input('reward_name_' . $value->id),
            'rank' => $req->input('reward_rank_' . $value->id),
            'date' => $req->input('reward_date_' . $value->id),
            'place' => $req->input('reward_place_' . $value->id),
          ]);
      }
    }

    private function updatePersonalEdit($id, Request $req) {
      $std_personal = $this->getStudentPersonal($id);
      StudentPersonal
        ::where('student_id', $id)
        ->update([
          'thailand_id' => $req->input('personal_thailand_id'),
          'name' => $req->input('personal_name'),
          'surname' => $req->input('personal_surname'),
          'birthday' => $req->input('personal_birthday'),
          'address' => $req->input('personal_address'),
          'telephone' => $req->input('personal_telephone'),
          'facebook' => $req->input('personal_facebook'),
          'line' => $req->input('personal_line'),
        ]);
    }

    private function createPersonal(Request $req) {
      StudentPersonal
        ::insert([[
          'student_id' => $req->input('student_id'),
          'thailand_id' => $req->input('thailand_id'),
          'name' => $req->input('name'),
          'surname' => $req->input('surname'),
          'birthday' => $req->input('birthday'),
          'address' => $req->input('address'),
          'telephone' => $req->input('telephone'),
          'facebook' => $req->input('facebook'),
          'line' => $req->input('line'),
        ]]);
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
