<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Requests\Admin\LanguageRequest;

class LanguageController extends Controller
{
  public function __construct(private Language $language){}
  
  public function index()
  {
    try{

      $languages = $this->language
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.languages.index')
      ->with('language', $this->language)
      ->with('languages', $languages);

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

      $view = View::make('admin.languages.index')
        ->with('language', $this->language)
        ->renderSections();

      return response()->json([
          'form' => $view['form']
      ], 200);

    } catch (\Exception $e) {
      return response()->json([
          'message' =>   $e->getMessage(),
      ], 500);
    }
  }

  public function store(LanguageRequest $request)
  {            
    try{

      $data = $request->validated();

      $this->language->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      $languages = $this->language
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }

      $view = View::make('admin.languages.index')
        ->with('languages', $languages)
        ->with('language', $this->language)
        // -with('message', $message)
        ->renderSections();        

      return response()->json([
        'table' => $view['table'],
        'form' => $view['form'],
      ], 200);
    }
    catch(\Exception $e){
      return response()->json([
        'message' =>$e->getMessage(),
      ], 500);
    }
  }

  public function edit(Language $language)
  {
    try {

      $view = View::make('admin.languages.index')
      ->with('language', $language);
      
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

  public function destroy(Language $language)
  {
    try{
      $language->delete();

      $languages = $this->language
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      $view = View::make('admin.languages.index')
        ->with('language', $this->language)
        ->with('languages', $languages)
        // -with('message', $message)
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