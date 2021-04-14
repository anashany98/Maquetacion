<?php

namespace App\Http\Controllers\Admin;

use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Models\DB\Customer;

class CustomerController extends Controller
{
    protected $customer;

    function __construct(Customer $customer)
    {
        $this->middleware('auth');
        $this->customer = $customer;
    }

    public function indexJson(Request $request)
    {
        $length = $request->input('length');
        $orderBy = $request->input('column'); 
        $orderByDir = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        
        $query = $this->customer->eloquentQuery($orderBy, $orderByDir, $searchValue);
        $data = $query->paginate($length);
        
        return new DataTableCollectionResource($data);
    }

    public function index()
    {

        $view = View::make('admin.customers.index')
                ->with('customer', $this->customer)
                ->with('customers', $this->customer->where('active', 1)->get());

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

        $view = View::make('admin.customers.index')
        ->with('customer', $this->customer)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(CustomerRequest $request)
    {            
        $customer = $this->customer->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'email' => request('email'),
            'direction'=> request('direction'),
            'number'=> request('number'),
            'postal_code'=> request('postal_code'),
            'country'=> request('country'),
            'active' => 1,
        ]);

        $view = View::make('admin.customers.index')
        ->with('customers', $this->customer->where('active', 1)->get())
        ->with('customer', $customer)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $customer->id,
        ]);
    }

    public function show(Customer $customer)
    {
        $view = View::make('admin.customers.index')
        ->with('customer', $customer)
        ->with('customers', $this->customer->where('active', 1)->get());   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function destroy(Customer $customer)
    {
        $customer->active = 0;
        $customer->save();

        $view = View::make('admin.customers.index')
            ->with('customer', $this->customer)
            ->with('customers', $this->customer->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}
