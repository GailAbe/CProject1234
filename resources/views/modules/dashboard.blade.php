@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card wave wave-success card-custom card-stretch">
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                    height="16" rx="1.5"></rect>
                                <rect fill="#000000" x="8" y="9" width="3" height="11"
                                    rx="1.5"></rect>
                                <rect fill="#000000" x="18" y="11" width="3" height="9"
                                    rx="1.5"></rect>
                                <rect fill="#000000" x="3" y="13" width="3" height="7"
                                    rx="1.5"></rect>
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">0</span>
                    <span class="font-weight-bold text-muted font-size-sm">Total Purchase Requests</span>
                </div>
            </div>

        </div>
        <div class="col-lg-4">

            <div class="card wave wave-success card-custom card-stretch">
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                    height="16" rx="1.5"></rect>
                                <rect fill="#000000" x="8" y="9" width="3" height="11"
                                    rx="1.5"></rect>
                                <rect fill="#000000" x="18" y="11" width="3" height="9"
                                    rx="1.5"></rect>
                                <rect fill="#000000" x="3" y="13" width="3" height="7"
                                    rx="1.5"></rect>
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">0</span>
                    <span class="font-weight-bold text-muted font-size-sm">Total Vouchers Pending</span>
                </div>
            </div>

        </div>
        <div class="col-lg-4">

            <div class="card wave wave-success card-custom card-stretch">

                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                    height="16" rx="1.5"></rect>
                                <rect fill="#000000" x="8" y="9" width="3" height="11"
                                    rx="1.5"></rect>
                                <rect fill="#000000" x="18" y="11" width="3" height="9"
                                    rx="1.5"></rect>
                                <rect fill="#000000" x="3" y="13" width="3" height="7"
                                    rx="1.5"></rect>
                            </g>
                        </svg>
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">0</span>
                    <span class="font-weight-bold text-muted font-size-sm">Total Vouchers Released</span>
                </div>
            </div>

        </div>
    </div>
@endsection
