@php
    $route = 'faqs';
    $filters = ['category' => $faqs_categories, 'created_at' =>true, 'search' => true]; 
@endphp

@extends('admin.layout.table-form')


@section('form')

   
    @isset($faq)

        <form  class="admin-form"id="user-form" action="{{route("faqs_store")}}" autocomplete="off">

            {{ csrf_field() }}
                
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            <input type="hidden" name="id" value="{{isset($faq->id) ? $faq->id : ''}}"> 

            <div class="two-columns">
                <div class="form-group">
                    <div class="label-container">
                        <label for="title">Title:</label>
                    </div>
                    <div class="input-container">    
                        <input type="text" id="fname" name="title" value="{{isset($faq->id) ? $faq->title : ''}}" class="input">
                    </div>    
                </div>

                <div class="form-group">   
                    <div class="label-container">
                        <label for="category_id">Category:</label>
                    </div>
                    <div class="input-container">
                        <select name="category_id" data-placeholder="Seleccione una categoría" class="input-highlight"> 
                            <option></option>
                                @foreach($faqs_categories as $faq_category_element)
                                    <option value="{{$faq_category_element->id}}" 
                                        {{$faq->category_id == $faq_category_element->id ? 'selected':''}} 
                                        class="category_id">
                                        {{ $faq_category_element->name }}
                                    </option>
                                @endforeach
                        </select>                   
                    </div>
                </div>
            </div>

            <div class="one-column">
                <div class="form-group">   
                    <div class="label-container">
                        <label for="description">Description:</label>
                    </div>
                    <div class="input-container">    
                        <textarea type="text" id="lname" name="description" value="{{isset($faq->description) ? $faq->description : ''}}" class="ckeditor">
                            {{isset($faq->description) ? $faq->description : ''}}
                        </textarea>
                    </div>
                </div>
            </div>
         

          

            <div class="button">
                  
                <button id="refresh-button" data-url="{{route('faqs_create')}}">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M16.24,3.56L21.19,8.5C21.97,9.29 21.97,10.55 21.19,11.34L12,20.53C10.44,22.09 7.91,22.09 6.34,20.53L2.81,17C2.03,16.21 2.03,14.95 2.81,14.16L13.41,3.56C14.2,2.78 15.46,2.78 16.24,3.56M4.22,15.58L7.76,19.11C8.54,19.9 9.8,19.9 10.59,19.11L14.12,15.58L9.17,10.63L4.22,15.58Z" />
                    </svg>
                </button>
                
                <div class="send-button">
                    <input type="submit" value="Enviar" id="send-button">
                </div>
            </div>
        </form> 
        
    @endif

@endsection 

@section('table')
    
    
    <table class="table-info">
        
        <thead >
            <tr class="touch">
                <th>Title</th>
                <th>Categories</th>
                <th>Creación</th>
            </tr>
        </thead>

        <tbody>
            @foreach($faqs as $faq_element)
                <tr class="table-row" id="{{$faq_element->id}}">
                    <td>{{$faq_element->title}}</td>
                    <td>{{$faq_element->category->name}}</td>
                    <td>{{ Carbon\Carbon::parse($faq_element->created_at)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>

        <div class="buttons">

            <div class="crud-buttons">
                <div id="edit-button" class="edit-button" data-url="{{route('faqs')}}"> 
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                    </svg>
                </div>
            
                <div id="delete-button" class="delete-button" data-url="{{route('faqs')}}">
                    <svg viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                    </svg>
                </div>
            </div>      
           
            @include('admin.layout.partials.pagination', ['items' => $faqs])
            
        </div>   
    </table>
   
    

@endsection



