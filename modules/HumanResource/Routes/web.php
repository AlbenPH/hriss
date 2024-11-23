<?php

use Illuminate\Support\Facades\Route;
use Modules\HumanResource\Http\Controllers\BankController;
use Modules\HumanResource\Http\Controllers\LeaveController;
use Modules\HumanResource\Http\Controllers\GenderController;
use Modules\HumanResource\Http\Controllers\IdcardController;
use Modules\HumanResource\Http\Controllers\NoticeController;
use Modules\HumanResource\Http\Controllers\ReportController;
use Modules\HumanResource\Http\Controllers\HolidayController;
use Modules\HumanResource\Http\Controllers\MessageController;
use Modules\HumanResource\Http\Controllers\DivisionController;
use Modules\HumanResource\Http\Controllers\EmployeeController;
use Modules\HumanResource\Http\Controllers\PositionController;
use Modules\HumanResource\Http\Controllers\LeaveTypeController;
use Modules\HumanResource\Http\Controllers\SetupRuleController;
use Modules\HumanResource\Http\Controllers\DepartmentController;
use Modules\HumanResource\Http\Controllers\SalarySetupController;
use Modules\HumanResource\Http\Controllers\PayFrequencyController;
use Modules\HumanResource\Http\Controllers\HumanResourceController;
use Modules\HumanResource\Http\Controllers\SalaryAdvanceController;
use Modules\HumanResource\Http\Controllers\SalaryGenerateController;
use Modules\HumanResource\Http\Controllers\ManualAttendanceController;
use Modules\HumanResource\Http\Controllers\CandidateInterviewController;
use Modules\HumanResource\Http\Controllers\CandidateSelectionController;
use Modules\HumanResource\Http\Controllers\CandidateShortlistController;
use Modules\HumanResource\Http\Controllers\CandidateInformationController;
use Modules\HumanResource\Http\Controllers\EmployeePerformanceCriteriaController;
use Modules\HumanResource\Http\Controllers\TaxCalculationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['prefix' => 'hr', 'middleware' => ['auth']], function () {

    Route::get('dashboard', [HumanResourceController::class, 'index'])->name('hr.dashboard');

    Route::resource('departments', DepartmentController::class);
    Route::get('sub-departments', [DepartmentController::class, 'getSubDepartments'])->name('sub-departments.index');
    Route::get('get-employees', [DepartmentController::class, 'getEmployees'])->name('get-employees-department');

    Route::resource('genders', GenderController::class);
    Route::resource('divisions', DivisionController::class);
    Route::resource('positions', PositionController::class);

    Route::resource('employees', EmployeeController::class);
    Route::post('employee-info', [EmployeeController::class, 'employeeInfo'])->name('employee.employee_info');
    Route::get('inactive-list', [EmployeeController::class, 'inactive_list'])->name('employees.inactive_list');
    Route::get('employee/status-change/{id:id}', [EmployeeController::class, 'statusChange'])->name('employee.status_change');
    Route::get('employee/download/{id:id}', [EmployeeController::class, 'download'])->name('employee.download');
    Route::post('employee/profile-picture-update/{id:id}', [EmployeeController::class, 'profilePictureUpdate'])->name('employee.profile_picture_update');
    Route::post('employee/skill-type', [EmployeeController::class, 'skillTypeStore'])->name('employee.skill_type_store');
    Route::get('employee/get-skill-type', [EmployeeController::class, 'getSkillType'])->name('employee.get_skill_type');
    Route::post('employee/delete-skill-type/{id:id}', [EmployeeController::class, 'deleteSkillType'])->name('employee.delete_skill_type');
    Route::post('employee/certificate-type', [EmployeeController::class, 'certificateTypeStore'])->name('employee.certificate_type_store');
    Route::get('employee/get-certificate-type', [EmployeeController::class, 'getCertificateType'])->name('employee.get_certificate_type');
    Route::post('employee/delete-certificate-type/{id:id}', [EmployeeController::class, 'deleteCertificateType'])->name('employee.delete_certificate_type');
    Route::get('get-employee/{id}', [EmployeeController::class, 'getEmployeeByID'])->name('employee.by-id');

    Route::get('setup-rules', [SetupRuleController::class, 'index'])->name('setup_rules.index');
    Route::post('setup-rules/store', [SetupRuleController::class, 'store'])->name('setup_rules.store');
    Route::post('setup-rules/{id:id}', [SetupRuleController::class, 'setupRulesUpdate'])->name('setup_rules.update');
    Route::delete('setup-rules/destroy/{id:id}', [SetupRuleController::class, 'destroy'])->name('setup_rules.destroy');

    Route::prefix('payroll')->group(function () {
        Route::get('salary-approval/{uuid}', [SalaryGenerateController::class, 'getSalaryApproval'])->name('salary.approval-form');
        Route::post('salary-approval/{uuid}', [SalaryGenerateController::class, 'salaryApproval'])->name('salary.approval');
        Route::resource('salary-setup', SalarySetupController::class);
    });

    Route::resource('performance-criterias', EmployeePerformanceCriteriaController::class);

    Route::name('candidate.')->prefix('recruitment')->group(function () {
        Route::resource('/', CandidateInformationController::class)->parameter('', 'candidate');
    });

    Route::name('shortlist.')->prefix('shortlist')->group(function () {
        Route::resource('/', CandidateShortlistController::class)->parameter('', 'shortlist');
    });

    Route::name('interview.')->prefix('interview')->group(function () {
        Route::resource('/', CandidateInterviewController::class)->parameter('', 'interview');
    });

    Route::get('get-position', 'CandidateInterviewController@getPosition')->name('interview.get-position');

    Route::name('selection.')->prefix('selection')->group(function () {
        Route::resource('/', CandidateSelectionController::class)->parameter('', 'selection');
    });

    Route::name('bank.')->group(function () {
        Route::controller(BankController::class)->group(function () {
            Route::get('/banks/index', 'index')->name('index');
            Route::get('/banks/create', 'create')->name('create');
            Route::post('/banks/store', 'store')->name('store');
            Route::get('/banks/{bank}', 'show')->name('show');
            Route::get('/banks/{bank:uuid}/edit', 'edit')->name('edit');
            Route::put('/update/banks/{bank:uuid}', 'update')->name('update');
            Route::delete('delete/banks/{bank:uuid}', 'destroy')->name('destroy');
        });
    });

    Route::name('holiday.')->group(function () {
        Route::controller(HolidayController::class)->group(function () {
            Route::get('/holidays/week/index', 'weekholiday')->name('weekholiday');
            Route::get('/holidays/index', 'index')->name('index');
            Route::get('/holidays/create', 'create')->name('create');
            Route::post('/holidays/store', 'store')->name('store');
            Route::get('/holidays/{holiday}', 'show')->name('show');
            Route::get('/holidays/{holiday:uuid}/edit', 'edit')->name('edit');
            Route::put('/update/holidays/{holiday:uuid}', 'update')->name('update');
            Route::delete('delete/holidays/{holiday:uuid}', 'destroy')->name('destroy');
        });
    });

    Route::name('leave.')->group(function () {
        Route::controller(LeaveController::class)->group(function () {
            Route::get('/leaves/type/week/index', 'weekleave')->name('weekleave');
            Route::get('/leaves/type/week/edit/{uuid}', 'weekleave_edit')->name('weekleave.edit');
            Route::post('/leaves/type/week/update/{weeklyholiday:uuid}', 'weekleave_update')->name('weekholidays.update');
            Route::get('/leaves/type/index', 'leaveTypeindex')->name('leaveTypeindex');
            Route::get('/leaves/generate/index', 'leaveGenerate')->name('leaveGenerate');
            Route::post('/leaves/generate/', 'generateLeave')->name('generateLeave');
            Route::get('/leaves/generate/detail/{yearid}', 'generateLeaveDetail')->name('generateLeaveDetail');
            Route::get('/leaves/index', 'index')->name('index');
            Route::get('/leaves/create', 'create')->name('create');
            Route::get('/leaves/edit/{id:id}', 'leaveApplicationEdit')->name('leave_application_edit');
            Route::post('/leaves/store', 'store')->name('store');
            Route::get('/leaves/{leave:uuid}/edit', 'edit')->name('edit');
            Route::put('/update/leaves/{leave:uuid}', 'update')->name('update');
            Route::get('/leaves/approved/{leave:uuid}', 'showApproveLeaveApplication')->name('show_approve_leave_application');
            Route::put('/update/leaves/approved/{leave:uuid}', 'approved')->name('approved');
            Route::delete('delete/leaves/{leave:uuid}', 'destroy')->name('destroy');

            Route::get('/leaves/approvals', 'leaveApproval')->name('approval');
            Route::put('leaves/approvals/{uuid}', 'ApprovedByManager')->name('approved-by-manager');
        });
    });

    Route::resource('leave-types', LeaveTypeController::class);

    Route::name('attendances.')->group(function () {
        Route::controller(ManualAttendanceController::class)->group(function () {
            Route::get('/attendances/index', 'index')->name('index');
            Route::post('/attendances/store', 'store')->name('store');
            Route::get('/attendances/create', 'create')->name('create');
            Route::post('/attendances/bulk/store', 'bulk')->name('bulk');
            Route::get('/attendances/monthly/create', 'monthlyCreate')->name('monthlyCreate');
            Route::post('/attendances/monthly/store', 'monthlyStore')->name('monthlyStore');
            Route::get('/attendances/missing-attendance', 'missingAttendance')->name('missingAttendance');
            Route::post('/attendances/missing-attendance', 'missingAttendanceStore')->name('missingAttendance.store');
            Route::post('/attendances/monthly-attendance-bulk-import', 'monthlyAttendanceBulkImport')->name('monthly_attendance_bulk_import');
            Route::get('/attendances/{attendance}', 'show')->name('show');
            Route::get('/attendances/edit/{attendance}', 'edit')->name('edit');
            Route::put('/update/attendances/{attendance}', 'update')->name('update');
            Route::delete('/attendances/delete/{attendance}', 'destroy')->name('destroy');
        });
    });

    Route::name('idprint.')->group(function () {
        Route::controller(IdcardController::class)->group(function () {
            Route::get('/id/print/student/index', 'studentindex')->name('studentindex');
            Route::get('/id/print/employee/index', 'employeeindex')->name('employeeindex');
            Route::get('/id/show/student/{idprint:uuid}', 'studentshow')->name('studentshow');
            Route::get('/id/show/employee/{idprint:uuid}', 'employeeshow')->name('employeeshow');
        });
    });

    Route::name('reports.')->group(function () {
        Route::controller(ReportController::class)->group(function () {
            Route::get('reports/employee', 'employeeReport')->name('employee');
            Route::get('reports/staff-attendance', 'staffAttendanceReport')->name('staff-attendance');
            Route::get('reports/lateness-closing-attendance', 'latenessClosingAttendanceReport')->name('lateness-closing-attendance');
            Route::get('reports/attendance-log', 'attendanceLogReport')->name('attendance-log');
            Route::get('reports/daily-present', 'dailyPresentReport')->name('daily-present');
            Route::get('reports/monthly', 'monthlyReport')->name('monthly');
            Route::get('reports/monthly-report', 'monthlyReportShow')->name('monthly-report');
            Route::get('reports/attendance-log/{employee}', 'attendanceLogEmployeeDetails')->name('attendance-log-details');
            Route::get('reports/staff-attendance/detail/{id}', 'staffAttendanceDetailReport')->name('staff-attendance-detail');
            Route::get('reports/job-card', 'jobCardReport')->name('job-card');
            Route::get('reports/job-card-reports', 'jobCardReportShow')->name('job_card_reports');
            Route::get('reports/attendance-summery', 'attendanceSummery')->name('attendance-summery');
            Route::get('reports/contract-renewal', 'contractRenewalReport')->name('contract-renewal');
            Route::get('reports/allowance', 'allowanceReport')->name('allowance');
            Route::get('reports/deduction', 'deductionReport')->name('deduction');
            Route::get('reports/leave', 'leaveReport')->name('leave');
            Route::get('reports/salary-advance', 'salaryAdvanceReport')->name('salary-advance');
            Route::get('reports/adhoc-advance', 'adhocAdvanceReport')->name('adhoc-advance');
            Route::post('reports/adhoc-advance', 'adhocAdvanceReportShow')->name('adhoc-advance-show');

            // Payroll Reports
            Route::get('reports/payroll', 'npf3SocSecTaxReport')->name('npf3-soc-sec-tax-report');
            Route::get('reports/payroll/npf3_soc_sec_tax_report', 'npf3SocSecTaxReportShow')->name('npf3-soc-sec-tax-report-show');
            Route::get('reports/payroll/npf3_soc_sec_tax/{id}/pdf', 'npf3SocSecTaxPdf')->name('npf3-soc-sec-tax-pdf');
            Route::get('reports/payroll/iicf3_contribution', 'iicf3Contribution')->name('iicf3-contribution');
            Route::get('reports/payroll/iicf3_contribution_report', 'iicf3ContributionShow')->name('iicf3-contribution-report-show');
            Route::get('reports/payroll/iicf3_contribution_pdf/{id}/pdf', 'iicf3ContributionPdf')->name('iicf3-contribution-pdf');
            Route::get('reports/payroll/social_security_npf_icf', 'socialSecurityNpfIcfReport')->name('social-security-npf-icf');
            Route::get('reports/payroll/social_security_npf_icf_report', 'socialSecurityNpfIcfShow')->name('social-security-npf-icf-show');
            Route::get('reports/payroll/social_security_npf_icf_pdf/{id}/pdf', 'socialSecurityNpfIcfPdf')->name('social-security-npf-icf-pdf');
            Route::get('reports/payroll/gra_ret_5_report', 'graRet5ReportReport')->name('gra-ret-5-report');
            Route::get('reports/payroll/gra_ret_5_report_report', 'graRet5ReportReportShow')->name('gra-ret-5-show');
            Route::get('reports/payroll/gra_ret_5_report_pdf/{id}/pdf', 'graRet5ReportReportPdf')->name('gra-ret-5-pdf');
            Route::get('reports/payroll/sate_income_tax', 'sateIncomeTaxReport')->name('sate-income-tax');
            Route::get('reports/payroll/sate_income_tax_report', 'sateIncomeTaxReportShow')->name('sate-income-tax-show');
            Route::get('reports/payroll/sate_income_tax_pdf/{id}/pdf', 'sateIncomeTaxReportPdf')->name('sate-income-tax5-pdf');
            Route::get('reports/payroll/salary_confirmation_form', 'salaryConfirmationForm')->name('salary-confirmation-form');
            Route::get('reports/payroll/salary_confirmation_form_report', 'salaryConfirmationFormShow')->name('salary-confirmation-show');
            Route::get('reports/payroll/salary_confirmation_form_pdf/{id}/pdf', 'salaryConfirmationFormPdf')->name('salary-confirmation-pdf');
        });
    });

    Route::get('reports/employee-wise-attendance-summery', [ReportController::class, 'employeeWiseAttendanceSummery'])->name('reports.employee_wise_attendance_summery');
    Route::get('reports/employee-wise-attendance-summery-reports', [ReportController::class, 'employeeWiseAttendanceSummeryReports'])->name('reports.employee_wise_attendance_summery_reports');
});

