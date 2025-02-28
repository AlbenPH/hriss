@extends('backend.layouts.app')
@section('title', localize('leave_report'))
@push('css')
@endpush
@section('content')

    @include('humanresource::reports_header')
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')

    <div class="card mb-4 fixed-tab-body">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('leave_report') }}</h6>
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
                                        <select name="leave_type_id" id="leave_type_id"
                                            class="form-control select-basic-single">
                                            <option value="" selected> {{ localize('all_types') }}</option>
                                            @foreach ($leave_types as $key => $leave_type)
                                                <option value="{{ $leave_type->id }}"> {{ $leave_type->leave_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <select name="department_id" id="department_id"
                                            class="form-control select-basic-single">
                                            <option value="" selected>{{ localize('all_department') }}</option>
                                            @foreach ($departments as $key => $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- data range --}}
                                    <div class="col-md-2 mb-4">
                                        <input type="text" class="form-control date-range" name="text" id="date-range"
                                            placeholder="{{ localize('date') }}" />
                                    </div>

                                    <div class="col-md-2 mb-4">
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

            <div class="table-customize">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

@endsection
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script src="{{ asset('js/leave-report.js') }}"></script>






@endpush
