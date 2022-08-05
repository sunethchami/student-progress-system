@extends('layout')

@section('post-css')
<!-- Data tables -->
<link href="/css/jquery.dataTables.min.css" rel="stylesheet" />
@stop

@section('li1')
    <li>
@stop

@section('li2')
    <li @if($page == "search") class='active' @endif >
@stop

@section('li3')
    <li>
@stop

@section('li4')
    <li @if($page == "all")  class='active' @endif>
@stop

@section('title')
<a class="navbar-brand" href="javascript:;">More details</a>
@stop

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Student Marks for a Term</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead hidden>
                 <tr>
                 <th></th>
                 <th></th>
                 </tr>
            </thead>
            <tbody>
                <tr>
                <td><b>Reg No<b></td>
                <td>{{$result["reg_no"]}}</td>
                </tr>
                <tr>
                <td><b>Name<b></td>
                <td>{{$result["name"]}}</td>
                </tr>
                <tr>
                <td><b>Combined Maths<b></td>
                <td>{{$result["combined_maths"]}}</td>
                </tr>
                <tr>
                <td><b>Physics<b></td>
                <td>{{$result["physics"]}}</td>
                </tr>
                <tr>
                <td><b>Chemistry<b></td>
                <td>{{$result["chemistry"]}}</td>
                </tr>
                <tr>
                <td><b>Average Mark<b></td>
                <td>{{$result["avg_mark_student"]}}</td>
                </tr>
                <tr>
                <td><b>First Place Average Mark<b></td>
                <td>{{$result["avg_mark_first_place"]}}</td>
                </tr>
                <tr>
                <td><b>Total Number of Students<b></td>
                <td>{{$result["total_students"]}}</td>
                </tr>                                                                                                            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@stop