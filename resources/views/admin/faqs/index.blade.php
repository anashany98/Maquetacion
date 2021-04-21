@php
    $route = 'faqs';
    $filters = ['category' => $faqs_categories, 'created_at' =>true, 'search' => true]; 
@endphp

@extends('admin.layout.table-form')

@section('form')

    @isset($faq)
        <form  class="admin-form"id="user-form" action="{{route("faqs_store")}}" autocomplete="off">
            <div class="form-group">

                {{ csrf_field() }}
                
                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                <input type="hidden" name="id" value="{{isset($faq->id) ? $faq->id : ''}}"> 

                <div class="label-container">
                    <label for="Pregunta Formulario">Title:</label>
                </div>
                <div class="input-container">    
                    <input type="text" id="fname" name="title" value="{{isset($faq->id) ? $faq->title : ''}}" class="input">
                </div>    
            </div>

            <div class="form-group">   
                <div class="label-container">
                    <label for="Respuesta Formulario">Description:</label>
                </div>
                <div class="input-container">    
                    <textarea type="text" id="lname" name="description" value="{{isset($faq->description) ? $faq->description : ''}}" class="ckeditor">
                        {{isset($faq->description) ? $faq->description : ''}}
                    </textarea>
                </div>
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
            <div class="button">
                <input type="submit" value="Enviar" id="send-button">
            </div>
        </form> 
        
    @endif

@endsection

@section('table')


    
    <table class="table-info">
        
        <thead >
            <tr class="touch">
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Categories</th>
            </tr>
        </thead>

        <tbody>
            @foreach($faqs as $faq_element)
                <tr class="table-row" id="{{$faq_element->id}}">
                    <td>{{$faq_element->id}}</td>
                    <td>{{$faq_element->title}}</td>
                    <td>{{$faq_element->description}}</td>
                    <td>{{$faq_element->category->name}}</td>
                </tr>
            @endforeach
        </tbody>

        <div class="buttons">                     
            <button id="edit-button" class="edit-button" data-url="{{route('faqs')}}" > 
                <svg  viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                </svg>
            </button>

            <button id="delete-button" class="delete-button" data-url="{{route('faqs')}}">
                <svg viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
            </button>
        </div>   
    </table>
   

@endsection