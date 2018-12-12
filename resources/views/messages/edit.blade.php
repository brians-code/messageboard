@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Message</div>
                <div class="card-body">
                  <div class="col">
                    <form class="needs-validation" action="/messages/{{ $message->id }}" method="post" novalidate>
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-md-8 mb-3">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $message->user->name }}" disabled>
                        </div>
                       </div>
                      <div class="row">
                        <div class="col-md-8 mb-3">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" id="email" placeholder="" value="{{ $message->user->email }}" disabled>
                        </div>
                       </div>
                      <div class="row">
                        <div class="col-md-8 mb-5">
                          <label for="message">Message</label>
                          <textarea name="message" class="form-control" id="message" required>{{ $message->message }}</textarea>
                          <div class="invalid-feedback">
                            Message is required.
                          </div>
                        </div>
                       </div>
                       <button class="btn btn-primary btn-lg btn-block" type="submit">Save Message</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  (function() {
    'use strict';

    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');

      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>

@endsection