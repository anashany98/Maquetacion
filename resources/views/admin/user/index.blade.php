@extends('admin.layout.table-form')

@section('form')

    <form  class="admin-form"id="user-form" action="{{route("users_store")}}" autocomplete="off">
        <div class="form-group">

            {{ csrf_field() }}
            
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            <input type="hidden" name="id" value="{{isset($user->id) ? $user->id : ''}}"> 

            <div class="label-container">
                <label for="Name">Name:</label>
            </div>
            <div class="input-container">    
                <input type="text" id="name" name="name" value="{{isset($user->id) ? $user->name : ''}}" class="input">
            </div>    
        </div>

        <div class="form-group">   
            <div class="label-container">
                <label for="Email">Email:</label>
            </div>
            <div class="input-container">    
                <input type="text" id="email" name="email" value="{{isset($user->email) ? $user->email : ''}}"class="input" >
                    {{isset($user->email) ? $user->email : ''}}
            </div>
        </div>
        <div class="form-group">   
            <div class="label-container">
                <label for="Passwrord">Password:</label>
            </div>
            <div class="input-container">    
                <input type="password" id="password" name="password" value="{{isset($user->password) ? $user->password : ''}}"class="input" >
                    {{isset($user->password) ? $user->password : ''}}
        
            </div>
        </div>
        <div class="form-group">   
            <div class="label-container">
                <label for="password_verified_at">Passwrord Confirmation:</label>
            </div>
            <div class="input-container">    
                <input type="password" id="passsword_verified_at" name="password_verified_at" value="{{isset($user->password) ? $user->password : ''}}"class="input" >
                    {{isset($user->password) ? $user->password : ''}}
            </div>
        </div>
        {{-- <div class="input-container">
            <select name="name_id" data-placeholder="Seleccione una categoría" class="input-highlight">
                <option></option>
                    @foreach($faqs_categories as $faq_category_element)
                        
                        <option value="{{$faq_category_element->id}}" 
                            {{$faq->category_id == $faq_category_element->id ? 'selected':''}} 
                            class="category_id">
                            {{ $faq_category_element->name }}
                        </option>
                    @endforeach
            </select>                   
        </div> --}}
        <div class="button">
            <input type="submit" value="Enviar" id="send-button">
        </div>
    </form> 

@endsection

@section('table')

    <table>

            <tr>
                <th>Id</th>
                <th>name</th>
                <th>email</th>
                <th>Options</th>
            </tr>

        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>

                    <div class="buttons">
                        <button class="edit-button" data-url="{{route('users_show', ['user' => $user->id])}}" > 
                            <svg  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                            </svg>
                        </button>

                        <button class="delete-button" data-url="{{route('users_destroy', ['user' => $user->id])}}">
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