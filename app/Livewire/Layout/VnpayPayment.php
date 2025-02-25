<?php

namespace App\Livewire\Layout;

use App\Models\Booking;
use App\Models\BookingDetail;
use Auth;
use Carbon\Carbon;
use Livewire\Component;

class VnpayPayment extends Component
{
    public function vnpay()
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('finish');
        $vnp_TmnCode = "HOOKW2BU";//Mã website tại VNPAY 
        $vnp_HashSecret = "ADV9ILTW310TR40REROQSGPCJLCZIY7H"; //Chuỗi bí mật
        // $vnp_TmnCode = "YN0DQBNP";//Mã website tại VNPAY 
        // $vnp_HashSecret = "FX7J6EH7E7MQEZMUO9QUB6XTQX8LBCBY"; //Chuỗi bí mật

        $cart = session()->get('bookingCart', []);
        $cartInfo = session()->get('bookingInfo', []);
        // dd($bookingCart);
        // dd($cart);
        $totalPay = 0;
        $checkInDate = Carbon::parse($cartInfo['check_in']);
        $checkOutDate = Carbon::parse($cartInfo['check_out']);
        $days = $checkOutDate->diffInDays($checkInDate);
        foreach ($cart as $item) {
            if (isset($item['price_per_room']) && isset($item['quantity'])) {
                $totalPay += $item['price_per_room'] * $item['quantity'] * $days * -1;
            }

        }

        $vnp_TxnRef = "HotelK" . time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
        $vnp_OrderInfo = "Thanh toán VNPay: #" . $vnp_TxnRef;
        $vnp_OrderType = "kh";
        $vnp_Amount = $totalPay * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => (int) $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
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
        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
        );
        if (isset($_POST['vnpay'])) {
            return redirect($vnp_Url);
        } else {
            echo json_encode($returnData);
        }
    }

    public function render()
    {
        return view('livewire.layout.vnpay-payment');
    }
}
