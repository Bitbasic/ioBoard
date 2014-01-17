  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Future Statuses for {{$contact->name}}</h4>
      </div>
      <div class="modal-body">
       <table class="table table-bordered table-striped">
        <thead>
          <th>Status</th>
          <th>Leaving</th>
          <th>Returning</th>
          <th>Comments</th>
          <th></th>
        </thead>


        @if(count($futures) == 0)
        <tr>
          <td colspan="5">No Future Statuses Found</td>
        </tr>
        @else
        @foreach($futures as $future)
        <tr>
          <td>{{$future->status}}</td>
          <td>{{$future->start_date}} <br>@ {{$future->start_time}}</td>
          <td>{{$future->end_date}} <br>@ {{$future->end_time}}</td>
          <td>{{$future->comment}}</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-default edit-future" data-id="{{$future->id}}">Edit</button>
              <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a class="delete-future" data-id="{{$future->id}}">Delete</a></li>
              </ul>
            </div>
          </td>
        </tr>
        @endforeach
        @endif
      </table>

      <hr>
      <h4>Create New Future Status</h4>
      {{Form::open(array('url'=>'status','role'=>'form','id'=>'future-form'))}}

      <div class="form-group">
       <label for="status">Status</label>
       {{Form::select('status',Config::get('contact.status'),$contact->status, ['class'=>'form-control']);}}
     </div>

     <div class="form-group">
       <label for="comment">Comments</label>
       {{Form::text('comment',$contact->comment, ['class'=>'form-control']);}}
     </div>

     <div class="form-group">
      <label for="leaving_date">Leaving Date/Time</label>
      <div class='input-group date' id='future-leave-date'>
        {{Form::text('leaving_date',null, ['class'=>'form-control']);}}
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>

    <div class="form-group">
      <label for="returning_date">Returning Date/Time</label>
      <div class='input-group date' id='future-return-date'>
        {{Form::text('returning_date',null, ['class'=>'form-control']);}}
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
    </div>

    {{Form::hidden('contact_id', $contact->id);}}

  </div>
  <div class="modal-footer">
    {{Form::submit('Save', array('class'=>'btn btn-success future-save'))}}
    {{Form::close()}}
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</div>
</div>