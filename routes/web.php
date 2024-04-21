<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ApartamentController;
use App\Http\Controllers\LloguerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['middleware' => 'capDepAuth'], function(){
        Route::resource('users', UserController::class);  // forma conveniente de definir rutas CRUD automáticamente para todos los métodos basicos del controlador
        Route::get('users/{user}/pdf', [UserController::class, 'pdf'])->name('users.pdf');
    });

    Route::resource('clients', ClientController::class);
    Route::get('clients/{client}/pdf', [ClientController::class, 'pdf'])->name('clients.pdf');

    Route::resource('apartaments', ApartamentController::class);
    Route::get('apartaments/{apartament}/pdf', [ApartamentController::class, 'pdf'])->name('apartaments.pdf');

    Route::resource('lloguers', LloguerController::class);
    Route::get('lloguers/{dni_client}/{codi_apartament}/pdf', [LloguerController::class, 'pdf'])->name('lloguers.pdf');
    Route::get('lloguers/{dni_client}/{codi_apartament}/edit', [LloguerController::class, 'edit'])->name('lloguers.edit');
    Route::get('lloguers/{dni_client}/{codi_apartament}', [LloguerController::class, 'show'])->name('lloguers.show');
    Route::patch('lloguers/{dni_client}/{codi_apartament}', [LloguerController::class, 'update'])->name('lloguers.update');
    Route::delete('/lloguers/{dni_client}/{codi_apartament}', [LloguerController::class, 'destroy'])->name('lloguers.destroy');
     
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
