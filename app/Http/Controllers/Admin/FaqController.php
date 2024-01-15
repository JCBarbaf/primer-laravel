<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Http\Requests\Admin\FaqRequest;

class FaqController extends Controller
{
  public function __construct(private Faq $faq){}
  
  public function index()
  {
    try{

      $faqs = $this->faq
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.faqs.index')
      ->with('faq', $this->faq)
      ->with('faqs', $faqs);

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

      $view = View::make('admin.faqs.index')
        ->with('faq', $this->faq)
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

  public function store(FaqRequest $request)
  {            
    try{

      $data = $request->validated();

      $this->faq->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      $faqs = $this->faq
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }

      $view = View::make('admin.faqs.index')
        ->with('faqs', $faqs)
        ->with('faq', $this->faq)
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

  public function edit(Faq $faq)
  {
    try {

      $view = View::make('admin.faqs.index')
      ->with('faq', $faq);
      
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

  public function destroy(Faq $faq)
  {
    try{
      $faq->delete();

      $faqs = $this->faq
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      $view = View::make('admin.faqs.index')
        ->with('faq', $this->faq)
        ->with('faqs', $faqs)
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