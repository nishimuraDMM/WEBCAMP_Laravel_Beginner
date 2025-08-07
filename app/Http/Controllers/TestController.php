<?php
declare(strict_type=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestPostRequest;

class TestController extends Controller
{
    //
    public function index(){
        return view('test.index');
    }
    //@return \Illuminate\View\View
public function input(TestPostRequest $request){
    $validatedData = $request->validate;

return view('test.input',['datum'=>$validation]);
}
}
