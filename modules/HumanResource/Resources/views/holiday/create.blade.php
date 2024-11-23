<!-- Modal -->
<div class="modal fade" id="addHoliday" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    {{ localize('new_holiday') }}
                </h5>
            </div>
            <form id="leadForm" action="{{ route('holiday.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <label for="holiday_name"
                                    class="col-form-label col-sm-3 col-md-12 col-xl-3 fw-semibold">{{ localize('holiday_name') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9 col-md-12 col-xl-9">
                                    <input type="text" class="form-control" id="holiday_name" name="holiday_name"
                                        placeholder="{{ localize('holiday_name') }}" value="{{ old('holiday_name') }}"
                                        required>
                                </div>

                                @if ($errors->has('holiday_name'))
                                    <div class="error text-danger m-2">{{ $errors->first('holiday_name') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <label for="start_date"
                                    class="col-form-label col-sm-3 col-md-12 col-xl-3 fw-semibold">{{ localize('from_date') }}
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-md-12 col-xl-9">
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        value="{{ old('start_date') }}" required>
                                </div>

                                @if ($errors->has('start_date'))
                                    <div class="error text-danger m-2">{{ $errors->first('start_date') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <label for="end_date"
                                    class="col-form-label col-sm-3 col-md-12 col-xl-3 fw-semibold">{{ localize('end_date') }}
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-md-12 col-xl-9">
                                    <input type="date" class="form-control" id="end_date" name="end_date"
                                        value="{{ old('end_date') }}" required>
                                </div>

                                @if ($errors->has('end_date'))
                                    <div class="error text-danger m-2">{{ $errors->first('end_date') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <label for="total_day"
                                    class="col-form-label col-sm-3 col-md-12 col-xl-3 fw-semibold">{{ localize('total_days') }}</label>
                                <div class="col-sm-9 col-md-12 col-xl-9">
                                    <input type="text" class="form-control" id="total_day" name="total_day"
                                        placeholder="{{ localize('total_days') }}" value="{{ old('total_day') }}"
                                        readonly>
                                </div>

                                @if ($errors->has('total_day'))
                                    <div class="error text-danger m-2">{{ $errors->first('total_day') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">{{ localize('close') }}</button>
                    <button class="btn btn-primary submit_button" id="create_submit">{{ localize('save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const totalDayInput = document.getElementById('total_day');

    function calculateTotalDays() {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (!isNaN(startDate) && !isNaN(endDate) && endDate >= startDate) {
            // Calculate the difference in time
            const differenceInTime = endDate - startDate;
            // Convert time difference to days (milliseconds in a day: 1000 * 60 * 60 * 24)
            const totalDays = differenceInTime / (1000 * 60 * 60 * 24); // No +1, exact number of days

            totalDayInput.value = totalDays ; // Adjust to include both start and end days
        } else {
            totalDayInput.value = ''; // Clear the field if dates are invalid
        }
    }

    // Attach event listeners to the start and end date fields
    startDateInput.addEventListener('change', calculateTotalDays);
    endDateInput.addEventListener('change', calculateTotalDays);
});

</script>

