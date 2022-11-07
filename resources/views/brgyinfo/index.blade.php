@extends('layout.app')

@section('title')
    Barangay Information
@endsection

@push('styles')
    @livewireStyles
@endpush

@section('content')
    <x-success></x-success>
    <div class="card card-custom gutter-b">
        {{-- <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h2 class="card-label">BARANGAY INFORMATION</h2>
            </div>
        </div> --}}
        <div class="card-body">
            <div class="row text-center justify-content-center mt-5">
                <div class="col-md-4 p-3 text-hover-primary">
                    <h1>MISSION</h1>
                    <h4 class="text-justify">To sustain the life-giving capacity of the environment and to improve the
                        quality of life of the
                        constituents through effective and efficient Sangguniang Barangay of Zone-2 towards the principles
                        of Transparency, accountability, fairness and truth.</h4>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('z2.png') }}" alt="zone 2 logo" class="max-h-150px">
                    <h1 class="font-weight-bolder text-hover-success">"AKSYON SONA DOS"</h1>
                </div>
                <div class="col-md-4 p-3 text-hover-primary">
                    <h1>VISION</h1>
                    <h4 class="text-justify">An Ecologically-Balanced Barangay with god-Loving and Well Educated
                        Constituents under a system of
                        Governance that is Responsive, participatory and transparent.</h4>
                </div>
            </div>
            <hr class="text-dark font-weight-bolder line-height-lg mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">HISTORY</h1>
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="text-justify">
                                Barangay Zone 2 was one of the eight zones/barangays when the Poblacion divided in year 1973
                                the whole area of the poblacion, south of Gullaba Street from Managa-naga river up to the
                                shorelines to the west was popularly called Ilawod without clear demarcation.
                            </h5>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-justify">
                                There were even vice-lieutenants for the sitio ilawod-Sabang before. Zone 2 comprises West
                                Ilawod from Bulan Pier from the shorelines up to Immaculada Conception Street.
                            </h4>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-justify">
                                There were different classes of people resided in the barangay from lowly kargadores to the
                                professionals and businessmen. There are many transient from masbate and visayas region have
                                already
                                called Zone 2 their home.
                            </h4>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-justify">
                                It is now the biggest barangay in terms of population, it has two Patrons under Senor Hesus
                                Nazareno
                                of Kapilya Zone 2A whose feast on every 9th of January and Nuestra Senora De Salvacion of
                                kapilya Zone 2B of every 15th of August.
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="text-dark font-weight-bolder line-height-lg mt-5 mb-5">

        </div>
    </div>
@endsection

@push('scripts')
    @livewireScripts
@endpush
