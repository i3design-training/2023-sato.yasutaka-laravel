<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        //Eloquent
        $values = Test::all();
        $count = Test::count();
        $first = Test::findOrFail(1);
        $whereAAA = Test::where('text','=','aaa')->get();

        //クエリビルダ - 速度的には速いが、Eloquentの方がメリットが多い
        $queryBuilder = DB::table('tests')->where('text','=','aaa')
        ->select('id','text')
        ->get();
        // ->first();

        dd($values, $count, $first, $whereAAA, $queryBuilder);

        // dd($values);
        return view('tests.test',compact('values'));
    }
}
