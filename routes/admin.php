<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Admin
Route::prefix("admin-auth")->group(function () {
    Route::post("login", "AuthController@login");
    Route::get("veriy-token", "AuthController@verifyToken");
    Route::get("logout", "AuthController@logout");
});

Route::prefix("students")->group(function () {
    Route::post("", "StudentController@store");
    Route::post("update", "StudentController@update");
    Route::delete("{id}", "StudentController@delete");
    Route::get("", "StudentController@index");
    Route::get("levels", "StudentController@getLevels");
    Route::get("guardians", "StudentController@getGuardians");
    Route::get("toggle-status/{id}", "StudentController@toggleStatus");
    Route::get("{id}", "StudentController@find");
});

Route::prefix("contests")->group(function () {
    Route::post("", "ContestController@store");
    Route::post("update", "ContestController@update");
    Route::delete("{id}", "ContestController@delete");
    Route::get("", "ContestController@index");
    Route::get("employees", "ContestController@getEmployees");
    Route::get("students", "ContestController@getStudents");
    Route::get("types", "ContestController@getContestTypes");
    Route::get("toggle-status/{id}", "ContestController@toggleStatus");
    Route::get("{id}", "ContestController@find");
});

Route::prefix("about")->group(function () {
    Route::post("", "AboutController@store");
    Route::get("", "AboutController@getAbout");
});

Route::prefix("setting")->group(function () {
    Route::post("", "SettingController@store");
    Route::get("", "SettingController@getAbout");
});

Route::prefix("guardians")->group(function () {
    Route::post("", "GuardianController@store");
    Route::post("update", "GuardianController@update");
    Route::delete("{id}", "GuardianController@delete");
    Route::get("", "GuardianController@index");
    Route::get("toggle-status/{id}", "GuardianController@toggleStatus");
    Route::get("{id}", "GuardianController@find");
});


Route::prefix("sessions")->group(function () {
    Route::post("", "SessionController@store");
    Route::delete("{id}", "SessionController@delete");
    Route::get("", "SessionController@index");
    Route::get("employees", "SessionController@getEmployees");
});

Route::prefix("tests")->group(function () {
    Route::post("", "TestController@store");
    Route::delete("{id}", "TestController@delete");
    Route::get("", "TestController@index");
    Route::get("employees", "TestController@getEmployees");
    Route::get("types", "TestController@getTypes");
});

Route::prefix("test-rates")->group(function () {
    Route::post("", "TestRateController@store");
    Route::post("update", "TestRateController@update");
    Route::delete("{id}", "TestRateController@delete");
    Route::get("", "TestRateController@index");
    Route::get("employees", "TestRateController@getEmployees");
    Route::get("students/{employeeId}", "TestRateController@getStudents");
    Route::get("tests/{employeeId}", "TestRateController@getTests");
    Route::get("{id}", "TestRateController@find");
});

Route::prefix("general-rates")->group(function () {
    Route::post("", "GeneralRateController@store");
    Route::post("update", "GeneralRateController@update");
    Route::delete("{id}", "GeneralRateController@delete");
    Route::get("", "GeneralRateController@index");
    Route::get("employees", "GeneralRateController@getEmployees");
    Route::get("students/{employeeId}", "GeneralRateController@getStudents");
    Route::get("rates", "GeneralRateController@getRates");
    Route::get("{id}", "GeneralRateController@find");
});


Route::prefix("rates")->group(function () {
    Route::post("", "RateController@store");
    Route::post("update", "RateController@update");
    Route::delete("{id}", "RateController@delete");
    Route::get("", "RateController@index");
    Route::get("toggle-status/{id}", "RateController@toggleStatus");

    Route::get("{id}", "RateController@find");
});

Route::prefix("attendances")->group(function () {
    Route::post("", "AttendanceController@store");
    Route::get("", "AttendanceController@index");
    Route::get("employees", "AttendanceController@getEmployees");
    Route::get("students", "AttendanceController@getStudents");
    Route::get("sessions/{employeeId}", "AttendanceController@getSessions");
    Route::get("all-sessions", "AttendanceController@getAllSessions");
});


Route::prefix("notifications")->group(function () {
    Route::post("", "NotificationController@store");
    Route::get("", "NotificationController@index");
    Route::get("employees", "NotificationController@getEmployees");
    Route::get("students", "NotificationController@getStudents");
});

Route::prefix("transactions")->group(function () {
    Route::post("", "TransactionController@store");
    Route::get("", "TransactionController@index");
    Route::get("employees", "TransactionController@getEmployees");
    Route::get("students", "TransactionController@getStudents");
    Route::get("account-items", "TransactionController@getAccountItems");
});


