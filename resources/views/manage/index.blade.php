<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        

       
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand">Welcome</a>
              </div>
              <ul class="nav navbar-nav">
                <li class="active"><a href="/welcome">Home</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">setting<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('product.index') }}">จัดการสินค้า</a></li>
                      <li><a href="{{ url('/manage')}}">จัดการสมาชิก</a></li>
                    </ul>
                  </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              </ul>
            </div>
          </nav>
          <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 text-center">
                  <div class="alert alert-info text-center">
                    <strong>สมาชิก</strong>
                  </div>
                </div>
                <div>
                <a href="{{ url('/manage/create')}}" class="btn btn-success">add</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Address</th>
                    <th>action</th>
                </tr>
                @foreach($manage as $manage)
                <tr>
                  <td>{{ $manage->id}}</td>
                  <td>{{ $manage->Name}}</td>
                  <td>{{ $manage->Email}}</td>
                  <td>{{ $manage->Tel}}</td>
                  <td>{{ $manage->Address}}</td>
                  <td>
                    <form action="{{ url("manage/{$manage->id}") }}" method="POST">
                      <a href="{{ url("manage/{$manage->id}/edit") }}" class="btn btn-warning">Edit</a>
                      @csrf
                      @method('DELETE')
                    <button type="sumbit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach

            </table>
            

    </body>
</html>