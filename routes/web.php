<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CrmFormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OutboundCrmFormController;
use App\Http\Controllers\InboundReportController;
use App\Http\Controllers\OutboundReportController;

// Public routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    // Dashboard and root redirect
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Settings
    Route::get('/settings/mail', [SettingsController::class, 'mailConfigure'])->name('mail.configure');

    // CRM Form Routes - Fixed to match sidebar
    Route::prefix('crm')->name('crmform.')->group(function () {
        // Dynamic form creation with type parameter
        Route::get('/form/inbound', [CrmFormController::class, 'create'])->name('create');
        Route::post('/store', [CrmFormController::class, 'store'])->name('store');
        Route::get('/data', [CrmFormController::class, 'getData'])->name('data');
        Route::get('/get-category-fields', [CrmFormController::class, 'getCategoryFields'])->name('getCategoryFields');
        Route::get('/campaign', [CrmFormController::class, 'campaign'])->name('campaign');
    });
    // Outbound CRM Form
    Route::group(['prefix' => 'outbound', 'as' => 'outbound.'], function () {
        // Navara Campaign - Outbound
        Route::get('form/{type}', [OutboundCrmFormController::class, 'formType'])->name('form.type');
    });

    //Inbound Reports Routes
    Route::prefix('inbound')->name('inbound_reports.')->group(function () {
        Route::get('/', [InboundReportController::class, 'index'])->name('index');
    });


    // Outbound Reports Routes
    Route::prefix('outbound')->name('outbound_reports.')->group(function () {
        Route::get('/questionnaire', [OutboundReportController::class, 'questionnaire'])->name('questionnaire');
        Route::get('/general-survey', [OutboundReportController::class, 'showForm'])->name('general-survey.form');
        Route::post('/submit-survey', [OutboundReportController::class, 'submitSurvey'])->name('general-survey.submit');
        Route::get('/feedback-survey', [OutboundReportController::class, 'feedbackSurvey'])->name('feedback-survey');
    });

    // Reports Routes
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/sms', [ReportController::class, 'sms'])->name('sms');
        Route::get('/ticket', [ReportController::class, 'ticket'])->name('ticket');
    });

    // Tickets Routes - Fixed to match sidebar
    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/all', [TicketController::class, 'all'])->name('all');
        Route::get('/create', [TicketController::class, 'create'])->name('create');
        Route::get('/resolved', [TicketController::class, 'resolved'])->name('resolved');
    });

    // Leads Routes
    Route::prefix('leads')->name('leads.')->group(function () {
        Route::get('/import', [LeadController::class, 'import'])->name('import');
        Route::post('/import', [LeadController::class, 'storeImport'])->name('import.store');
        Route::get('/reset', [LeadController::class, 'reset'])->name('reset');
        Route::delete('/reset', [LeadController::class, 'destroyAll'])->name('reset.destroy');
        Route::get('/template', [LeadController::class, 'downloadTemplate'])->name('template.download');
    });


    // FAQs Routes
    Route::prefix('faqs')->group(function () {
        Route::get('/view', [FaqController::class, 'view'])->name('faqs.view');
        Route::get('/add', [FaqController::class, 'add'])->name('faqs.add');
        Route::get('/categories', [FaqController::class, 'categories'])->name('faqs.categories');
        Route::get('/categories/create', [FaqController::class, 'categoriesCreate'])->name('faqs.categories.create');
        Route::post('/store', [FaqController::class, 'store'])->name('faqs.store');
        Route::get('/crop', [FaqController::class, 'crop'])->name('faqs.crops');
        Route::get('/crops/create', [FaqController::class, 'cropsCreate'])->name('faqs.crops.create');
        Route::get('/identification', [FaqController::class, 'identification'])->name('faqs.identifications');
        Route::get('/identification/create', [FaqController::class, 'identificationCreate'])->name('faqs.identifications.create');
    });

    // Products Routes
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/list', [ProductController::class, 'list'])->name('list');
        Route::get('/add-feature', [ProductController::class, 'addFeature'])->name('addFeature');
        Route::get('/feature-categories', [ProductController::class, 'featureCategories'])->name('featureCategories');
    });

    // SMS Routes
    Route::prefix('sms')->name('sms.')->group(function () {
        Route::get('/feature', [SmsController::class, 'feature'])->name('feature');
        Route::get('/brochure', [SmsController::class, 'brochure'])->name('brochure');
        Route::get('/templates', [SmsController::class, 'templates'])->name('templates');
        Route::get('/send-bulk', [SmsController::class, 'sendBulk'])->name('sendBulk');
    });


    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile');
    });
});
