@extends('layout.app')

@section('title')
    Trash Bin
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    <x-success></x-success>
    <x-errors></x-errors>
    <div class="col-md-12">
        <x-card title="DELETED FILES">
            <div class="accordion accordion-toggle-arrow" id="accordionExample1">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title" data-toggle="collapse" data-target="#hholdtrash">
                            HOUSEHOLD
                        </div>
                    </div>
                    <div id="hholdtrash" class="collapse show" data-parent="#accordionExample1">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Deleted Entry</th>
                                        <th>Date of Deletion</th>
                                        <th class="col-md-3">Actions</th>
                                    </tr>
                                    @forelse ($households as $household)
                                        <tr>
                                            <td>{{ $household->household_number }}</td>
                                            <td>{{ $household->deleted_at }}</td>
                                            <td>
                                                @livewire('household.trash-household', ['household' => $household], key($household->id))
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No deleted household entries</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title" data-toggle="collapse" data-target="#complainttrash">
                            COMPLAINT
                        </div>
                    </div>
                    <div id="complainttrash" class="collapse" data-parent="#accordionExample1">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Deleted Entry</th>
                                        <th>Date of Deletion</th>
                                        <th class="col-md-3">Actions</th>
                                    </tr>
                                    @forelse ($complaints as $complaint)
                                        <tr>
                                            <td>{{ $complaint->notes }}</td>
                                            <td>{{ $complaint->deleted_at }}</td>
                                            <td>
                                                @livewire('complaint.trash-complaint', ['complaint' => $complaint], key($complaint->id))
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No deleted complaint entries</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title" data-toggle="collapse" data-target="#inctrash">
                            INCIDENT
                        </div>
                    </div>
                    <div id="inctrash" class="collapse" data-parent="#accordionExample1">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Deleted Entry</th>
                                        <th>Date of Deletion</th>
                                        <th class="col-md-3">Actions</th>
                                    </tr>
                                    @forelse ($incidents as $incident)
                                        <tr>
                                            <td>{{ $incident->incident_description }}</td>
                                            <td>{{ $incident->deleted_at }}</td>
                                            <td>
                                                @livewire('incident.trash-incident', ['incident' => $incident], key($incident->id))
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No deleted incident entries</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title" data-toggle="collapse" data-target="#offcialtrash">
                            OFFICIALS
                        </div>
                    </div>
                    <div id="offcialtrash" class="collapse" data-parent="#accordionExample1">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Deleted Entry</th>
                                        <th>Date of Deletion</th>
                                        <th class="col-md-3">Actions</th>
                                    </tr>
                                    @forelse ($officials as $official)
                                        <tr>
                                            <td>{{ $official->fullname }}</td>
                                            <td>{{ $official->deleted_at }}</td>
                                            <td>
                                                @livewire('official.trash-official', ['official' => $official], key($official->id))
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No deleted official entries</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </x-card>
    </div>
@endsection
@push('scripts')
    @livewireScripts
@endpush
