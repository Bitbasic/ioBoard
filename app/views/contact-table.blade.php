 <table class="table table-bordered table-striped data-table">
      <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Extension</th>
        <th>Mobile</th>
        <th>Company</th>
        <th>City</th>
        <th>Status</th>
        <th>Comments</th>
        <th>Returning</th>
        <th></th>
        <th></th>
      </thead>
      @foreach($personnel as $contact)
      <tr>
        <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->extension}}</td>
        <td>{{$contact->cell}}</td>
        <td>{{$contact->company}}</td>
        <td>{{$contact->location}}</td>
        <td>{{$contact->status}}</td>
        <td>{{$contact->comment}}</td>
        <td>{{$contact->returning_date}} @if($contact->returning_time)<br> @ {{$contact->returning_time}}@endif</td>
        <td><button class="btn btn-sm btn-primary status" data-id="{{$contact->id}}">Status</button></td>
        <td><button class="btn btn-sm btn-info future-status" data-id="{{$contact->id}}">Future Status</button></td>
      </tr>
      @endforeach
    </table>