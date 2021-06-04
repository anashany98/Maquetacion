<div class="coins-wrap" id="coin-wrap">

    <div class="coins-title">
        <h3>Crypto Coins</h3>
    </div>
    
    <div class="coins-set">
        @foreach ($coins as $coin)

            <div class="coins" data-content="{{$loop->iteration}}" >
               
                <div class="price-coin-set">
                    <div class="price-coin" style="color: #58667e">
                        {{isset($coin->price) ? $coin->price : ""}}€
                    </div> 
                </div>


                <div class="coin-container">
                    <div class="coin-title">
                        <h3>{{isset($coin->seo->title) ? $coin->seo->title : ""}}</h3>
                    </div>
                    <div class="symbol-coin">   
                        {{isset($coin->symbol) ? $coin->symbol : ""}}
                    </div>
                </div>

                
                <div class="coin-description">
                    <div class="coin-description-image">
                        @isset($coin->image_featured_desktop->path)
                            <div class="coin-description-image-featured">
                                <img src="{{Storage::url($coin->image_featured_desktop->path)}}" alt="{{$coin->image_featured_desktop->alt}}" title="{{$coin->image_featured_desktop->title}}" style="height: 3.2em" />
                            </div>
                        @endif
                    
                    </div>   
                    <div class="price-change">
                        <p style="color: #ffffff">24,36%</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>     
</div>
