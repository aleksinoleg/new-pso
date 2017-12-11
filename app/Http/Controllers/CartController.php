<?php

namespace App\Http\Controllers;

use App\Dosage;
use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
    public function addToCart(Request $request){
        
        $post = $request->all();

        unset($post['_token']);
        unset($post['link']);

        $arr = [];
        if(session()->has('cart')){
            $arr = session('cart');
        }
        $flag = 0;
        foreach ($arr as $key=>$item){
            if ($item['prod_id'] == $post['prod_id']){
                $arr[$key]['price'] += $post['price'];
                $arr[$key]['quantity'] += $post['quantity'];
                $flag = 1;
                break;
            }
        }
        if ($flag == 0){
            $arr[] = $post;
        }

        foreach ($arr as $key=>$item) {
            $arr[$key]['product'] = Page::where('lang',$post['lang'])->where('active',1)->where('type','product')->where('prod_id',$post['prod_id'])->first();
        }

        session(['cart' => $arr]);
        return redirect()->to('/'.$post['lang'].'/'.$request->get('link'));
    }
    public function dell_cart($id){
        $arr = session('cart');
        foreach ($arr as $key=>$item){
            if ($item['prod_id']==$id){
                unset($arr[$key]);
            }
        }
        session(['cart'=>$arr]);
        return redirect()->back();
    }
    public static function addProdToCart($id, $link, $lang){

        $price = Dosage::where('lang', $lang)
            ->where('prod_id', $id)
            ->first()->price;
        $post = [
            "prod_id" => $id,
            "price" => $price,
            "currency" => "€",
            "quantity" => "1"
        ];
        $arr = [];
        if(session()->has('cart')){
            $arr = session('cart');
        }
        $flag = 0;
        foreach ($arr as $key=>$item){
            if ($item['prod_id'] == $post['prod_id']){
                //$arr[$key]['price'] += $post['price'];
                $arr[$key]['quantity'] += $post['quantity'];
                $flag = 1;
                break;
            }
        }
        if ($flag == 0){
            $arr[] = $post;
        }

        foreach ($arr as $key=>$item) {
            $arr[$key]['product'] = Page::where('lang',$lang)->where('active',1)->where('type','product')->where('prod_id',$item['prod_id'])->first();
        }

        session(['cart' => $arr]);

        //dd(session('cart'));
        return redirect()->to('/'.$lang.'/'.$link);
    }
}
