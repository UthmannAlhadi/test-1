<?php

use App\Http\Controllers\PrintJobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\StripePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Print Job
    Route::get('/user/print-upload', [PrintJobController::class, 'displayUpload'])->name('user.print-upload');
    Route::get('/user/print-explain', [PrintJobController::class, 'displayExplain'])->name('user.print-explain');
    Route::get('/user/print-preference', [PrintJobController::class, 'displayPreference'])->name('user.print-preference');
    Route::get('/user/print-preview', [PrintJobController::class, 'displayPreview'])->name('user.print-preview');
    Route::get('/user/print-history', [PrintJobController::class, 'displayPrintHistory'])->name('user.print-history');


    // Upload File
    Route::get('/user/print-upload', [\App\Http\Controllers\TrainingController::class, 'getTrainingList'])->name('user.print-upload');
    Route::post('/user.print-upload', [\App\Http\Controllers\TrainingController::class, 'postAddTraining'])->name('user.print-upload');
    Route::get('/user/traing-form', [\App\Http\Controllers\TrainingController::class, 'getTrainingForm'])->name('user.training-form');
    Route::get('/user/training-list', [\App\Http\Controllers\TrainingController::class, 'getTrainingList'])->name('user.training-list');
    Route::get('/user/print-preview', [\App\Http\Controllers\TrainingController::class, 'printPreview'])->name('user.print-preview');
    Route::post('/user/add-training', [\App\Http\Controllers\TrainingController::class, 'postAddTraining'])->name('user.add-training');
    Route::post('/user/delete-training', [\App\Http\Controllers\TrainingController::class, 'DeleteTraining'])->name('user.delete-training');
    Route::post('/user/update-document-display', [\App\Http\Controllers\TrainingController::class, 'updateDocumentDisplay'])->name('user.update-document-display');
    Route::post('user/update-preferences', [\App\Http\Controllers\TrainingController::class, 'updatePreferences'])->name('user.update-preferences');
    Route::post('user/cancel-preview', [\App\Http\Controllers\TrainingController::class, 'cancelPreview'])->name('user.cancel-preview');

    // Payment method
    Route::get('/checkout', [StripePaymentController::class, 'checkout'])->name('checkout');
    Route::get('/payment-success', [StripePaymentController::class, 'success'])->name('payment.success');
    Route::get('/print-history', [\App\Http\Controllers\PrintHistoryController::class, 'index'])->name('print.history');


});

require __DIR__ . '/auth.php';
