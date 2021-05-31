<?php

namespace App\Http\Controllers\Admin;

use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CoinRequest;
use Jenssegers\Agent\Agent;
use App\Vendor\Locale\Locale;
use App\Vendor\Locale\LocaleSlugSeo;
use App\Vendor\Image\Image;
use App\Models\DB\Coin;
use Debugbar;

class CoinController extends Controller
{
    protected $coin;
    protected $agent;
    protected $locale;
    protected $locale_slug_seo;
    protected $paginate;
    protected $image;

    function __construct(coin $coin, Agent $agent, Locale $locale, Image $image, LocaleSlugSeo $locale_slug_seo)
    {
        // $this->middleware('auth');
        $this->agent = $agent;
        $this->locale = $locale;
        $this->locale_slug_seo = $locale_slug_seo;
        $this->image = $image;
        $this->coin = $coin;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 9;
        }

        $this->locale->setParent('coins');
        $this->locale_slug_seo->setParent('coins');
        $this->image->setEntity('coins');
    }

    public function indexJson(Request $request)
    {
        $length = $request->input('length');
        $orderBy = $request->input('column'); 
        $orderByDir = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        
        $query = $this->coin->eloquentQuery($orderBy, $orderByDir, $searchValue);
        $data = $query->paginate($length);
        
        return new DataTableCollectionResource($data);
    }

    public function index()
    {

        $view = View::make('admin.coins.index')
                ->with('coin', $this->coin)
                ->with('coins', $this->coin->where('active', 1)->paginate($this->paginate));

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

        $view = View::make('admin.coins.index')
        ->with('coin', $this->coin)
        ->renderSections();

        return response()->json([
            'table' => $sections['table'],
        ]);
    }

    public function store(CoinRequest $request)
    {          
        
        $coin = $this->coin->updateOrCreate([
            'id' => request('id')],[
            'name_coin' => request('name_coin'),
            'symbol' => request('symbol'),
            'price' => request('price'),
            'active' => 1,
        ]);

        if(request('locale')){
            $locale = $this->locale->store(request('locale'), $coin->id);
        }

        if(request('images')){
            $images = $this->image->store(request('images'), $coin->id);
        }

        if(request('seo')){
            $seo = $this->locale_slug_seo->store(request('seo'), $coin->id, 'front_coin');
        }

        if(request('id')){
            $advisor = \Lang::get('admin/coins.coin-update');
        }else{
            $advisor = \Lang::get('admin/coins.coin-create');
        }

        $view = View::make('admin.coins.index')
        ->with('coins', $this->coin->where('active', 1)->paginate($this->paginate))
        ->with('coin', $coin)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'advisor' => $advisor,
            'id' => $coin->id,
        ]);
    }

    public function edit(coin $coin)
    {
        $locale = $this->locale->show($coin->id);
        $seo = $this->locale_slug_seo->show($coin->id);


        $view = View::make('admin.coins.index')
        ->with('locale', $locale)
        ->with('seo', $seo)
        ->with('coin', $coin)
        ->with('coins', $this->coin->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));        
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(coin $coin)
    {
        $view = View::make('admin.coins.index')
        ->with('coin', $coin)
        ->with('coins', $this->coin->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();  

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
                
        return $view;
    }

    public function destroy(coin $coin)
    {
        $coin->active = 0;
        $coin->save();

        $advisor = \Lang::get('admin/coins.coin-delete');

        $view = View::make('admin.coins.index')
            ->with('coin', $this->coin)
            ->with('coins', $this->coin->where('active', 1)->paginate($this->paginate))
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'advisor' => $advisor,
        ]);
    }
    
}
    
