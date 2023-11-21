<?php

namespace App\Http\Controllers\Admin;

use App\HelpersClass\Date;
use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use App\Models\RechargeHistory;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::select('id')->count();
        $totalRoom = Room::select('id')->count();
        $totalPay = PaymentHistory::select('id')->count();
        $totalRechargeHistory = RechargeHistory::select('id')->count();

        $users = User::orderByDesc('id')->limit(20)->get();

        $paymentHistory = PaymentHistory::with('user:id,name')
            ->orderByDesc('id')->limit(10)->get();

        $listDay = Date::getListDayInMonth();

        //Doanh thu theo tháng ứng với trạng thái đã xử lý
        $revenueTransactionMonth = RechargeHistory::where('status', RechargeHistory::STATUS_SUCCESS)
            ->whereMonth('created_at', date('m'))
            ->select(\DB::raw('sum(total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();


        $arrRevenueTransactionMonth = [];
        foreach ($listDay as $day) {
            $total = 0;
            foreach ($revenueTransactionMonth as $key => $revenue) {
                if ($revenue['day'] == $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }

            $arrRevenueTransactionMonth[] = (int)$total;
        }

        $viewData = [
            'totalUser'                  => $totalUser,
            'totalRoom'                  => $totalRoom,
            'totalPay'                   => $totalPay,
            'totalRechargeHistory'       => $totalRechargeHistory,
            'paymentHistory'             => $paymentHistory,
            'users'                      => $users,
            'listDay'                    => json_encode($listDay),
            'arrRevenueTransactionMonth' => json_encode($arrRevenueTransactionMonth),
        ];

        return view('admin.pages.index', $viewData);
    }
}
