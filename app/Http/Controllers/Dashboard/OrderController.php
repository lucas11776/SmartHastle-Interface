<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Get all request order.
     *
     * @return Factory|View
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate();

        return view('dashboard.order.orders', ['orders' => $orders]);
    }

    /**
     * Display a single order.
     *
     * @param Order $order
     * @return Factory|View
     */
    public function view(Order $order)
    {
        return view('dashboard.order.single', ['order' => $order]);
    }

    /**
     * Get order by status.
     *
     * @param string $status
     * @return Factory|View
     */
    public function status(string $status)
    {
        $orders = Order::where('status', $status)
            ->orderBy('created_at', $status == 'completed' || $status == 'declined' ? 'DESC' : 'ASC')
            ->paginate(12);

        return view('dashboard.order.orders', ['orders' => $orders]);
    }
}
