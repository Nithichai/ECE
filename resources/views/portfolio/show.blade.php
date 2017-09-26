@extends('layouts.app')
@section('content')
  @foreach($personal as $data)
    <div class="container-fluid">
      <h1>{{ $data->name }} {{$data->surname}}</h1>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-offset-5 col-sm-2"><h2>IMAGE</h2></div>
      </div>
    </div>
    <div class="container-fluid">
      <h4>Personal Data</h4>
      <div class="well">
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Student ID</p></div>
          <div class="col-xs-6 col-md-10"><p>{{$data->student_id}}</p></div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Thailand ID</p></div>
          <div class="col-xs-6 col-md-10"><p>{{$data->thailand_id}}</p></div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Birthday</p></div>
          <div class="col-xs-6 col-md-10"><p>{{$data->birthday}}</p></div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Address</p></div>
          <div class="col-xs-6 col-md-10"><p>{{$data->address}}</p></div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Telephone</p></div>
          <div class="col-xs-6 col-md-10"><p>{{$data->telephone}}</p></div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>facebook</p></div>
          <div class="col-xs-6 col-md-10"><p>{{$data->facebook}}</p></div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Line ID</p></div>
          <div class="col-xs-6 col-md-10"><p>{{$data->line}}</p></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="#" class="btn-group">Edit Personal</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <h4>Reward</h4>
        <div class="well">
          @foreach($reward as $data_reward)
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Reward Name</p></div>
            <div class="col-xs-6 col-md-10"><p>{{$data_reward->name}}</p></div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Rank</p></div>
            <div class="col-xs-6 col-md-10"><p>{{$data_reward->rank}}</p></div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Received Date</p></div>
            <div class="col-xs-6 col-md-10"><p>{{$data_reward->date}}</p></div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Received Place</p></div>
            <div class="col-xs-6 col-md-10"><p>{{$data_reward->place}}</p></div>
          </div>
          @endforeach
          <div class="row">
            <div class="col-md-12">
              <a href="#" class="btn-group">Edit Reward</a>
            </div>
          </div>
        </div>
      </div>
  @endforeach
@endsection
