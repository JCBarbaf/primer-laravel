<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\Admin\EventRequest;
use App\Services\LocaleService\LocaleService;

class EventController extends Controller
{
  public function __construct(private Event $event, private LocaleService $localeService){

  }
  
  public function index()
  {
    try{

      $events = $this->event
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.events.index')
      ->with('event', $this->event)
      ->with('events', $events);

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

      $view = View::make('admin.events.index')
        ->with('event', $this->event)
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

  public function store(EventRequest $request)
  {            
    try{

      $data = $request->validated();

      $event = $this->event->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      if(request('locale')){
        $locale = $this->localeService->store(request('locale'), $event->id);
      }
      
      $events = $this->event
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }

      $view = View::make('admin.events.index')
        ->with('events', $events)
        ->with('event', $this->event)
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

  public function edit(Event $event)
  {
    try {

      $view = View::make('admin.events.index')
      ->with('event', $event);
      
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

  public function destroy(Event $event)
  {
    try{
      $event->delete();

      $events = $this->event
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      $view = View::make('admin.events.index')
        ->with('event', $this->event)
        ->with('events', $events)
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