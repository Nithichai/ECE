@extends('layouts.app')
@section('content')
  @foreach($personal as $data)
    {{ Form::open(array('url'=>'/portfolio/' . $data->student_id, 'method'=>'put')) }}
    {{ csrf_field() }}
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-offset-5 col-sm-2"><h2>IMAGE</h2></div>
        </div>
      </div>
      <div class="container-fluid">
        <h4>Personal Data</h4>
        <div class="well">
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Name</p></div>
            <div class="col-xs-6 col-md-10">
              {{ Form::text('personal_name', $data->name) }}
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Surname</p></div>
            <div class="col-xs-6 col-md-10">
              {{ Form::text('personal_surname', $data->surname) }}
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Thailand ID</p></div>
            <div class="col-xs-6 col-md-10">
              {{ Form::text('personal_thailand_id', $data->thailand_id) }}
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Birthday</p></div>
            <div class="col-xs-6 col-md-10">
              {{ Form::date('personal_birthday', $data->birthday) }}
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Address</p></div>
            <div class="col-xs-6 col-md-10">
              {{ Form::text('personal_address', $data->address) }}
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Telephone</p></div>
            <div class="col-xs-6 col-md-10">
              {{ Form::text ('personal_telephone', $data->telephone) }}
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>facebook</p></div>
            <div class="col-xs-6 col-md-10">
              {{ Form::text('personal_facebook', $data->facebook) }}
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-2"><p>Line ID</p></div>
            <div class="col-xs-6 col-md-10">
              {{ Form::text('personal_line', $data->line) }}
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
                <div class="col-xs-6 col-md-10">
                  {{ Form::text('reward_name_' . $data_reward->id,
                      $data_reward->name) }}
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6 col-md-2"><p>Rank</p></div>
                <div class="col-xs-6 col-md-10">
                  {{ Form::text('reward_rank_' . $data_reward->id,
                      $data_reward->rank) }}
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6 col-md-2"><p>Received Date</p></div>
                <div class="col-xs-6 col-md-10">
                  {{ Form::text('reward_date_' . $data_reward->id,
                      $data_reward->date) }}
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6 col-md-2"><p>Received Place</p></div>
                <div class="col-xs-6 col-md-10">
                  {{ Form::text('reward_place_' . $data_reward->id,
                      $data_reward->place) }}
                </div>
              </div>
              @if(count($reward) > 1)
                <hr>
              @endif
            @endforeach
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-1">
              <input type="submit" value="OK" class="btn btn-success">
            </div>
            <div class="col-md-1">
              <a href="/portfolio/{{ $data->student_id }}" class="btn btn-danger">CANCEL</a>
            </div>
          </div>
        </div>
      </div>
    {{  Form::close() }}
  @endforeach
@endsection
