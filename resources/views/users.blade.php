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
    </tr>
  </thead>
  <tbody>
  @if (!is_null($data))
    @foreach ($data as $key=> $value)
        <tr>
          <th scope="col">{{$loop->iteration}}</th>
          <th scope="col">{{$value['displayName']}}</th>
          <th scope="col">{{$value['email']}}</th>
        </tr>
    @endforeach
  @endif
  </tbody>
</table>
@endsection
