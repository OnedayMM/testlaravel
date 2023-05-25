

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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- Styles -->
        <style>
                  .item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .item h3 {
            margin-top: 0;
        }
        .item p {
            margin-bottom: 5px;
        }
        </style>

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
          <div class="container">
            <div class="row">
            <div class="alert alert-info text-center">
                <strong>รายการสินค้า</strong>
              </div>
              @extends('layout')

              @section('content')
              @foreach($welcome as $product)
              <div class="w3-card-4 w3-yellow ">
                <div class="col-sm-3 item text-center" style="margin-bottom:50px;">
                  <img src="{{asset($product->image)}}" width="250px" height="250px"><br><br>
                 <p>ชื่อสินค้า : {{ $product->Pname }}</p>
                 <button class="btn btn-success">ซื้อ</button>
                </div>
              </div>

              @endforeach
              @stop
          </div>
    </body>
</html>