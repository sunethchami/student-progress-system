@extends('layout')

@section('li1')
    <li>
@stop

@section('li2')
    <li class="active">
@stop

@section('li3')
    <li>
@stop

@section('li4')
    <li>
@stop

@section('title')
<a class="navbar-brand" href="javascript:;">Search</a> 
@stop

@section('main-content')
<div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Search Student Marks for a term</h5>
              </div>
              <div class="card-body">                
                  <form id="search" method="post" action="/students-details/search/students" onsubmit="return emptyValidation()">
                  {{ csrf_field() }}
                 <div class="row">
                    <div class=" col-md-6 pr-1">
                      <div class="form-group">
                        <label>Reg No</label>
                        <input type="number" name="reg_no" value="@if(isset($inputs)){{$inputs['reg_no']}}@endif" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-md-6 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="@if(isset($inputs)){{$inputs['name']}} @endif" class="form-control">
                        <span id="err_msg"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update">
                      <button type="submit" class="btn btn-primary btn-round btn-submit">Search</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@stop

@section('post-js')
<script>
    function emptyValidation(){
        var reg_no = document.getElementsByName("reg_no")[0].value;
        var name = document.getElementsByName("name")[0].value;
        
        if(reg_no == "" && name == ""){
            document.getElementById("err_msg").innerHTML = "Enter Reg No or Name to search a record.";
            document.getElementsByName("reg_no")[0].focus();
            return false;
        }else{
            return true;
        }        
    }
    
    window.onload = function() {
        
        @if(Session::has('message'))           
            
            @if (Session::get('message') == 4)

                var color = 'info'; 
                var icon = 'nc-icon nc-alert-circle-i';
                var msg = 'The record was not found'  

            @endif

            $.notify({
                icon: icon,
                message: msg

            }, {
                type: color,
                timer: 1000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        @endif
    }
</script>
@stop