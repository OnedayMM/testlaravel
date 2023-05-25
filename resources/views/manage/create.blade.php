

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
        

        <!-- Styles -->

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
                <div class="col-lg-12">
                    <h2 class="text-center">เพิ่มสมาชิก</h2>
                </div>
                <div>
                    <a href="{{ url('/manage')}}" class="btn btn-primary">back</a>
                </div>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
                @endif
                <form action="{{ url('/manage')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mt-4 col-md-12">
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" class="form-control" name="Name" placeholder="Name">
                                @error('Name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="email" class="form-control" name="Email" placeholder="Email">
                                @error('Email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Tel</strong>
                                <input type="text" class="form-control" name="Tel" placeholder="Tel">
                                @error('Tel')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Address</strong>
                                <textarea name="Address" class="form-control" id="Address" cols="30" rows="5"></textarea>
                                @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="mt-3 btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>