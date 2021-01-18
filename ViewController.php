<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    // public function escape()
    // {
    //     return view('view.escape', [
    //         'msg' => '<img src="https:wings.msn.to/image/wings.jpg" title="ロゴ"><p>WINGSへようこそ</p>'
    //     ]);
    // }

    public function if()
    {
        return view('view.if', [
            'random' => random_int(0, 100)
        ]);
    }

    public function unless()
    {
        return view('view.unless', [
            'random' => random_int(0, 100)
        ]);
    }

    public function foreach_assoc()
    {
        return view('view.foreach_assoc', [
            'member' => [
                'name' => 'YAMADA, Yoshihiro',
                'sex' => '男',
                'birth' => '1923-11-10'
            ]
        ]);
    }

    public function foreach_loop()
    {
        return view('view.foreach_loop', [
            'weeks' => ['月', '火', '水', '木', '金', '土', '日']
        ]);
    }

    public function master()
    {
        return view('view.master', [
            'msg' => 'こんにちは、世界！'
        ]);
    }

    public function comp()
    {
        $data = [
            'type' => 'success',
            'alert_title' => 'はじめてのコンポーネント',
            'slot' => 'コンポーネントはうんぬんかんぬん'
        ];
        return view('view.comp', ['data' => $data]);
    }

    public function book()
    {
        $data = [
            'records' => Book::all()
        ];
        return view('view.list', $data);
    }
}
