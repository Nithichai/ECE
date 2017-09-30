@extends('layouts.app')
@section('content')
  {{ Form::open(array('url'=>'/portfolio', 'method'=>'post')) }}
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
          <div class="col-xs-6 col-md-2"><p>Studnet ID</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::text('student_id') }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Name</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::text('name') }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Surname</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::text('surname') }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Thailand ID</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::text('thailand_id') }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Birthday</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::date('birthday') }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Address</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::text('address') }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Telephone</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::text ('telephone') }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>facebook</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::text('facebook') }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-md-2"><p>Line ID</p></div>
          <div class="col-xs-6 col-md-10">
            {{ Form::text('line') }}
          </div>
        </div>
      </div>
    </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1">
            <input type="submit" value="OK" class="btn btn-success">
          </div>
          <div class="col-md-1">
            <a href="/portfolio" class="btn btn-danger">CANCEL</a>
          </div>
        </div>
      </div>
    </div>
  {{  Form::close() }}
@endsection
