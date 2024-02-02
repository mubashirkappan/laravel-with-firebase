@extends('welcome')
@section('content')
    <h4>Edit</h4>
    <form action="{{route('do.contact.update')}}" method="post">
    @csrf
      {{--  <div class="row">  --}}
        <input type="hidden"  id="id" name = "id" value="{{$key}}">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name = "email" value="{{$reference['email']}}">
        </div>
        <div class="form-group col-md-6">
          <label for="inputname">name</label>
          <input type="text" class="form-control" id="inputname" placeholder="Name" name = "fName" value="{{$reference['fName']}}">
        </div>
        <div class="form-group col-md-6">
          <label for="message">Message</label>
          <textarea  class="form-control" id="message" placeholder="Message" name = "message" rows="3" >{{$reference['message']}}</textarea>
        </div>
      {{--  </div>  --}}
      <button type="submit" class="btn btn-primary mt-4 mr-4">Update</button>
    </form>
@endsection
