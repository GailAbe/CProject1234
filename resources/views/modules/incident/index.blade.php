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
                    <i class="flaticon-add"></i> Add Incident
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
                    <tr>
                        <td>test</td>
                        <td>juan dela cruz</td>
                        <td>place</td>
                        <td class="nowrap d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <a href="" class="mr-1 btn btn-success btn-sm">
                                    VIEW
                                </a>
                                <a href="" class="btn btn-sm btn-primary">
                                    EDIT
                                </a>
                                {{-- @livewire('soi.soi-delete', ['sois' => $soi], key($soi['id'])) --}}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
