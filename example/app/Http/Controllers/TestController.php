<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        return 'Привет!';
    }

    public function index()
    {
        return 'Тест-страница из контроллера';
    }


    public function request(Request $request)
    {
        dd($request->server);
    }

    public function show($param)
    {
        return 'Тест-страница из контроллера с параметром - ' . $param;
    }

    public function errorPage()
    {
        return response('404...', 404);
    }
}
