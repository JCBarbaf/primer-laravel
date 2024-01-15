<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\BusinessProfile;
use App\Http\Requests\Admin\BusinessProfileRequest;

class BusinessProfileController extends Controller
{
  public function __construct(private BusinessProfile $business_profile){}
  
  public function index()
  {
    try{

      $business_profiles = $this->business_profile
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('admin.business_profiles.index')
      ->with('business_profile', $this->business_profile)
      ->with('business_profiles', $business_profiles);

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

      $view = View::make('admin.business_profiles.index')
        ->with('business_profile', $this->business_profile)
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

  public function store(BusinessProfileRequest $request)
  {            
    try{

      $data = $request->validated();

      $this->business_profile->updateOrCreate([
        'id' => $request->input('id')
      ], $data);

      $business_profiles = $this->business_profile
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      if ($request->filled('id')){
        $message = \Lang::get('admin/notification.update');
      }else{
        $message = \Lang::get('admin/notification.create');
      }

      $view = View::make('admin.business_profiles.index')
        ->with('business_profiles', $business_profiles)
        ->with('business_profile', $this->business_profile)
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

  public function edit(BusinessProfile $business_profile)
  {
    try {

      $view = View::make('admin.business_profiles.index')
      ->with('business_profile', $business_profile);
      
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

  public function destroy(BusinessProfile $business_profile)
  {
    try{
      $business_profile->delete();

      $business_profiles = $this->business_profile
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      $message = \Lang::get('admin/notification.destroy');
      
      $view = View::make('admin.business_profiles.index')
        ->with('business_profile', $this->business_profile)
        ->with('business_profiles', $business_profiles)
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