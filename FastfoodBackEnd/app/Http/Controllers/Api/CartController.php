<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;

class CartController extends Controller
{
    //
    public function purchase(Request $request)
    {
        $userInfo = $request->input('userInfo');
        $cart = $request->input('cart');
        if ($userInfo && $cart) {
            $order = new Order();
            $order->setUserId($userInfo['id']);
            $order->setTotal(0);
            $order->setOrderStatus(1);
            $order->setDeliveryAddress("null address");
            $order->setPhoneNumber("null phone");
            $order->save();
            $total = 0;
            foreach ($cart as $product) {
                $item = new Item();
                $item->setQuantity($product['quantity']);
                $item->setPrice($product['price']);
                $item->setProductId($product['id']);
                $item->setOrderId($order->getId());
                $item->save();
                $total += $product['price'] * $product['quantity'];
            }

            $order->total = $total;
            $order->save();
            return response()->json(['message' => 'Order created successfully']);
        } else {
            return response()->json(['error' => 'Invalid data'], 400);
        }
    }
}
