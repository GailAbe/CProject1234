<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="SK Management" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="{{ asset('z2.png') }}" type="image/x-icon">
    <link rel="canonical" href="url" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    @stack('links')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading">
    @include('partials.mobile-toggle')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            @include('partials.sidebar')
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('partials.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="d-flex flex-column-fluid">
                        <div class="container">

                            @section('content') @show

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/widgets.js') }}"></script>

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')

    <script>
        window.addEventListener('swalSuccess', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: event.detail.message,
                showConfirmButton: false,
                timer: 1500
            })
        });
        window.addEventListener('swalDel', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: event.detail.message,
                showConfirmButton: false,
                timer: 1500
            })
        });
        window.addEventListener('already-confirmed', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showConfirmButton: false,
                timer: 1500
            })
        });
        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Deleted',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });
        window.addEventListener('swal:confirm-release', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('release', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Released',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });
        window.addEventListener('swal:confirm-cancel', event => {
            Swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: event.detail.message,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `Cancel`
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('cancel', event.detail.id)
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Successfully Cancelled',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });

        //insert later the restore and forcedelete listeners
    </script>
    <script>
        $(document).ready(function() {

            var semsArray = ['#firstSem', '#secondSem'];
            $(semsArray.join(",")).on('change keyup paste click', function() {
                var firstSem = parseFloat($('#firstSem').val());
                var secondSem = parseFloat($('#secondSem').val());

                if (isNaN(firstSem) || firstSem < 0) {
                    firstSem = 0;
                } else if (isNaN(secondSem) || secondSem < 0) {
                    secondSem = 0;
                }

                var total = firstSem + secondSem;
                $('#totalSem').val(total);
            });


            $('#aipType').on('change click paste', function() {
                if (this.value == 'Program') {
                    $('.prog_under').hide(); // set it to hide using .hide(); or attr('disabled', true)
                    $('.proj_under').hide();
                    $('.exp_Tag').show(); // or set to show using .show();
                } else if (this.value == 'Project') {
                    $('.prog_under').show();
                    $('.proj_under').hide();
                    $('.exp_Tag').show();
                } else if (this.value == 'Activity') {
                    $('.prog_under').show();
                    $('.proj_under').show();
                    $('.exp_Tag').hide();
                } else {
                    $('.prog_under').show();
                    $('.proj_under').show();
                    $('.exp_Tag').show();
                }
            });


            // $('.aipMarked').attr('hidden', true);

            // $('#markAIP').change(function() {
            //     if ($(this).is(':checked')) {
            //         $('.aipMarked').attr('hidden', false);
            //     } else {
            //         $('.aipMarked').attr('hidden', true);
            //     }
            // });
        })
    </script>

</body>

</html>
