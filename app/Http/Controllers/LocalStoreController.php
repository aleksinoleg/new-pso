<?php

namespace App\Http\Controllers;

use App\LocalStore;
use App\LocalStoreEmail;
use Illuminate\Http\Request;

use App\Http\Requests;

class LocalStoreController extends Controller
{
    public function saveLocalStore(Request $request){
        $post = $request->all();
        unset($post['_token']);

        $localstore = LocalStore::where('country', $post['country'])
            ->where('city', $post['city'])
            ->first();
        if (isset($localstore)){
            $localstore->value++;
            $localstore->save();
        }else{
            $post['value'] = 1;
            LocalStore::create($post);
        }
        session(['success'=>1]);
        session(['country'=>$post['country']]);
        session(['city'=>$post['city']]);
        return back();
    }
    public function saveLocalStoreEmail(Request $request){
        $post = $request->all();
        unset($post['_token']);
        $post['country'] = session('country');
        $post['city'] = session('city');

        $localStoreEmail = LocalStoreEmail::where('country', $post['country'])
            ->where('city', $post['city'])
            ->where('email', $post['email'])
            ->first();
        if(!isset($localStoreEmail)){
            LocalStoreEmail::create($post);
        }
        session()->forget('country');
        session()->forget('city');
        return back();
    }
}
