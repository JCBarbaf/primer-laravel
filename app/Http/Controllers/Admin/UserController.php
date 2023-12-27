<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
  public function __construct(private User $user){}
  
  public function index()
  {
    try{

      $users = $this->user
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.users.index')
      ->with('user', $this->user)
      ->with('users', $users);

      if(request()->ajax()) {
          
          $sections = $view->renderSections(); 

          return response()->json([
              'table' => $sections['table'],
              'form' => $sections['form'],
          ], 200); 
      }

      return $view;

    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function create()
  {
    try {

      $view = View::make('admin.users.index')
        ->with('user', $this->user)
        ->renderSections();

      return response()->json([
          'form' => $view['form']
      ], 200);

    } catch (\Exception $e) {
      return response()->json([
          'message' =>  \Lang::get('admin/notification.error'),
      ], 500);
    }
  }

  public function store(UserRequest $request)
  {            
    try{

      $data = $request->validated();

      unset($data['password_confirmation']);
      
      if (!$request->filled('password') && $request->filled('id')){
        unset($data['password']);
      }
  
      $this->user->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      $users = $this->user
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }

      $view = View::make('admin.users.index')
        ->with('users', $users)
        ->with('user', $this->user)
        -with('message', $message)
        ->renderSections();        

      return response()->json([
        'table' => $view['table'],
        'form' => $view['form'],
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function edit(User $user)
  {
    try {

      $users = $this->user
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $view = View::make('admin.users.index')
      ->with('user', $user)
      ->with('users', $users);
      
      if(request()->ajax()) {

          $sections = $view->renderSections(); 
  
          return response()->json([
              'form' => $sections['form'],
          ], 200);
      }
              
      return $view;
    }
    catch(\Exception $e){
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function destroy(User $user)
  {
    try{
      $user->delete();

      $users = $this->user
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      $view = View::make('admin.users.index')
        ->with('user', $this->user)
        ->with('users', $users)
        -with('message', $message)
        ->renderSections();
      
      return response()->json([
          'table' => $view['table'],
          'form' => $view['form']
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' => \Lang::get('admin/notification.error'),
      ], 500);
    }
  }
}