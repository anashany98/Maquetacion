<div class="pagination-table">
    <div class="pagination-table-info">
        <div class="pagination-table-total"><p>{{$items->total()}} Register</p></div>
        <div class="pagination-table-pages"><p>show page {{$items->currentPage()}} de {{$items->lastPage()}}</p></div>
    </div>
    <div class="pagination-table-buttons">
        <p>
            <span class="pagination-table-button" data-page="{{$items->url(1)}}">First</span>
            <span class="pagination-table-button" data-page="{{$items->previousPageUrl()}}">Previous</span>
            <span class="pagination-table-button" data-page="{{$items->nextPageUrl()}}">Next</span>
            <span class="pagination-table-button" data-page="{{$items->url($items->lastPage())}}">Last</span>
        </p>
    </div>
</div>