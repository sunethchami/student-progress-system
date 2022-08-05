<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <link href="/css/login/bootstrap.min.css" rel="stylesheet" />
    </head>
    
    <body>
        
        <div class="container">
            <div class="row" style="margin-top: 45px;">
                <div class="col-md-4 col-md-offset-4">
                    <h4>Login | Student Progress System </h4><hr>
                    <form action="{{ route('auth.check') }}" method="post">
                        
                        @if(Session::get('fail'))
                        <div class='alert alert-danger'>
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                        
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" value="{{ old('email')}}" placeholder="Enter email address">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter passsword">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Sign-in</button>
                        <br>
                        <a href="{{route('auth.register')}}">I don't have an account, create now</a>
                    </form>                    
                </div>                    
            </div>
        </div>
        
    </body>
</html>        
