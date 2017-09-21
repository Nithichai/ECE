@extends('layouts.app')

@section('content')
  <div class="jumbotron text-center">
      <h1>ยินดีต้อนรับเข้าสู่</h1>
      <p>คณะวิศวกรรมศาสตร์ ภาควิชาวิศกรรมไฟฟ้าและคอมพิวเตอร์ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</p>
      @if (Auth::guest())
          <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
      @endif

  </div>
@endsection
