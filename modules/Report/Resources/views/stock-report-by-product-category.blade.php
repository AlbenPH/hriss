@extends('backend.layouts.app')
@section('title', localize('stock_report_by_product_category'))
@push('css')
    <link href="{{ module_asset('Report/css/report-pdf.css') }}" rel="stylesheet">
@endpush
@section('content')
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')
    <div class="card mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('stock_report_by_product_category') }}</h6>
                </div>
                <div class="text-end">
                    <div class="actions">
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"> <i
                                class="fas fa-filter"></i> {{ localize('filter') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <div id="flush-collapseOne" class="accordion-collapse collapse bg-white mb-4"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                                <div class="row">
                                    <div class="col-md-2 mb-4">
                                        <select id="category_id" class="select-basic-single">
                                            <option selected value="0">{{ localize('all_category') }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <select id="product-name" class="select-basic-single">
                                            <option value="0" selected>{{ localize('all_product') }}</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ ucwords($product->product_name . '(' . $product->product_model . ')') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <input type="text" class="form-control predefined" id="stock-report-range"
                                            autocomplete="off" placeholder="{{ localize('purchase_date') }}">
                                    </div>
                                    <div class="col-md-2 mb-4 align-self-end">
                                        <button type="button" id="filter"
                                            class="btn btn-success">{{ localize('find') }}</button>
                                        <button type="button" id="searchreset"
                                            class="btn btn-danger">{{ localize('reset') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table_customize">
                <table class="table display table-bordered table-striped table-hover align-middle text-end"
                    id="stock-report-by-product-category">
                    <thead class="align-middle">
                        <tr>
                            <th class="text-start">{{ localize('sl') }}</th>
                            <th class="text-start">{{ localize('product_category') }}</th>
                            <th class="text-start">{{ localize('product_name') }}</th>
                            <th>{{ localize('sale_price') }}</th>
                            <th>{{ localize('purchase_price') }}</th>
                            <th>{{ localize('opening_qty') }}</th>
                            <th>{{ localize('received_qty') }}</th>
                            <th>{{ localize('delivered_qty') }}</th>
                            <th>{{ localize('purchase_return_qty') }}</th>
                            <th>{{ localize('purchase_return_amount') }}</th>
                            <th>{{ localize('stock') }}</th>
                            <th>{{ localize('stock_sale_price') }}</th>
                            <th>{{ localize('stock_purchase_price') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ module_asset('Report/js/stock-report-by-product-category.js') }}"></script>
@endpush
