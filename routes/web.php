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
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OutboundCrmFormController;
use App\Http\Controllers\InboundReportController;
use App\Http\Controllers\OutboundReportController;
use App\Http\Controllers\UserController;

// Public routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Remove registration routes completely
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes (same as your updated web.php above)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('can:view dashboard');

    // Add this route for root redirect
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // User Management (Admin only)
    Route::middleware('can:view users')->group(function () {
        Route::resource('users', UserController::class);
        Route::post('users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
    });

    // Settings
    Route::get('/settings/mail', [SettingsController::class, 'mailConfigure'])->name('mail.configure')->middleware('can:view settings');

    // CRM Form Routes
    Route::prefix('crm')->name('crmform.')->middleware('can:view crm')->group(function () {
        Route::get('/form/inbound', [CrmFormController::class, 'create'])->name('create')->middleware('can:create crm');
        Route::post('/store', [CrmFormController::class, 'store'])->name('store')->middleware('can:create crm');
        Route::get('/data', [CrmFormController::class, 'getData'])->name('data')->middleware('can:view crm');
        Route::get('/get-category-fields', [CrmFormController::class, 'getCategoryFields'])->name('getCategoryFields')->middleware('can:view crm');
        Route::get('/campaign', [CrmFormController::class, 'campaign'])->name('campaign')->middleware('can:view crm');
    });

    // Outbound CRM Form
    Route::group(['prefix' => 'outbound', 'as' => 'outbound.'], function () {
        Route::get('form/{type}', [OutboundCrmFormController::class, 'formType'])
            ->name('form.type')
            ->middleware('can:create crm');
    });

    // Inbound Reports Routes
    Route::prefix('inbound')->name('inbound_reports.')->middleware('can:view reports')->group(function () {
        Route::get('/', [InboundReportController::class, 'index'])->name('index');
        Route::get('/reports/farmer', [InboundReportController::class, 'farmer'])->name('farmer');
        Route::get('/reports/retailer', [InboundReportController::class, 'retailer'])->name('retailer');
        Route::get('/reports/dealer', [InboundReportController::class, 'dealer'])->name('dealer');
        Route::get('/reports/others', [InboundReportController::class, 'others'])->name('others');
    });

    // Outbound Reports Routes
    Route::prefix('outbound')->name('outbound_reports.')->middleware('can:view reports')->group(function () {
        Route::get('/questionnaire', [OutboundReportController::class, 'questionnaire'])->name('questionnaire');
        Route::get('/general-survey', [OutboundReportController::class, 'showForm'])->name('general-survey.form');
        Route::post('/submit-survey', [OutboundReportController::class, 'submitSurvey'])->name('general-survey.submit');
        Route::get('/feedback-survey', [OutboundReportController::class, 'feedbackSurvey'])->name('feedback-survey');
    });

    // Reports Routes
    Route::prefix('reports')->name('reports.')->middleware('can:view reports')->group(function () {
        Route::get('/sms', [ReportController::class, 'sms'])->name('sms');
        Route::get('/ticket', [ReportController::class, 'ticket'])->name('ticket');
    });

    // Tickets Routes
    Route::prefix('tickets')->name('tickets.')->middleware('can:view tickets')->group(function () {
        Route::get('/all', [TicketController::class, 'all'])->name('all');
        Route::get('/create', [TicketController::class, 'create'])->name('create')->middleware('can:create tickets');
        Route::get('/resolved', [TicketController::class, 'resolved'])->name('resolved');
    });

    // Leads Routes
    Route::prefix('leads')->name('leads.')->middleware('can:view leads')->group(function () {
        Route::get('/import', [LeadController::class, 'import'])->name('import');
        Route::post('/import', [LeadController::class, 'storeImport'])->name('import.store')->middleware('can:create leads');
        Route::get('/reset', [LeadController::class, 'reset'])->name('reset');
        Route::delete('/reset', [LeadController::class, 'destroyAll'])->name('reset.destroy');
        Route::get('/template', [LeadController::class, 'downloadTemplate'])->name('template.download');
    });

    // FAQs Routes
    Route::prefix('faqs')->middleware('can:view faqs')->group(function () {
        Route::get('/view', [FaqController::class, 'view'])->name('faqs.view');
        Route::get('/add', [FaqController::class, 'add'])->name('faqs.add')->middleware('can:create faqs');
        Route::get('/categories', [FaqController::class, 'categories'])->name('faqs.categories');
        Route::get('/categories/create', [FaqController::class, 'categoriesCreate'])->name('faqs.categories.create');
        Route::post('/store', [FaqController::class, 'store'])->name('faqs.store')->middleware('can:create faqs');
        Route::get('/crop', [FaqController::class, 'crop'])->name('faqs.crops');
        Route::get('/crops/create', [FaqController::class, 'cropsCreate'])->name('faqs.crops.create');
        Route::get('/identification', [FaqController::class, 'identification'])->name('faqs.identifications');
        Route::get('/identification/create', [FaqController::class, 'identificationCreate'])->name('faqs.identifications.create');
    });

    // Products Routes
    Route::prefix('products')->name('products.')->middleware('can:view products')->group(function () {
        Route::get('/list', [ProductController::class, 'list'])->name('list');
        Route::get('/add-feature', [ProductController::class, 'addFeature'])->name('addFeature')->middleware('can:create products');
        Route::get('/feature-categories', [ProductController::class, 'featureCategories'])->name('featureCategories');
    });

    // SMS Routes
    Route::prefix('sms')->name('sms.')->middleware('can:view sms')->group(function () {
        Route::get('/feature', [SmsController::class, 'feature'])->name('feature');
        Route::get('/brochure', [SmsController::class, 'brochure'])->name('brochure');
        Route::get('/templates', [SmsController::class, 'templates'])->name('templates');
        Route::get('/send-bulk', [SmsController::class, 'sendBulk'])->name('sendBulk')->middleware('can:create sms');
    });

    // Profile (all authenticated users can access their profile)
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile');
    });
});
