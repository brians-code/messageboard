@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        
        <a class="btn btn-primary btn-lg btn-block mb-3" href="/messages/create" role="button">Create New Message</a>
        
            @foreach ($messages as $message)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class='col'>
                            {{ $message->user->name }} (<a href="mailto:$message->user->email">{{ $message->user->email }}</a>)
                        </div>
                        @if($message->user_id == Auth::id())
                            <div class='col text-right'>
                                <a href='messages/{{ $message->id }}/edit'><i class="far fa-edit"></i></a>&nbsp;
                                <a href='messages/delete/{{ $message->id }}'><i class="far fa-trash-alt alert-danger"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class='row'>
                        <div class='col-md-12 mb3'>
                            {{ $message->message }}
                        </div>
                    </div>
                </div>
                <footer class="blockquote-footer">
                    <small class="text-muted">
                        Updated {{ $message->updated_at }}
                    </small>
                </footer>
            </div>
            @endforeach
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection