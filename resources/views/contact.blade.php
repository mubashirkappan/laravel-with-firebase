@extends('welcome')
@section('content')
    @if (session('msg'))
        <h2>{{session('msg')}}</h2>
    @endif
    <h1>Contacts({{$numberOfData}})</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">message</th>
      <th scope="col">action</th>
      <th scope="col"><a href="{{route('contact.add')}}" class="btn btn-primary">add contact</a></th>
    </tr>
  </thead>
  <tbody>
  @if (!is_null($data))
    @foreach ($data as $key=> $value)
        <tr>
          <th scope="col">{{$loop->iteration}}</th>
          <th scope="col">{{$value['fName']}}</th>
          <th scope="col">{{$value['email']}}</th>
          <th scope="col">{{$value['message']}}</th>
          <th scope="col" colspan='2'><a class="btn btn-info" href="{{route('contact.edit',$key)}}">edit</a><a class="btn btn-danger" href="{{route('contact.delete',$key)}}">delete</a></th>
        </tr>
    @endforeach
  @endif
  </tbody>
</table>
@endsection
