@extends('layout.app')

@section('content')
    @livewireStyles
    @livewire('official.show-official')
@endsection
@push('scripts')
    @livewireScripts
@endpush
