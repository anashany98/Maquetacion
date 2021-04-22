
<div class="filter-container" id="filter-container">
    <div class="table-filter-container">
        <form class="filter-form" id="filter-form" action="{{route("faqs_filter")}}" autocomplete="off">             

            {{ csrf_field() }}


            @foreach ($filters as $key => $items)
            
                @if($key == 'parent')
                    
                    <div class="form-label">
                        <label for="category_id" class="label-highlight">Filter by</label>
                    </div>
                    <div class="form-input">
                        <select name="category_id" data-placeholder="Select a category" class="input-highlight">
                            <option value="all"}}>All</option>
                            @foreach($items as $item)
                                <option value="{{$item->id}}"}}>{{ $item->name }}</option>
                            @endforeach
                        </select>    
                    </div>
                            
                       
                @endif

                @if($key == 'category')
                    
                    <div class="form-label">
                        <label for="category_id" class="label-highlight">Filter by Category</label>
                    </div>
                    <div class="form-input">
                        <select name="category_id" data-placeholder="Select a category" class="input-highlight">
                            <option value="all"}}>All</option>
                            @foreach($items as $item)
                                <option value="{{$item->id}}"}}>{{ $item->name }}</option>
                            @endforeach
                        </select>    
                    </div>
                    
                @endif

                @if($key == 'search')
                   
                    <div class="form-label">
                        <label for="search" class="label-highlight">Search Word</label>
                    </div>
                    <div class="form-input">
                        <input type="text" name="search" class="input-highlight" value="">
                    </div> 
                @endif

            
                
                @if($key == 'created_at')

                    <div class="form-input">
                        <input type="date" id="created_at_from" name="created_at_from">
                    </div>

                    <div class="form-input">
                        <input type="date" id="created_at_since" name="created_at_since">
                    </div>

                @endif

            @endforeach
        </form>


        <button type="submit" class="filter-button" id="filter-button">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M15.5,12C18,12 20,14 20,16.5C20,17.38 19.75,18.21 19.31,18.9L22.39,22L21,23.39L17.88,20.32C17.19,20.75 16.37,21 15.5,21C13,21 11,19 11,16.5C11,14 13,12 15.5,12M15.5,14A2.5,2.5 0 0,0 13,16.5A2.5,2.5 0 0,0 15.5,19A2.5,2.5 0 0,0 18,16.5A2.5,2.5 0 0,0 15.5,14M5,3H19C20.11,3 21,3.89 21,5V13.03C20.5,12.23 19.81,11.54 19,11V5H5V19H9.5C9.81,19.75 10.26,20.42 10.81,21H5C3.89,21 3,20.11 3,19V5C3,3.89 3.89,3 5,3M7,7H17V9H7V7M7,11H12.03C11.23,11.5 10.54,12.19 10,13H7V11M7,15H9.17C9.06,15.5 9,16 9,16.5V17H7V15Z" />
            </svg>
        </button>
    </div>
    
</div>
