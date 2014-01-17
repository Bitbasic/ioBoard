  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Future Status</h4>
      </div>
      <div class="modal-body">

      {{Form::open(array('url'=>'future-edit/'.$future->id,'role'=>'form','id'=>'future-edit-form','method'=>'put'))}}

      <div class="form-group">
       <label for="status">Status</label>
       {{Form::select('status',Config::get('contact.status'),$future->status, ['class'=>'form-control']);}}
     </div>

     <div class="form-group">
       <label for="comment">Comments</label>
       {{Form::text('comment',$future->comment, ['class'=>'form-control']);}}
     </div>

     <div class="form-group">
      <label for="leaving_date">Leaving Date/Time</label>
      <div class='input-group date' id='future-leave-date'>
        {{Form::text('leaving_date',($future->start_date) ? $future->start_date.' '.$future->start_time : '', ['class'=>'form-control']);}}
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>

    <div class="form-group">
      <label for="returning_date">Returning Date/Time</label>
      <div class='input-group date' id='future-return-date'>
        {{Form::text('returning_date',($future->end_date) ? $future->end_date.' '.$future->end_time : '', ['class'=>'form-control']);}}
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>


  </div>
  <div class="modal-footer">
    {{Form::submit('Save', array('class'=>'btn btn-success future-edit-save'))}}
    {{Form::close()}}
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</div>
</div>