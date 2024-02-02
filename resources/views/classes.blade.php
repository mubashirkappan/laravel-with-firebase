@extends('welcome')
@section('content')
    @if (session('msg'))
        <h2>{{session('msg')}}</h2>
    @endif
    <h1>Class({{$numberOfData}})</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">action</th>
      <th scope="col"><a href="{{route('class.add')}}" class="btn btn-primary">add class</a></th>
    </tr>
  </thead>
  <tbody>
  @if (!is_null($data))
    @foreach ($data as $key=> $value)
        <tr>
          <th scope="col">{{$loop->iteration}}</th>
          <th scope="col">{{$value['class']}}</th>
          <th scope="col">{{$value['contact'][0]}},{{$value['contact'][1]}}</th>
          <th scope="col" colspan='2'><a class="btn btn-info" href="{{route('contact.edit',$key)}}">edit</a><a class="btn btn-danger" href="{{route('contact.delete',$key)}}">delete</a></th>
        </tr>
    @endforeach
  @endif
  </tbody>
</table>
@endsection
