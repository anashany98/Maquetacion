<div class="coin-wrap">
    <div class="coin-top">
        <div class="coin-1">
            <div class="coin-top-left">
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
            </div>
            
            <div class="coin-top-right">
                <div class="price-change" id="price-change">
                    24,36%
                </div>
                <div class="price-coin" id="btc-price">
                </div>  
            </div>
        </div>
        
    </div>

   
    <div class="coin-middle">
        <div class="graph" id="graph">
            <canvas id="btcChart" width="100%" height="57vh"></canvas>
        </div>  
        <div class="statistisc">
            <div class="coin-exchange">
                <div class="coin">
                    <input  class="coin-input" type="number" id="coin" placeholder="0" />
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M6,4H8V2H10V4H12V2H14V4.03C16.25,4.28 18,6.18 18,8.5C18,9.8 17.45,11 16.56,11.8C17.73,12.61 18.5,13.97 18.5,15.5C18.5,18 16.5,20 14,20V22H12V20H10V22H8V20H6L6.5,18H8V6H6V4M10,13V18H14A2.5,2.5 0 0,0 16.5,15.5A2.5,2.5 0 0,0 14,13H10M10,6V11H13.5A2.5,2.5 0 0,0 16,8.5A2.5,2.5 0 0,0 13.5,6H13.5L10,6Z" />
                    </svg>
                </div>

                <div class="fiat">
                    <input  class="fiat-input" type="number" id="fiat" placeholder="0" />
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M7.07,11L7,12L7.07,13H17.35L16.5,15H7.67C8.8,17.36 11.21,19 14,19C16.23,19 18.22,17.96 19.5,16.33V19.12C18,20.3 16.07,21 14,21C10.08,21 6.75,18.5 5.5,15H2L3,13H5.05L5,12L5.05,11H2L3,9H5.5C6.75,5.5 10.08,3 14,3C16.5,3 18.8,4.04 20.43,5.71L19.57,7.75C18.29,6.08 16.27,5 14,5C11.21,5 8.8,6.64 7.67,9H19.04L18.19,11H7.07Z" />
                    </svg>
                </div>

                <div class="exhange-active">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19,8L15,12H18A6,6 0 0,1 12,18C11,18 10.03,17.75 9.2,17.3L7.74,18.76C8.97,19.54 10.43,20 12,20A8,8 0 0,0 20,12H23M6,12A6,6 0 0,1 12,6C13,6 13.97,6.25 14.8,6.7L16.26,5.24C15.03,4.46 13.57,4 12,4A8,8 0 0,0 4,12H1L5,16L9,12" />
                    </svg>
                </div>
                
                <div class="buy-coin">
                    Buy Crypto
                </div>

            </div>

        
            <div class="statistisc-box-tittle"><p>Statistisc</p></div>
            
            <div class="statistisc-box">Price Change 24h
                <div class="interior-statistisc-box">
                    +3.423€
                </div>
            </div>
            <div class="statistisc-box">Circulating Supply
                <div class="interior-statistisc-box">
                    18.724.568
                </div>
            </div>
            <div class="statistisc-box">Max Supply
                <div class="interior-statistisc-box">
                    21.000.000
                </div>
            </div>
            <div class="statistisc-box">Market Cap
                <div class="interior-statistisc-box">
                    571.788.890.856,09
                </div>
            </div>  
        </div>
    </div>


    

    <div class="coin-bottom">
        <div class="coin-description">
            <div class="coin-description-text">
                {!!isset($coin->locale['description']) ? $coin->locale['description'] : "" !!}
            </div>
        </div>
    </div>
    
</div>
