@extends('layout.app')

@section('title')
    Complaint
@endsection

@section('content')
    <x-success></x-success>
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h2 class="card-label">COMPLAINT</h2>
            </div>
            <div class="card-toolbar">
                <form class="d-flex" role="search">
                    <input class="form-control search mr-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <button type="button" class="mr-2 btn btn-info font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <i class="flaticon2-file-1"></i>
                    </span>Export</button>
                <a href="{{ route('complaint.create') }}" class="btn btn-primary font-weight-bolder">
                    <i class="flaticon-add"></i> Add Complaint
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="kt_datatable">
                <thead>
                    <tr>
                        <th>DATE & TIME</th>
                        <th>COMPLAINANT</th>
                        <th>COMPLAIN TO</th>
                        <th>STATUS</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->date_time->format('F d Y, H:i:A') }}</td>
                            <td>{{ $complaint->complainant }}</td>
                            <td>{{ $complaint->complaint_to }}</td>
                            <td>{{ $complaint->complaint_status }}</td>
                            <td class="nowrap d-flex justify-content-center">
                                @if ($complaint->complaint_status == 'Not Settled')
                                    <a href="{{ route('complaint.settled', $complaint->id) }}" class="me-2"
                                        onclick="return confirm('Are you sure to set this entry as settled?')">
                                        <button type="button" class="btn btn-sm btn-warning mr-1">Set as settled</button>
                                    </a>
                                @endif
                                <a href="" class="mr-1 btn btn-success btn-sm">VIEW</a>
                                <a href="" class="btn btn-sm btn-primary">EDIT</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Complaints</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
