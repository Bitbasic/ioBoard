  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Set Status for {{$contact->name}}</h4>
      </div>
      <div class="modal-body">
        <a class="btn btn-default reset-status">I'm Back</a>
        <br>
        <br>
        {{Form::open(array('url'=>'status','role'=>'form','id'=>'status-form'))}}

        <div class="form-group">
         <label for="status">Status</label>
         {{Form::select('status',Config::get('contact.status'),$contact->status, ['class'=>'form-control']);}}
       </div>

       <div class="form-group">
         <label for="comment">Comments</label>
         {{Form::text('comment',$contact->comment, ['class'=>'form-control']);}}
       </div>

       <div class="form-group">
        <label for="returning_date">Returning Date/Time</label>
        <div class='input-group date' id='return-date'>
          {{Form::text('returning_date',($contact->returning_date) ? $contact->returning_date.' '.$contact->returning_time : '' , ['class'=>'form-control']);}}
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
      </div>

      {{Form::hidden('contact_id', $contact->id);}}

    </div>
    <div class="modal-footer">
      {{Form::close()}}
      <button class="btn btn-success status-save">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
  </div>
</div>



