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

    // CRM Form Routes - Consolidated and organized
    Route::prefix('crmform')->group(function () {
        // Main CRM form (original)
        Route::get('/', [CrmFormController::class, 'create'])->name('crmform.create');
        Route::post('/store', [CrmFormController::class, 'store'])->name('crmform.store');
        Route::get('/data', [CrmFormController::class, 'getData'])->name('crmform.data');
        Route::get('/get-category-fields', [CrmFormController::class, 'getCategoryFields'])->name('crmform.getCategoryFields');
        
        // Individual category forms - using controller methods
        Route::get('/farmer', [CrmFormController::class, 'farmer'])->name('crmform.farmer');
        Route::get('/retailer', [CrmFormController::class, 'retailer'])->name('crmform.retailer');
        Route::get('/dealer', [CrmFormController::class, 'dealer'])->name('crmform.dealer');
        Route::get('/others', [CrmFormController::class, 'others'])->name('crmform.others');
    });

    // Survey Routes
    // Add your survey routes here when needed

    // Reports Routes
    Route::prefix('reports')->group(function () {
        Route::get('/crm', [ReportController::class, 'crm'])->name('reports.crm');
        Route::get('/campaign', [ReportController::class, 'campaign'])->name('reports.campaign');
        Route::get('/sms', [ReportController::class, 'sms'])->name('reports.sms');
        Route::get('/ticket', [ReportController::class, 'ticket'])->name('reports.ticket');
    });

    // Tickets Routes
    Route::prefix('tickets')->group(function () {
        Route::get('/all', [TicketController::class, 'all'])->name('tickets.all');
        Route::get('/create', [TicketController::class, 'create'])->name('tickets.create');
        Route::get('/resolved', [TicketController::class, 'resolved'])->name('tickets.resolved');
    });

    // Leads Routes
    Route::prefix('leads')->group(function () {
        Route::get('/import', [LeadController::class, 'import'])->name('leads.import');
        Route::get('/reset', [LeadController::class, 'reset'])->name('leads.reset');
    });

    // Campaigns Routes
    Route::prefix('campaigns')->group(function () {
        Route::get('/active', [CampaignController::class, 'active'])->name('campaigns.active');
        Route::get('/create', [CampaignController::class, 'create'])->name('campaigns.create');
        Route::get('/archive', [CampaignController::class, 'archive'])->name('campaigns.archive');
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
    Route::prefix('products')->group(function () {
        Route::get('/list', [ProductController::class, 'list'])->name('products.list');
        Route::get('/addFeature', [ProductController::class, 'addFeature'])->name('products.addFeature');
        Route::get('/featureCategories', [ProductController::class, 'featureCategories'])->name('products.featureCategories');
    });

    // SMS Routes
    Route::prefix('sms')->group(function () {
        Route::get('/feature', [SmsController::class, 'feature'])->name('sms.feature');
        Route::get('/brochure', [SmsController::class, 'brochure'])->name('sms.brochure');
        Route::get('/templates', [SmsController::class, 'templates'])->name('sms.templates');
        Route::get('/sendBulk', [SmsController::class, 'sendBulk'])->name('sms.sendBulk');
    });

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        // Add other profile routes here if needed
    });

    // Temporary debug routes
    Route::get('/debug-session', function () {
        dd(session()->all());
    });

    Route::get('/debug-user', function () {
        dd(auth()->user());
    });
});