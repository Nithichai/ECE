@extends('layouts.app')

@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    window.onload = searchStudent('');
    function show_result_total(data) {
        document.getElementById('result_search').innerHTML = ""
        for (i = 0; i < data.personal.length; i++) {
          var payload = data.personal[i].split(" ")
          document.getElementById('result_search').innerHTML +=
            '<div class="row">' +
              '<div class="col-md-4 col-sm-4">' +
                'PICTURE' +
              '</div>' +
              '<div class="col-md-8 col-sm-8">' +
                '<h3>' + payload[1].toString() + '</h3>' +
                '<small>' + payload[0].toString() +'</small>' +
              '</div>' +
            '</div>'
        }
    }
    function searchStudent(search) {
      if (search.length == 0) {
        $.ajax({
          type : 'POST',
          url : '/portfolio',
          data: { '_token' : '<?php echo csrf_token() ?>', 'search' : null },
          success : function (data) {
            show_result_total(data)
          },
          error: function (data) {
            console.log(data)
          }
        })
      } else {
        $.ajax({
          type : 'POST',
          url : '/portfolio',
          data: { '_token' : '<?php echo csrf_token() ?>', 'search' : search },
          success : function (data) {
            show_result_total(data)
          },
          error: function (data) {
            console.log(data)
          }
        })
      }
    }
  </script>
  <h1>Portfolio</h1>
  <div class="form-group">
    Search <input onkeyup="searchStudent(this.value)" class="w3-input w3-border" type="text">
  </div>
  <div class="well" id="result_search"></div>
@endsection
