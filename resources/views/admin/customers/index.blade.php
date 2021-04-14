@extends('admin.layout.table-form')

@section('form')

    <form  class="admin-form"id="user-form" action="{{route("customers_store")}}" autocomplete="off">
        <div class="form-group">

            {{ csrf_field() }}
            
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            <input type="hidden" name="id" value="{{isset($customer->id) ? $customer->id : ''}}"> 

            <div class="label-container">
                <label for="Name">Name:</label>
            </div>
            <div class="input-container">    
                <input type="text"  name="name" value="{{isset($customer->name) ? $customer->name : ''}}" class="input">
            </div>    

            <div class="label-container">
                <label for="Email">Email:</label>
            </div>
            <div class="input-container">    
                <input type="text"  name="email" value="{{isset($customer->email) ? $customer->email : ''}}" class="input">
            </div>    

            <div class="label-container">
                <label for="Direction">Direction:</label>
            </div>
            <div class="input-container">    
                <input type="text"  name="direction" value="{{isset($customer->direction) ? $customer->direction : ''}}" class="input">
            </div>    

            <div class="label-container">
                <label for="Postal Code">Postal Code</label>
            </div>
            <div class="input-container">    
                <input type="text"  name="postal_code" value="{{isset($customer->postal_code) ? $customer->postal_code : ''}}" class="input">
            </div>    

            <div class="label-container">
                <label for="Number">Number:</label>
            </div>
            <div class="input-container">    
                <input type="text"  name="number" value="{{isset($customer->number) ? $customer->number : ''}}" class="input">
            </div>    

            <div class="label-container">
                <label for="Country">Country:</label>
            </div>   
            
            <div class="input-container">
                <select name="country_id" class="input-highlight">
                    <option></option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}" {{$customer->country_id == $country->id ? 'selected':''}} class="country_id">{{ $country->name }}</option>
                    @endforeach
                </select>    
            </div>
        </div>

        <div class="button">
            <input type="submit" value="Enviar" id="send-button">
        </div>
    </form> 

@endsection

@section('table')

    <table>

    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>email</th>
        <th>direction</th>
        <th>Postal Code</th>
        <th>number</th>
        <th>Country<th>

    </tr>

    @foreach($customers as $customer_element)
        <tr>
            <td>{{$customer_element->id}}</td>
            <td>{{$customer_element->name}}</td>
            <td>{{$customer_element->email}}</td>
            <td>{{$customer_element->direction}}</td>
            <td>{{$customer_element->postal_code}}</td>
            <td>{{$customer_element->number}}</td>
            <td>{{$customer_element->country}}</td>
           
            <td>
                <div class="buttons">
                    <button class="edit-button" data-url="{{route('customers_show', ['customer' => $customer_element->id])}}" > 
                        <svg  viewBox="0 0 24 24">
                            <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                        </svg>
                    </button>

                    <button class="delete-button" data-url="{{route('customers_destroy', ['customer' => $customer_element->id])}}">
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