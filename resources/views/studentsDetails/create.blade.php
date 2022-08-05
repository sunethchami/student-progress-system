@extends('layout')

@section('li1')
    <li>
@stop

@section('li2')
    <li>
@stop

@section('li3')
    <li class="active">
@stop

@section('li4')
    <li>
@stop

@section('title')
<a class="navbar-brand" href="javascript:;">Add New Records</a>  
@stop

@section('main-content')
<div class="row">          
  <div class="col-md-12">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Add Student Marks for a Term</h5>
      </div>
      <div class="card-body">
        <form id="add_new_records_form" method="post" action="/students-details">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Reg No</label>
                <input type="number" name="reg_no" class="form-control" value="{{old('reg_no')}}">
                <span>
                @error('reg_no')
                    {{ $message }}
                @enderror
                </span>
              </div>
            </div>  
          </div>
          <div class="row">
            <div class=" col-md-6 pr-1">
              <div class="form-group">
                  <label>Name<span> *</span></label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                <span>
                @error('name')
                    {{ $message }}
                @enderror
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class=" col-md-6 pr-1">
              <div class="form-group">
                <label>Combined Maths<span> *</span></label>
                <input type="number" name="combined_maths" class="form-control" value="{{old('combined_maths')}}">
                <span>
                    @error('combined_maths')
                    {{ $message }}
                    @enderror
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class=" col-md-6 pr-1">
              <div class="form-group">
                <label>Physics<span> *</span></label>
                <input type="number" name="physics" class="form-control" value="{{old('physics')}}">
                <span>
                    @error('physics')
                    {{ $message }}
                    @enderror
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class=" col-md-6 pr-1">
              <div class="form-group">
                <label>Chemistry<span> *</span></label>
                <input type="number" name="chemistry" class="form-control" value="{{old('chemistry')}}">
                <span>
                    @error('chemistry')
                    {{ $message }}
                    @enderror
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update">
              <button type="submit" class="btn btn-primary btn-round btn-submit">Save Record</button>
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
    window.onload = function() {
        
        @if(Session::has('message'))
            @if (Session::get('message') == 1)

               var color = 'success'; 
               var icon = 'nc-icon nc-check-2';
               var msg = 'The record has been updated successfully.';   

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