<div class="coin">
    <div class="coin-top">
        <div class="coin-1">
            @isset($coin->image_featured_desktop->path)
                <div class="coin-logo-image">
                    <img src="{{Storage::url($coin->image_featured_desktop->path)}}" alt="{{$coin->image_featured_desktop->alt}}" title="{{$coin->image_featured_desktop->title}}" style="height: 3.2em"/>
                </div>
            @endif
                <div class="coin-title">
                    <h3>{{isset($coin->seo->title) ? $coin->seo->title : ""}}</h3> 
                </div>
        
                <div class="symbol-coin">   
                    {{isset($coin->symbol) ? $coin->symbol : ""}}
                </div>
                
                <div class="favourite-coin">
                    <input class="star" type="checkbox" title="bookmark page" checked><br/><br/>
                </div>
      
                <div class="price-coin">
                    {{isset($coin->price) ? $coin->price : ""}}€
                </div>  
        </div>
        
    </div>

   
    <div class="coin-middle">
        {{-- <div class="coin-description">
            <div class="coin-description-text">
                {!!isset($coin->locale['description']) ? $coin->locale['description'] : "" !!}
            </div>

            

            @isset($coin->image_grid_desktop)
                <div class="coin-description-image-grid">
                    @foreach ($coin->image_grid_desktop as $image)
                        <div class="coin-description-image-grid-item">
                            <img src="{{Storage::url($image->path)}}" alt="{{$image->alt}}" title="{{$image->title}}" />
                        </div>
                    @endforeach
                </div>
            @endif
            </div>   --}}
    </div>


    

    <div class="coin-bottom">

        <div class="coin-description">
            <div class="coin-description-text">
                {!!isset($coin->locale['description']) ? $coin->locale['description'] : "" !!}
            </div>

            @isset($coin->image_grid_desktop)
                <div class="coin-description-image-grid">
                    @foreach ($coin->image_grid_desktop as $image)
                        <div class="coin-description-image-grid-item">
                            <img src="{{Storage::url($image->path)}}" alt="{{$image->alt}}" title="{{$image->title}}" />
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    
    
</div>
