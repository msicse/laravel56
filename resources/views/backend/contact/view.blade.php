@extends('layouts.backend')

@section('title','Contact')

@push('styles')
	
@endpush

@section('content')
	
    <div class="col-md-10 col-md-offset-1">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">{{ $contact->subject }}</h4>
                <p class="category">{{ $contact->email }}</p>
            </div>
            <div class="card-content">
                Name = {{ $contact->name }}
                Message <br>
                <p>{{ $contact->message }}</p>
                <a href="{{ route('contacts.index') }}" class="btn btn-info btn-sm">
                   back
                </a>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
	
@endpush