<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAtm;
use App\Models\PaymentHistory;
use App\Models\RechargeHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRechargeController extends Controller
{
    public function index()
    {
        $recharge = config('payment.method');

        $viewData = [
            'recharge' => $recharge
        ];

        return view('user.recharge.index', $viewData);
    }

    public function switchRecharge($slug, $code, Request $request)
    {
        switch ($code) {
            case 1:
                return view('user.recharge.transfer');
            case 2;
                return view('user.recharge.cash');
            case 3;
                return redirect()->route('get_user.recharge.atm');
        }
    }

    public function rechargeHistory()
    {
        $rechargeHistory = RechargeHistory::with('user:id,name')
            ->where('user_id', get_data_user('web'))
            ->orderByDesc('id')->paginate(20);

        $viewData = [
            'rechargeHistory' => $rechargeHistory
        ];

        return view('user.recharge.history', $viewData);
    }

    public function paymentHistory()
    {
        $paymentHistory = PaymentHistory::with('user:id,name')
            ->where('user_id', get_data_user('web'))
            ->orderByDesc('id')->paginate(20);

        $viewData = [
            'paymentHistory' => $paymentHistory
        ];

        return view('user.recharge.payment', $viewData);
    }

    public function atmInternet(Request $request)
    {
        return view('user.recharge.atm_internet');
    }

    public function processAtmInternet(RequestAtm $request)
    {
        try {
            $data = $request->except('_token');
            $data['created_at'] = Carbon::now();
            $data['money'] = $request->price;
            $data['user_id'] = get_data_user('web');
            $data['total_money'] = $data['money'];
            $data['type'] = 3;
            $data['code'] = generateRandomString(15) . $data['user_id'];
            $rechargeHistory = RechargeHistory::create($data);
            $this->createPaymentAtm($rechargeHistory);
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
        }

        return redirect()->back();
    }

    protected function createPaymentAtm($data)
    {
        $vnp_Returnurl = "http://2023-seri-timphongtro.abc:8888/user/nap-tien/post-back-atm-internet-banking";
        $curl = curl_init();

        curl_setopt_array($curl, array (
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL            => 'https://123code.net/api/v1/payment/add',
            CURLOPT_USERAGENT      => 'phongtro',
            CURLOPT_POST           => 1,
            CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
            CURLOPT_POSTFIELDS     => http_build_query(array (
                "order_id"     => $data->code,
                "url_return"   => $vnp_Returnurl,
                "amount"       => $data->total_money * 100,
                "service_code" => "phongtro",
                "url_callback" => $vnp_Returnurl
            ))
        ));
        $resp = json_decode(curl_exec($curl), true);

        if (isset($resp["link"])) {
            var_dump($resp["link"]);
            header('location:' . $resp['link']);exit();
        }

        curl_close($curl);
        return;
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TmnCode = "Q2KB8XR2"; //Website ID in VNPAY System
        $vnp_HashSecret = "VICWBIDMSXXFAOSSKCHRRLYRZWKENRYG"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://2023-seri-timphongtro.abc:8888/user/nap-tien/post-back-atm-internet-banking";

        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = $rechargeHistory->code;
        $vnp_OrderInfo = 'Nạp tiền';
        $vnp_OrderType = 'other';
        $vnp_Amount = $rechargeHistory->total_money * 100;
        $vnp_Locale = $request->language ?? "vn"; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = "VNBANK"; //Mã phương thức thanh toán
//        $vnp_BankCode = $request->bankCode ?? "VNBANK"; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];


        $inputData = array (
            "vnp_Version"    => "2.1.0",
            "vnp_TmnCode"    => $vnp_TmnCode,
            "vnp_Amount"     => $vnp_Amount,
            "vnp_Command"    => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode"   => "VND",
            "vnp_IpAddr"     => $vnp_IpAddr,
            "vnp_Locale"     => $vnp_Locale,
            "vnp_OrderInfo"  => $vnp_OrderInfo,
            "vnp_OrderType"  => $vnp_OrderType,
            "vnp_ReturnUrl"  => $vnp_Returnurl,
            "vnp_TxnRef"     => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        } else {
            $inputData["vnp_BankCode"] = "VNPAYQR";
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
        die();
    }

    public function postbackAtm(Request $request)
    {
        try {
            DB::beginTransaction();
            $code = $request->vnp_TxnRef;
            $rechargeHistory = RechargeHistory::where('code', $code)->first();
            if (!$rechargeHistory) {
                return redirect()->route('get_user.recharge.atm');
            }
            $statusCode = $request->vnp_TransactionStatus;
            if ($statusCode == '00') {
                // tiến hành cộng tiền
                // Tiếp hành update code
                $rechargeHistory->status = RechargeHistory::STATUS_SUCCESS;
                $rechargeHistory->save();

                $user = User::find($rechargeHistory->user_id);
                if (!$user) {
                    $rechargeHistory->note = 'User không hợp lệ';
                    $rechargeHistory->status = RechargeHistory::STATUS_CANCEL;
                    $rechargeHistory->save();
                    DB::commit();
                    // show thông báo
                    return redirect()->route('get_user.recharge.atm');
                } else {
                    Log::info("--- cộng tiền");
                    $user->account_balance += $rechargeHistory->total_money;
                    $user->save();
                }
                DB::commit();
                return redirect()->route('get_user.recharge.history');
            }
            switch ($statusCode) {
                case "01":
                    $message = "Giao dịch chưa hoàn tất";
                    break;
                case "02":
                    $message = "Giao dịch bị lỗi";
                    break;
                case "04":
                    $message = "VGiao dịch đảo (Khách hàng đã bị trừ tiền tại Ngân hàng nhưng GD chưa thành công ở VNPAY)";
                    break;
                case "05":
                    $message = "VNPAY đang xử lý giao dịch này (GD hoàn tiền)";
                    break;
                case "06":
                    $message = "VNPAY đã gửi yêu cầu hoàn tiền sang Ngân hàng (GD hoàn tiền)";
                    break;
                case "07":
                    $message = "Giao dịch bị nghi ngờ gian lận";
                    break;
                case "09":
                    $message = "GD Hoàn trả bị từ chối";
                    break;
            }

            $rechargeHistory->status = RechargeHistory::STATUS_ERROR;
            $rechargeHistory->note = $message;
            $rechargeHistory->save();
            // show thông báo
            DB::commit();
            return redirect()->route('get_user.recharge.atm');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("------------ postbackAtm" . $exception->getMessage());
            return redirect()->route('get_user.recharge.atm');
        }
    }
}
