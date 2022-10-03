@extends('layout.app')

@section('title')
    Complaints
@endsection

@section('content')
    <x-success></x-success>
    <div class="row">
        <div class="col-md-12">
            <x-card title="COMPLAINTS">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Complainant</th>
                            <th>Complaint Date</th>
                            <th>Appellant</th>
                            <th>Witness</th>
                            <th>Actions</th>
                        </tr>
                        {{-- @forelse($noas as $noa)
                            <tr>
                                <td>{{$noa->canvass?->project_name}}</td>
                                <td>{{ $noa->purchaseRequest?->pr_no ?? '<empty>' }}</td>
                                <td>{{ $noa->noa_date?->format('M. d, Y') }}</td>
                                <td>{{ $noa->noa_approved_price }}</td>
                                <td>{{ $noa->bid_date }}</td>
                                <td>
                                    <a href="{{ route('noa.show', $noa->id) }}" class="btn btn-success btn-sm">View</a>
                                    <a href="{{ route('noa.edit', $noa->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    @livewire('noa.export-noa', ['noa' => $noa], key($noa->id))
                                    @livewire('noa.delete-noa', ['noa' => $noa], key($noa->id))
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="5">No data</td>
                            </tr>
                        @endforelse --}}
                    </table>
                    <div class="d-flex justify-content-center">
                        {{-- {{ $noas->links() }} --}}
                    </div>
                </div>
                <x-slot:footer>
                    <a href="#" class="btn btn-primary">Create new Complaint</a>
                </x-slot:footer>
            </x-card>
        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
