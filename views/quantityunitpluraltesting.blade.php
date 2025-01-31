@extends('layout.default')

@section('title', $__t('Quantity unit plural form testing'))

@section('viewJsName', 'quantityunitpluraltesting')

@push('pageStyles')
    <link href="{{ $U('/node_modules/animate.css/animate.min.css?v=', true) }}{{ $version }}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <h2 class="title">@yield('title')</h2>
        </div>
    </div>

    <hr class="my-2">

    <div class="row">
        <div class="col-lg-6 col-12">
            <form id="quantityunitpluraltesting-form" novalidate>

                <div class="form-group">
                    <label for="qu_id">{{ $__t('Quantity unit') }}</label>
                    {{-- TODO: Select2: dynamic data: quantity_units --}}
                    <select class="custom-control custom-select" id="qu_id" name="qu_id">
                        <option></option>
                        @foreach ($quantityUnits as $quantityUnit)
                            <option value="{{ $quantityUnit->id }}" data-singular-form="{{ $quantityUnit->name }}"
                                data-plural-form="{{ $quantityUnit->name_plural }}">{{ $quantityUnit->name }}</option>
                        @endforeach
                    </select>
                </div>

                @include('components.numberpicker', [
                    'id' => 'amount',
                    'label' => 'Amount',
                    'min' => 0,
                    'decimals' => $userSettings['stock_decimal_places_amounts'],
                    'isRequired' => false,
                    'value' => 1,
                    'additionalCssClasses' => 'locale-number-input locale-number-quantity-amount',
                ])

            </form>

            <h2><strong>{{ $__t('Result') }}:</strong> <span id="result"></span></h2>
        </div>
    </div>
@stop
