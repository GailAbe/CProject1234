<div class="card card-custom gutter-b">
    @include('livewire.official.create')
    @include('livewire.official.edit')
    <!--begin::Header-->
    <x-errors></x-errors>
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Official Management</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage your officials here</span>
        </h3>
        <div class="card-toolbar">
            <a href="#" class="btn btn-success font-weight-bolder font-size-sm" data-toggle="modal"
                data-target="#create">
                <span class="svg-icon svg-icon-md svg-icon-white">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add New Official</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr class="text-left">
                        <th style="min-width: 200px">Full Name</th>
                        <th style="min-width: 150px">Position</th>
                        <th>Gender</th>
                        <th>Purok</th>
                        <th>Contact Number</th>
                        <th class="pr-0 text-center" style="min-width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($officials as $official)
                        <tr>
                            <td>{{ $official->fullname }}</td>
                            <td>{{ $official->position }}</td>
                            <td>{{ $official->gender }}</td>
                            <td>{{ $official->purok }}</td>
                            <td>{{ $official->contact_number }}</td>
                            <td class="nowrap d-flex justify-content-center">
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-primary btn-sm mx-3"
                                        wire:click='edit({{ $official->id }})' data-target="#edit" data-toggle="modal">
                                        EDIT
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                        wire:click='deleteConfirm({{ $official->id }})'>
                                        DELETE
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No data found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
