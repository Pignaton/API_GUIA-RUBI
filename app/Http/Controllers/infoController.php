<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsInfo;

class infoController extends Controller
{
    public function list()
    {
        $lists = NewsInfo::all();
        if (count($lists) > 0) {
            foreach ($lists as $list) {
                $array['result'][] = [
                    'id' => $list->id,
                    'title' => $list->title,
                    'briefContent' => $list->brief_content,
                    'fullContent' => $list->full_content,
                    'image' => $list->image,
                    'lastUpdate' => $list->last_update,
                ];
            }
        } else {
            $array['result'] = '';
        }

        return $array;
    }
}
