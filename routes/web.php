<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\AuthDashboardController;
use App\Http\Controllers\dashboard\DashboardTaskManagement;
use App\Http\Controllers\dashboard\tugasController as DashboardTugasController;
use App\Http\Controllers\dashboard\MemberController as DashboardMemberController;
use App\Http\Controllers\dashboard\StatistikController;
use App\Http\Controllers\firebase\MemberController;
use App\Http\Controllers\firebase\taskmanagementcontroller;
use App\Http\Controllers\firebase\tugascontroller;
use App\Http\Controllers\firebase\userscontroller;
use Illuminate\Support\Facades\Route;

// Halaman beranda
Route::get('/', function () {
    return view('welcome');
});

Route::get('/taskmanagement', [taskmanagementcontroller::class, 'TaskManagementApp'])->name('taskmanagement.app');
Route::post('/taskmanagement', [userscontroller::class, 'Login']);

Route::get('/tugas', [TugasController::class, 'tugasPage'])->name('taskmanagement.tugas');
Route::get('/project/{id}', [TugasController::class, 'showProject'])->name('taskmanagement.project.show');
Route::get('/task/{id}', [TugasController::class, 'showTask'])->name('taskmanagement.tugas.show');
Route::post('/task/{taskId}/upload', [TugasController::class, 'uploadDocument'])->name('task.uploadDocument');

// Rute tanpa autentikasi untuk member
Route::get('/member', [MemberController::class, 'MemberPage'])->name('taskmanagement.member');

Route::post('/login', [AuthController::class, 'loginAuth'])->name('login.store');
Route::get('/register', [userscontroller::class, 'RegisterPage'])->name('taskmanagement.register');
Route::post('/register', [AuthController::class, 'registerAuth'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::put('/project/{id}/update-status', [TugasController::class, 'updateStatus'])->name('project.updateStatus');
});

// Dashboard routes
Route::get('/logindashboard', [AuthDashboardController::class, 'ViewDashboardLogin'])->name('dashboard.login');
Route::post('/logindashboard', [AuthDashboardController::class, 'LoginDashboard'])->name('login.dashboardstore');

// Rute untuk register dashboard
Route::get('/registerdashboard', [AuthDashboardController::class, 'ViewDashboardRegister'])->name('dashboard.register');
Route::post('/registerdashboard', [AuthDashboardController::class, 'RegisterStoreData'])->name('register.dashboard');

// Rute untuk dashboard
Route::get('/dashboard', [DashboardTaskManagement::class, 'ViewDashboard'])->name('dashboard.app');
Route::post('/dashboard/logout', [AuthDashboardController::class, 'LogoutAdminDashboard'])->name('dashboard.logout'); // Logout dashboard
Route::get('/dashboard/member', [DashboardMemberController::class, 'ViewMemberDashboard'])->name('dashboard.member');
Route::get('/dashboard/tugas', [DashboardTugasController::class, 'ViewTugasDashboard'])->name('dashboard.tugas');
Route::get('/dashboard/statistik', [StatistikController::class, 'Statistik'])->name('dashboard.statistik');

// Member CRUD
define('ROUTE_ID', '/{id}');

Route::prefix('/dashboard/member')->group(function () {
    Route::get('/', [DashboardMemberController::class, 'ViewMemberDashboard'])->name('dashboard.member');
    Route::get(ROUTE_ID, [DashboardMemberController::class, 'show'])->name('dashboard.member.show');
    Route::get(ROUTE_ID . '/edit', [DashboardMemberController::class, 'edit'])->name('dashboard.member.edit');
    Route::put(ROUTE_ID, [DashboardMemberController::class, 'update'])->name('dashboard.member.update');
    Route::delete(ROUTE_ID, [DashboardMemberController::class, 'destroy'])->name('dashboard.member.destroy');
});

// Tugas CRUD
Route::prefix('/dashboard/tugas')->group(function () {
    Route::get('/tugas', [DashboardTugasController::class, 'ViewTugasDashboard'])->name('dashboard.tugas.tugas');
    Route::get('/tugas/{id}', [DashboardTugasController::class, 'ShowDetail'])->name('dashboard.tugas.project_detail');
    Route::get('/tambah_tugas', [DashboardTugasController::class, 'ViewTambahTugas'])->name('dashboard.tugas.tambah');
    Route::post('/store', [DashboardTugasController::class, 'ViewAndStoreProject'])->name('dashboard.tugas.store');
    Route::delete('/tugas/{id}', [DashboardTugasController::class, 'DestroyProject'])->name('dashboard.tugas.destroy');
});


