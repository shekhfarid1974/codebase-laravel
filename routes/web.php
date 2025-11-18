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
    Route::prefix('crmform')->name('crmform.')->group(function () {
        // Dynamic form creation with type parameter
        Route::get('/create/{type}', [CrmFormController::class, 'create'])->name('create');
        Route::post('/store', [CrmFormController::class, 'store'])->name('store');
        Route::get('/data', [CrmFormController::class, 'getData'])->name('data');
        Route::get('/get-category-fields', [CrmFormController::class, 'getCategoryFields'])->name('getCategoryFields');

        // Individual category forms - using controller methods
        Route::get('/farmer', [CrmFormController::class, 'farmer'])->name('farmer');
        Route::get('/retailer', [CrmFormController::class, 'retailer'])->name('retailer');
        Route::get('/dealer', [CrmFormController::class, 'dealer'])->name('dealer');
        Route::get('/others', [CrmFormController::class, 'others'])->name('others');
        Route::get('/campaign', [CrmFormController::class, 'campaign'])->name('campaign');
    });

    // CRM Routes (for the CRM submenu)
    Route::prefix('crm')->name('crm.')->group(function () {
        Route::get('/farmer', [CrmController::class, 'farmer'])->name('farmer');
        Route::get('/dealer', [CrmController::class, 'dealer'])->name('dealer');
        Route::get('/retailer', [CrmController::class, 'retailer'])->name('retailer');
        Route::get('/others', [CrmController::class, 'others'])->name('other');
        Route::get('/campaign', [CrmController::class, 'campaign'])->name('campaign');
    });

    // Survey Routes - Fixed to match sidebar
    Route::prefix('survey')->name('survey.')->group(function () {
        Route::get('/lead', [LeadController::class, 'surveyLead'])->name('lead');
        Route::get('/reports', [LeadController::class, 'surveyReports'])->name('reports');
    });

    // Reports Routes
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/crm', [ReportController::class, 'crm'])->name('crm');
        Route::get('/campaign', [ReportController::class, 'campaign'])->name('campaign');
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
        Route::get('/reset', [LeadController::class, 'reset'])->name('reset');
    });

    // Campaigns Routes
    Route::prefix('campaigns')->name('campaigns.')->group(function () {
        Route::get('/active', [CampaignController::class, 'active'])->name('active');
        Route::get('/create', [CampaignController::class, 'create'])->name('create');
        Route::get('/archive', [CampaignController::class, 'archive'])->name('archive');
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
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
    });
});
