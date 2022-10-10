@extends('layouts.app')

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
                        <div class="card-title" data-toggle="collapse" data-target="#abyiptrash">
                            HOUSEHOLD
                        </div>
                    </div>
                    <div id="abyiptrash" class="collapse show" data-parent="#accordionExample1">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Deleted Entry</th>
                                        <th>Date of Deletion</th>
                                        <th class="col-md-3">Actions</th>
                                    </tr>
                                    <tr>
                                        <td>test</td>
                                        <td>test</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title" data-toggle="collapse" data-target="#abyiptrash">
                            COMPLAINT
                        </div>
                    </div>
                    <div id="abyiptrash" class="collapse show" data-parent="#accordionExample1">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Deleted Entry</th>
                                        <th>Date of Deletion</th>
                                        <th class="col-md-3">Actions</th>
                                    </tr>
                                    <tr>
                                        <td>test</td>
                                        <td>test</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title" data-toggle="collapse" data-target="#abyiptrash">
                            INCIDENT
                        </div>
                    </div>
                    <div id="abyiptrash" class="collapse show" data-parent="#accordionExample1">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Deleted Entry</th>
                                        <th>Date of Deletion</th>
                                        <th class="col-md-3">Actions</th>
                                    </tr>
                                    <tr>
                                        <td>test</td>
                                        <td>test</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title" data-toggle="collapse" data-target="#abyiptrash">
                             
                        </div>
                    </div>
                    <div id="abyiptrash" class="collapse show" data-parent="#accordionExample1">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Deleted Entry</th>
                                        <th>Date of Deletion</th>
                                        <th class="col-md-3">Actions</th>
                                    </tr>
                                    <tr>
                                        <td>test</td>
                                        <td>test</td>
                                    </tr>
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
