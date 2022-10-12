@props([
    'title' => 'Default Title',
    'backUrl' => '',
    'toolbar',
    'footer',
])

<div class="card card-custom card-stretch gutter-b">
    <div class="card-header">
        <div class="card-title">
            @if ($backUrl)
                <a href="{{ $backUrl }}" class="btn btn-sm btn-icon btn-light-primary mr-4">
                    <i class="flaticon2-left-arrow-1"></i>
                </a>
            @endif
            <h1 class="card-label font-weight-bolder text-dark">
                {{ $title }}
            </h1>
        </div>
        @isset($toolbar)
            <div class="card-toolbar d-flex justify-content-end">
                {{ $toolbar }}
            </div>
        @endisset
    </div>
    <div class="card-body" {{ $attributes }}>
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
