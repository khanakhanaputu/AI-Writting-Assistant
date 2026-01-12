<?php

namespace App\Http\Controllers;

use App\Services\AiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {
        return view('Test.test');
    }
    public function TestResponse(Request $request)
    {
        $aiService = new AiService();

        return $aiService->AiFetch($request['prompt']);
    }
}
