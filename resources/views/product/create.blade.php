

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
                    <h2 class="text-center">เพิ่มสินค้า</h2>
                </div>
                <div>
                    <a href="{{ route('product.index')}}" class="btn btn-primary">back</a>
                </div>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
                @endif
                <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mt-4 col-md-12">
                            <div class="form-group">
                                <strong>Product Name</strong>
                                <input type="text" class="form-control" name="Pname" placeholder="ProductName">
                                @error('Pname')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Product Image</strong>
                                <input type="file" class="form-control" name="image" placeholder="image">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div style="display:none">
                            <input type="text" class="form-control" name="Uid" placeholder="ProductName" value="U001">
                                @error('Uid')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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