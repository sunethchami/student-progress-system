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
<a class="navbar-brand" href="javascript:;">@if($page == "all") View All Records @else View Search Result @endif</a>
@stop

@section('main-content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Students Marks for a Term</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="display" id="allTable">
            <thead class=" text-primary">
              <th>Reg No</th>
              <th>Name</th>
              <th class="th-mark">Combined Maths</th>
              <th class="th-mark">Physics</th>
              <th class="th-mark">Chemistry</th>
              <th class="th-action">Actions</th>
            </thead>
            <tbody>
             
                @foreach ($results as $row)
                    <tr>
                    <td>{{$row->reg_no}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->combined_maths}}</td>
                    <td>{{$row->physics}}</td>
                    <td>{{$row->chemistry}}</td>
                    <td class="td-action"><p class="table-button"><a href="/students-details/{{$row->id}}/more-details/{{$page}}"><img src="/icons/info-circle.svg" width="32" height="32" title="More Details"></a></p><p class="table-button"><a href="/students-details/{{$row->id}}/edit/{{$page}}"><img src="/icons/pencil-square.svg" width="32" height="32" title="Edit"></a></p><p class="table-button"><a href="#" data-id="{{$row->id}}" data-toggle="modal" class="deleteBtn" data-target="#comfirmModal"><img src="/icons/trash.svg" width="32" height="32" title ="Delete"></a></p>
                    </tr>
                @endforeach
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="comfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete a Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure, do you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="yesBtn">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>              
            </div>
        </div>
    </div>
</div>
@stop

@section('post-js')
<script src="/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script>
   $(document).ready(function(){                
      
        $('.deleteBtn').click(function(){
            var ID = $(this).data('id');
            //set the data attribute on the modal button
            $('#yesBtn').data('id', ID); 
        });
        
        //var page = "<?php //echo $page; ?>";

        $('#yesBtn').click(function(){
            var studentId = $(this).data('id');
            window.location = "/students-details/"+studentId+"/delete";
        });
      
        $('#allTable').DataTable();
      
    });
    
     window.onload = function() {
        
        @if(Session::has('message'))
            @if (Session::get('message') == 2)

                var color = 'success'; 
                var icon = 'nc-icon nc-check-2';
                var msg = 'The record has been updated successfully.'   

            @endif
            
            @if (Session::get('message') == 3)

                var color = 'success'; 
                var icon = 'nc-icon nc-check-2';
                var msg = 'The record has been deleted successfully.'  

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