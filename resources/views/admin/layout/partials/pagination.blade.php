<div class="pagination-table">
    <div class="pagination-table-buttons">
        <div class="pagination-table-button" data-page="{{$items->url(1)}}">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M18.41,16.59L13.82,12L18.41,7.41L17,6L11,12L17,18L18.41,16.59M6,6H8V18H6V6Z" />
            </svg>
        </div>
        
        <div class="pagination-table-button" data-page="{{$items->previousPageUrl()}}">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
            </svg>
        </div>

        <div class="pagination-table-info">
            <div class="pagination-table-pages"><p>{{$items->currentPage()}} of {{$items->lastPage()}}</p></div>
        </div>

        <div class="pagination-table-button" data-page="{{$items->nextPageUrl()}}">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
            </svg>
        </div>

        <div class="pagination-table-button" data-page="{{$items->url($items->lastPage())}}">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M5.59,7.41L10.18,12L5.59,16.59L7,18L13,12L7,6L5.59,7.41M16,6H18V18H16V6Z" />
            </svg>
        </div>
    </div>
</div>