<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Todo;
use Validator;
use Illuminate\Support\Facades\Auth;
class TodoController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
	//if(Auth::check()){
	    $todos =Todo::paginate(3);
                //dd($todos);
            return view('todo.index', [  //todos傳給views
                'todos' => $todos
            ]);
	//} 
	//else {
	//    return "error";
	//}
    	

    }
    public function show($todos)
    {
	return Todo::find($todos); 	
    }
    public function update(Request $request)
    {
	$validated = $request->validate([
	    'title' => 'required|min:3',
	    'body' => 'required|min:3'	
	]);    	

	$todo = Todo::create($validated);
    	
    	return redirect('todo');
    	
    	
    }
    public function destory(Request $request, Todo $todo)
    {
        $todo->delete();
        return redirect('todo');
    }
}


