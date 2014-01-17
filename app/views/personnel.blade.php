@extends('layout')

@section('title')
Contacts
@parent
@stop

@section('styles')
@parent
@stop

@section('content')
<div class="row">
  <div class="col-md-12 contact-table">
    @include('contact-table')
  </div>
</div>
@stop

@section('scripts')
<script>

$('.data-table').dataTable({
  "sDom": "<'row'<'col-sm-12'<'pull-right'f>r<'clearfix'>>>t<'row'<'col-sm-12'<'pull-left'i><'pull-right'p><'clearfix'>>>",
  "sPaginationType": "bs_normal",
  "iDisplayLength": 300,
  "oLanguage": {
    "sLengthMenu": "Show _MENU_ Rows",
    "sSearch": "Search"
  },
  "fnDrawCallback": function( oSettings ) {

  }
});



$('.date').datetimepicker({
  icons: {
    time: "fa fa-clock-o",
    date: "fa fa-calendar",
    up: "fa fa-arrow-up",
    down: "fa fa-arrow-down"
  }
});

$('.status').on('click',function(){

  $.get("{{URL::to('status')}}/"+$(this).attr('data-id'),function(data){

    $('.modal-container').modal().html(data);
    $('#return-date').datetimepicker();

    $('.status-save').on('click',function(){
      $('#status-form').submit();
    });

    $('.reset-status').on('click',function(){
      $('select[name="status"]').val('In');
      $('input[name="comment"]').val('');
      $('input[name="returning_date"]').val('');
      $('#status-form').submit();
    });

  });

});


$('.future-status').on('click',function(){

  $.get("{{URL::to('future')}}/"+$(this).attr('data-id'),function(data){

    $('.modal-container').modal().html(data);
    $('.date').datetimepicker();

    $('.future-save').on('click',function(){
      saveFuture();
    });

    $('.edit-future').on('click',function(){
      editFuture($(this).attr('data-id'));
    });

    $('.delete-future').on('click',function(){
      deleteFuture($(this).attr('data-id'),function(){

      });


    });

  });

});



function saveFuture () {
  $.post("{{URL::to('future')}}", $('#future-form').serialize(),function(data){
    $('.modal-container').modal().html(data);
    $('.date').datetimepicker();

    $('.edit-future').on('click',function(){
      editFuture($(this).attr('data-id'));
    });

    $('.delete-future').on('click',function(){
      deleteFuture($(this).attr('data-id'));
    });

  });
}


function editFuture (id) {
  $.get("{{URL::to('future-edit')}}/"+id,function(data){

    $('.modal-container').modal().html(data);
    $('.date').datetimepicker();

    $('.future-edit-save').on('click',function(){
      updateFuture(id);
    });

  });
}


function updateFuture (id) {
  $.ajax({
    url: "{{URL::to('future-edit')}}/"+id,
    type: 'PUT',
    data: $('#future-edit-form').serialize(),
    success: function(data) {
      $('.modal-container').modal().html(data);
      $('.date').datetimepicker();

      $('.future-save').on('click',function(){
        saveFuture();
      });

      $('.edit-future').on('click',function(){
        editFuture($(this).attr('data-id'));
      });

      $('.delete-future').on('click',function(){
        deleteFuture($(this).attr('data-id'));
      });
    }
  });
}


function deleteFuture (id) {
  $.ajax({
    url: "{{URL::to('future')}}/"+id,
    type: 'DELETE',
    success: function(data) {
      $('.modal-container').modal().html(data);
      $('.date').datetimepicker();

      $('.future-save').on('click',function(){
        saveFuture();
      });

      $('.edit-future').on('click',function(){
        editFuture($(this).attr('data-id'));
      });

      $('.delete-future').on('click',function(){
        deleteFuture($(this).attr('data-id'));
      });
    }
  });
}


</script>
@stop
