<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'submit');
    }

    public function index(){
        $dishes = Dish::orderBy('id', 'desc')->get();
        $tables = Table::all();

        $rawStatus = config('restaurant.order_status');
        $status = array_flip($rawStatus);
        $orders = Order::where('status', [4])->get();
        return view('order_form', compact('dishes', 'tables', 'orders', 'status'));
    }

    public function submit(Request $request)
    {
        $data = array_filter($request->except('_token','table'));
        $orderId = rand();
        
        foreach ($data as $key => $value){
            if($value > 1){
                for ($i = 1; $i <= (int)$value; $i++){
                    $this->saveOrder($orderId, $key, $request);
                }
            }else {
                $this->saveOrder($orderId, $key, $request);
            }
        }
        return redirect('/')->with('message', 'Order submitted successfully!');
    }

    public function saveOrder($orderId, $key, $request)
    {
        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $key;
        $order->table_id = $request->table;
        $order->status = config('restaurant.order_status.new');

        $order->save();
    }

    public function serve(Order $order)
    {
        $order->status = config('restaurant.order_status.done');
        $order->save();

        return redirect('/')->with('message', 'Order serve to customer.');
    }
}
