<!doctype html>
<html lang="en">
    <head>
        <title>Register</title>
        <link href="/css/login/bootstrap.min.css" rel="stylesheet" />
    </head>
    
    <body>
        
        <div class="container">
            <div class="row" style="margin-top: 45px;">
                <div class="col-md-4 col-md-offset-4">
                    <h4>Register | Student Progress System </h4><hr>
                    <form action="{{route('auth.save')}}" method="post">
                        
                        @if(Session::get('success'))
                        <div class='alert alert-success'>
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        
                        @if(Session::get('fail'))
                        <div class='alert alert-danger'>
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                        
                        
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" value="{{ old('name')}}" placeholder="Enter full name">
                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                        </div>
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
                        
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input name="confirm_password" type="password" class="form-control" placeholder="Enter passsword again">                            
                            <span class="text-danger">@error('confirm_password'){{ $message }}@enderror</span>
                        </div>
                        
                        <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
                        <br>
                        <a href="{{route('auth.login')}}">I already have an account, sign in</a>
                    </form>                    
                </div>                    
            </div>
        </div>        
    </body>
</html>        