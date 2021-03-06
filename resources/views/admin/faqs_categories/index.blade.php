@extends('admin.layout.table-form')

@section('form')

    <form  class="admin-form"id="user-form" action="{{route("faqs_categories_store")}}" autocomplete="off">
        <div class="form-group">

            {{ csrf_field() }}
            
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            <input type="hidden" name="id" value="{{isset($faq_category->id) ? $faq_category->id : ''}}"> 

            <div class="label-container">
                <label for="name">Nombre:</label>
            </div>
            <div class="input-container">    
                <input type="text" id="fname" name="name" value="{{isset($faq_category->name) ? $faq_category->name : ''}}" class="input">
            </div> 
        </div>

        <div class="button">
            <input type="submit" value="Guardar" id="send-button">
        </div>
    </form> 

@endsection

@section('table')

    <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th></th>
            </tr>

        @foreach($faqs_categories as $faq_category_element)
            <tr>
                <td>{{$faq_category_element->id}}</td>
                <td>{{$faq_category_element->name}}</td>
                <td class="table-icons">
                    <div class="buttons">
                        <button class="edit-button" data-url="{{route('faqs_categories_show', ['faq_category' => $faq_category_element->id])}}" > 
                            <svg  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                            </svg>
                        </button>
                        <button class="delete-button" data-url="{{route('faqs_categories_destroy', ['faq_category' => $faq_category_element->id])}}">
                            <svg viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
      
     @endforeach     
     

    </table>

@endsection