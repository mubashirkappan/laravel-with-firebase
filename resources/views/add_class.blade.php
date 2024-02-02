@extends('welcome')
@section('content')
<form action="{{route('do.add.class')}}" method="post">
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Class</label>
    <input type="text" name="className" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2" name="contact[]">
      @foreach($data as $key => $value)
        <option value="{{$value['fName']}}">{{$value['fName']}}</option>
        @endforeach
    </select>
  </div>
   <button type="submit" class="btn btn-primary mt-4">Register</button>

</form>
@endsection
