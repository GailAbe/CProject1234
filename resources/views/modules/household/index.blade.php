@extends('layout.app')

@section('title')
    Household
@endsection

@section('content')
    <x-success></x-success>
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h2 class="card-label">HOUSEHOLD</h2>
            </div>
            <div class="card-toolbar">
                {{-- if households is > 0, show --}}
                @livewire('household.export', ['households' => $households])
                <a href="{{ route('household.create') }}" class="btn btn-primary font-weight-bolder">
                    <i class="flaticon-add"></i> Add Household
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="kt_datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>HOUSE NO.</th>
                        <th>PUROK</th>
                        <th>Number of Family Members</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($households as $household)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $household->household_number }}</td>
                            <td>{{ $household->purok_name }}</td>
                            <td>{{ $household->members->count() }}</td>
                            <td class="nowrap d-flex justify-content-center">
                                <a href="{{ route('household.show', $household->id) }}" class="mr-1 btn btn-success btn-sm">
                                    VIEW
                                </a>
                                <a href="{{ route('household.edit', $household->id) }}"
                                    class="btn btn-sm btn-primary mr-1">EDIT</a>
                                @livewire('household.del-exp', ['household' => $household], key($household->id))
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data found</td>
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