Route::prefix("session-traces")->group(function () {
    Route::post("", "SessionTraceController@store");
    Route::get("", "SessionTraceController@index");
    Route::get("employees", "SessionTraceController@getEmployees");
    Route::get("students", "SessionTraceController@getAllStudents");
    Route::get("students/{studentId}", "SessionTraceController@getStudents");
    Route::get("sessions/{employeeId}", "SessionTraceController@getSessions");
    Route::get("sessions", "SessionTraceController@getAllSessions");
});


Route::prefix("employees")->group(function () {
    Route::post("", "EmployeeController@store");
    Route::post("update", "EmployeeController@update");
    Route::delete("{id}", "EmployeeController@delete");
    Route::get("", "EmployeeController@index");
    Route::get("toggle-status/{id}", "EmployeeController@toggleStatus");
    Route::get("students", "EmployeeController@getStudents");
    Route::get("{id}", "EmployeeController@find");
});

Route::prefix("profiles")->group(function () {
    Route::get("students", "ProfileController@getStudents");
    Route::get("rates", "ProfileController@getRates");
    Route::get("rates/{studentId}", "ProfileController@getStudentRates");
    Route::get("guardians", "ProfileController@getGuardians");
    Route::get("guardian-students/{guardianId}", "ProfileController@getGuardianStudents");
    Route::post("students/{id}", "ProfileController@getStudent");
});

Route::prefix("packages")->group(function () {
    Route::post("", "PackageController@store");
    Route::post("update", "PackageController@update");
    Route::delete("{id}", "PackageController@delete");
    Route::get("", "PackageController@index");
    Route::get("toggle-status/{id}", "PackageController@toggleStatus");
    Route::get("levels", "PackageController@getLevels");
    Route::get("{id}", "PackageController@find");
});


Route::prefix("media-manager")->group(function () {
    Route::post("", "MediaManagerController@store");
    Route::get("", "MediaManagerController@getAllMedia");
    Route::delete("{id}", "MediaManagerController@deleteMedia");
});

Route::prefix("reports")->group(function () {
    Route::get("total-hours", "ReportController@getTotalHoursReport");
    Route::get("employees", "ReportController@getEmployees");
    Route::get("students", "ReportController@getStudents");
    Route::get("attendances", "ReportController@getAttendancesReport");
    Route::get("session-traces", "ReportController@getSessionTraceReport");
    Route::get("best-students", "ReportController@getBestStudentReport");
    Route::get("total-expenses-revenues", "ReportController@getTotalExpensesRevenues");
    Route::get("expenses-revenues", "ReportController@getExpensesRevenues");
    Route::get("account-items", "ReportController@getAccountItems");
});


Route::prefix("account-items")->group(function () {
    Route::post("", "AccountItemController@store");
    Route::post("update", "AccountItemController@update");
    Route::delete("{id}", "AccountItemController@delete");
    Route::get("", "AccountItemController@index");
    Route::get("toggle-status/{id}", "AccountItemController@toggleStatus");
    Route::get("{id}", "AccountItemController@find");
});

Route::prefix("events")->group(function () {
    Route::post("", "EventController@store");
    Route::post("update", "EventController@update");
    Route::delete("{id}", "EventController@delete");
    Route::get("", "EventController@index");
    Route::get("toggle-status/{id}", "EventController@toggleStatus");
    Route::get("{id}", "EventController@find");
});

Route::prefix("contacts")->group(function () {
    Route::delete("{id}", "ContactController@delete");
    Route::get("", "ContactController@index");
    Route::get("{id}", "ContactController@find");
});


Route::prefix("employee-platforms")->group(function () {
    Route::post("", "EmployeePlatformController@store");
    Route::post("update", "EmployeePlatformController@update");
    Route::delete("{id}", "EmployeePlatformController@delete");
    Route::get("", "EmployeePlatformController@index");
    Route::get("toggle-status/{id}", "EmployeePlatformController@toggleStatus");
    Route::get("{id}", "EmployeePlatformController@find");
});


Route::prefix("supervisors")->group(function () {
    Route::post("", "SupervisorController@store");
    Route::post("update", "SupervisorController@update");
    Route::delete("{id}", "SupervisorController@delete");
    Route::get("", "SupervisorController@index");
    Route::get("toggle-status/{id}", "SupervisorController@toggleStatus");
    Route::get("{id}", "SupervisorController@find");
});

Route::prefix("blogs")->group(function () {
    Route::post("", "BlogController@store");
    Route::post("update", "BlogController@update");
    Route::delete("{id}", "BlogController@delete");
    Route::get("", "BlogController@index");
    Route::get("toggle-status/{id}", "BlogController@toggleStatus");
    Route::get("{id}", "BlogController@find");
});
