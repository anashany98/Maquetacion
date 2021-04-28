<?php

namespace App\Http\Controllers\Admin;

use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\DB\Slider;
use Debugbar;

class SliderController extends Controller
{
    protected $slider;

    function __construct(Slider $slider)
    {
        $this->middleware('auth');
        $this->slider = $slider;
    }

    public function indexJson(Request $request)
    {
        $length = $request->input('length');
        $orderBy = $request->input('column'); 
        $orderByDir = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        
        $query = $this->slider->eloquentQuery($orderBy, $orderByDir, $searchValue);
        $data = $query->paginate($length);
        
        return new DataTableCollectionResource($data);
    }

    public function index()
    {

        $view = View::make('admin.sliders.index')
                ->with('slider', $this->slider)
                ->with('sliders', $this->slider->where('active', 1)->paginate(3));

        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }

        return $view;
    }

    public function create()
    {

        $view = View::make('admin.sliders.index')
        ->with('slider', $this->slider)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(SliderRequest $request)
    {            
        $slider = $this->slider->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'entity' => request('entity'),
            'visible'=> 1,
            'active' => 1,
        ]);


        if (request('id')){
            $advisor = \Lang::get('admin/sliders.slider-update');
        }else{
            $advisor = \Lang::get('admin/sliders.slider-create');
        }

        $view = View::make('admin.sliders.index')
        ->with('sliders', $this->slider->where('active', 1)->paginate(3))
        ->with('slider', $slider)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'advisor' => $advisor,
            'id' => $slider->id,
        ]);
    }

    public function show(Faq $slider)
    {
        $view = View::make('admin.sliders.index')
        ->with('slider', $slider)
        ->with('sliders', $this->slider->where('active', 1)->paginate(3));   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function destroy(Faq $slider)
    {
        $slider->active = 0;
        $slider->save();

        $advisor = \Lang::get('admin/sliders.slider-delete');

        $view = View::make('admin.sliders.index')
            ->with('slider', $this->slider)
            ->with('sliders', $this->slider->where('active', 1)->paginate(3))
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'advisor' => $advisor,
        ]);
    }


    public function filter(Request $request){

        $query = $this->slider->query();

        $query->when(request('category_id'), function ($q, $category_id) {

            if($category_id == 'all'){
                return $q;
            }
            else {
                return $q->where('category_id', $category_id);
            }
        });

        $query->when(request('search'), function ($q, $search) {

            if($search == null){
                return $q;
            }
            else {
                return $q->whereDate('title', 'like', "%$search%");
            }
        });

        $query->when(request('created_at_from'), function ($q, $created_at_from) {

            if($created_at_from == null){
                return $q;
            }
            else {
                return $q->whereDate('created_at', '>=', $created_at_from);
            }
        });

        $query->when(request('created_at_since'), function ($q, $created_at_since) {

            if($created_at_since == null){
                return $q;
            }
            else {
                return $q->whereDate('created_at', '<=', $created_at_since);
            }
        });

        $sliders = $query->where('active', 1)->paginate(3);

        $view = View::make('admin.sliders.index')
            ->with('sliders', $sliders)
            ->renderSections();

        return response()->json([
            'table' => $view['table'],
        ]);
    }

    

}
    
