<div class="coins">

    <div class="coins-title">
        <h3>@lang('front/coins.title')</h3>
    </div>
    
    @foreach ($coins as $coin)
        <div class="coin" data-content="{{$loop->iteration}}">
            <div class="coin-title-container">
                <div class="coin-title">
                    <h3>{{isset($coin->seo->title) ? $coin->seo->title : ""}}</h3>
                </div>

                <div class="coin-plus-button" data-button="{{$loop->iteration}}"></div>
            </div>
            <div class="coin-description">
                <div class="coin-description-text">
                    {!!isset($coin->locale['description']) ? $coin->locale['description'] : "" !!}
                </div>

                <div class="coin-description-image">
                    @isset($coin->image_featured_desktop->path)
                        <div class="coin-description-image-featured">
                            <img src="{{Storage::url($coin->image_featured_desktop->path)}}" alt="{{$coin->image_featured_desktop->alt}}" title="{{$coin->image_featured_desktop->title}}" />
                        </div>
                    @endif

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
    @endforeach
    
</div>