/*Routes for Notices */
Route::group(['prefix' => 'notice', 'middleware' => ['auth']], function () {

    Route::get('/notices', 'NoticeController@index')->name('notice.index');

    Route::controller(NoticeController::class)->name('notice.')->group(function () {

        Route::get('/notices/create', 'create')->name('create');
        Route::post('/notices/store', 'store')->name('store');
        Route::put('/update/notices/{notice:uuid}', 'update')->name('update');
        Route::delete('delete/notices/{notice:uuid}', 'destroy')->name('destroy');
    });
});

// Routes for Payroll
Route::group(['prefix' => 'payroll', 'middleware' => ['auth']], function () {

    Route::resource('salary-advance', SalaryAdvanceController::class);
    Route::get('salary-generate', [SalaryGenerateController::class, 'salaryGenerateForm'])->name('salary.generate-form');
    Route::post('salary-generate', [SalaryGenerateController::class, 'salaryGenerate'])->name('salary.generate');
    Route::get('manage-salaries', [SalaryGenerateController::class, 'employeeSalary'])->name('employee.salary');
    Route::get('empl/payslip/{uuid}', [SalaryGenerateController::class, 'employeePayslip'])->name('employee.payslip');
    Route::get('empl/payslip/{uuid}/pdf', [SalaryGenerateController::class, 'downloadPayslip'])->name('employee.payslip-pdf');
    Route::get('salary-chart/{uuid}', [SalaryGenerateController::class, 'salaryChart'])->name('salary.chart');
    Route::post('salary-approval/{uuid}', [SalaryGenerateController::class, 'salaryApproval'])->name('salary.approval');
    Route::delete('salary-sheet/{uuid}', [SalaryGenerateController::class, 'destroy'])->name('salary-sheet.destroy');

});

Route::group(['prefix' => 'tax-setup', 'middleware' => ['auth']], function () {
    Route::get('/', [TaxCalculationController::class, 'index'])->name('tax-setup.index');
    Route::post('/', [TaxCalculationController::class, 'store'])->name('tax-setup.store');
});
