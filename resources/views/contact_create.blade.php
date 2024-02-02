@extends('welcome')
@section('content')
    <h4>Add</h4>

    <form action="{{route('do.contact.add')}}" method="post">
    @csrf
      {{--  <div class="row">  --}}
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name = "email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputname">name</label>
          <input type="text" class="form-control" id="inputname" placeholder="Name" name = "fName">
        </div>
        <div class="form-group col-md-6">
          <label for="message">Message</label>
          <textarea type="textarea" class="form-control" id="message" placeholder="Message" name = "message" rows="3"></textarea>
        </div>
      {{--  </div>  --}}
      <button type="submit" class="btn btn-primary mt-4 mr-4">Add</button>
    </form>

@endsection
@section('script')
<script>
        // Add focus and blur events to handle floating labels
        document.querySelectorAll('.form-control').forEach(function (element) {
            element.addEventListener('focus', function () {
                this.previousElementSibling.classList.add('active');
            });

            element.addEventListener('blur', function () {
                if (this.value === '') {
                    this.previousElementSibling.classList.remove('active');
                }
            });

            // Check if the field is not empty on page load
            if (element.value !== '') {
                element.previousElementSibling.classList.add('active');
            }
        });
    </script>
@endsection
