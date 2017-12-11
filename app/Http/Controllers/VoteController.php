<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\TranslatorController;
use App\Vote;
use Illuminate\Http\Request;

use App\Http\Requests;

class VoteController extends Controller
{
    public function saveAnswer(Request $request){
        $lang = PageController::getCurLang();
        $L = new TranslatorController($lang); //get instance of translator
        $post = $request->all();
        $vote = Vote::where('question', $post['question'])
            ->where('variant', $post['answer'])
            ->first();
        if(isset($vote)){
            $vote->value += 1;
            $vote->save();
        }else{
            $arr = [
                'question'=>$post['question'],
                'variant'=>$post['answer'],
                'value'=>1
            ];
            Vote::create($arr);
        }
        $votes = Vote::where('question', $post['question'])
            ->orderBy('variant')
            ->get();
        $all = 0;
        $html = '';
        foreach ($votes as $key=>$item) {
            $all += $item->value;
        }
        foreach ($votes as $key=>$item) {
            $percent = $item->value/$all*100;
            $html .= '<div class="bar_statistic" style="width: 100%"><div class="bar_answer" style="width: '.$percent.'%"><p class="percent">'.ceil($percent).'%'.'</p></div></div>';
        }
        return $html;
    }
}
