<?php

use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $books = Book::with('author', 'categories')->get();
    return view('welcome', compact('books'));
});



// Route::get('/users', [QueryController::class, 'getAllUsers']);
// Route::get('/users/dk', [QueryController::class, 'getUsersWithCondition']);
// Route::get('/users/ndk', [QueryController::class, 'getUsersWithMultipleConditions']);
// Route::get('/users/order', [QueryController::class, 'getUsersOrderedByAge']);
// Route::get('/products/limited', [QueryController::class, 'getLimitedProducts']);
// Route::get('/orders/dk', [QueryController::class, 'getOrdersWithConditionOr']);
// Route::get('/customers/name-like', [QueryController::class, 'getCustomersWithNameLike']);
// Route::get('/sales/amount', [QueryController::class, 'getSalesWithAmountBetween']);
// Route::get('/employees/department_id', [QueryController::class, 'getEmployeesWithDepartmentIdIn']);
// Route::get('/orders/customers', [QueryController::class, 'getJoinedOrdersAndCustomers']);
// Route::get('/order-items/quantity', [QueryController::class, 'getGroupedOrderItems']);
// Route::get('/orders/update-status', [QueryController::class, 'updateOrderStatus']);

// Route::get('/logs/delete-old', [QueryController::class, 'deleteOldLogs']);
// Route::get('/products/add', [QueryController::class, 'addProduct']);
// Route::get('/users/birth_date', [QueryController::class, 'getUsersBornInMay']);
