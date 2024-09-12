<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        return response()->json($users);       
    }

    public function getUsersWithCondition()
    {
        $users = DB::table('users')->where('age', '>', 25)->get();
        return response()->json($users);
    }

    public function getUsersWithMultipleConditions()
    {
        $users = DB::table('users')
            ->where('age', '>', 25)
            ->where('status', 'active')
            ->get();
        return response()->json($users);
    }

    public function getUsersOrderedByAge()
    {
        $users = DB::table('users')->orderBy('age', 'desc')->get();
        return response()->json($users);
    }

    public function getLimitedProducts()
    {
        $products = DB::table('products')->limit(10)->get();
        return response()->json($products);
    }

    public function getOrdersWithConditionOr()
    {
        $orders = DB::table('orders')
            ->where('status', 'completed')
            ->orWhere('total', '>', 100)
            ->get();
        return response()->json($orders);
    }

    public function getCustomersWithNameLike()
    {
        $customers = DB::table('customers')
            ->where('name', 'LIKE', '%john%')
            ->get();
        return response()->json($customers);

        // DB::table('posts')
        // ->where('title', 'like', '%john%')
        // ->orWhere('description', 'like', '%john%')
        // ->orWhere('content', 'like', '%john%')
        // ->whereAll(
        //     ['title', 'description', 'content'],
        //     'like',
        //     '%john%'
        // )
        // ->ddRawSql();
    }

    public function getSalesWithAmountBetween()
    {
        $sales = DB::table('sales')
            ->whereBetween('amount', [1000, 5000])
            ->get();
        return response()->json($sales);
    }

    public function getEmployeesWithDepartmentIdIn()
    {
        $employees = DB::table('employees')
            ->whereIn('department_id', [1, 2, 3])
            ->get();
        return response()->json($employees);

        // DB::table('employees')->whereIn('department_id', [1, 2, 3])->ddRawSql();
    }

    public function getJoinedOrdersAndCustomers()
    {
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name')
            ->get();
        return response()->json($orders);
        // DB::table('orders')
        //     ->join('customers', 'orders.customer_id', '=', 'customers.id')
        //     ->ddRawSql();
    }

    public function getGroupedOrderItems()
    {
        // Truy vấn tính tổng số lượng của mỗi sản phẩm
        $orderItems = DB::table('order_items')
        ->select(DB::raw('product_id, SUM(quantity) as total_quantity'))
        ->groupBy('product_id')
        ->get();
    
    // Trả về kết quả dưới dạng JSON
    return response()->json($orderItems);
    }

    public function updateOrderStatus()
    {
        DB::table('orders')
            ->where('status', 'processing')
            ->update(['status' => 'shipped']);
        return response()->json(['message' => 'Cập nhật trangj thái thành công']);
    }

    public function deleteOldLogs()
    {
        $deleted = DB::table('logs')
            ->where('created_at', '<', '2020-01-01')
            ->delete();

        return response()->json(['message' => 'Các bản ghi cũ đã được xóa.', 'deleted' => $deleted]);
    }

    public function addProduct()
    {
        $data = [
            'name' => 'dien thoai',
            'price' => '10000',
            'quantity' => '10',
        ];
        DB::table('products')->insert($data);
        
        return response()->json(['message' => 'Them thanh cong']);
    }

    public function getUsersBornInMay()
    {
        $users = DB::table('users')
            ->whereRaw('MONTH(birth_date) = ?', [5])
            ->get();
        return response()->json($users);
    }
}
