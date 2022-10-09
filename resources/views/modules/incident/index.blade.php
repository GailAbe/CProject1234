@extends('layout.app')

@section('title')
    Incident
@endsection

@section('content')
    <x-success></x-success>
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h2 class="card-label">INCIDENT</h2>
            </div>
            <div class="card-toolbar">
                <form class="d-flex" role="search">
                    <input class="form-control search mr-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <button type="button" class="mr-2 btn btn-info font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <i class="flaticon2-file-1"></i>
                    </span>Export</button>
                <a href="{{ route('incident.create') }}" class="btn btn-primary font-weight-bolder">
                    <i class="flaticon-add"></i> Add Incident Record
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="kt_datatable">
                <thead>
                    <tr>
                        <th>DATE & TIME</th>
                        <th>NAME OF VICTIM</th>
                        <th>PLACE OCCURRED</th>
                        <td>PERSON INVOLVED</td>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($incidents as $incident)
                        <tr>
                            <td>{{ $incident->date->format('M. d, Y, H:i:A') }}</td>
                            <td>{{ $incident->victim }}</td>
                            <td>{{ $incident->location }}</td>
                            <td>{{ $incident->person_involved }}</td>
                            <td class="nowrap d-flex justify-content-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('incident.show', $incident->id) }}"
                                        class="mr-1 btn btn-success btn-sm"> VIEW </a>
                                    <a href="{{ route('incident.edit', $incident->id) }}"
                                        class="mr-1 btn btn-sm btn-primary">
                                        EDIT </a>
                                    @livewire('incident.delete-inc', ['incident' => $incident], key($incident->id))
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Incidents</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
