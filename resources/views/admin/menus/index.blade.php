@php
    $route = 'menus';
@endphp

@extends('admin.layout.table-form')


@section('form')

   
    @isset($menu)

        <form class="admin-form"id="user-form" action="{{route("menus_store")}}" autocomplete="off">

            {{ csrf_field() }}
                
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            <input type="hidden" name="id" value="{{isset($menu->id) ? $menu->id : ''}}"> 


            <div class="tabs-container">
                <div class="tabs-container-menu">
                    <ul>
                        <li class="tab-item tab-active" data-tab="content">
                            Content
                        </li>  
                    </ul>
                </div>
                
                <div class="button">
                    
                    <div class="refresh-button" id="refresh-button" data-url="{{route('menus_create')}}">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16.24,3.56L21.19,8.5C21.97,9.29 21.97,10.55 21.19,11.34L12,20.53C10.44,22.09 7.91,22.09 6.34,20.53L2.81,17C2.03,16.21 2.03,14.95 2.81,14.16L13.41,3.56C14.2,2.78 15.46,2.78 16.24,3.56M4.22,15.58L7.76,19.11C8.54,19.9 9.8,19.9 10.59,19.11L14.12,15.58L9.17,10.63L4.22,15.58Z" />
                        </svg>
                    </div>
                    
                    <div class="send-button" id="send-button">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
                        </svg>
                    </div>

                    <div class="switcher">
                        <label class="switch">
                          <input type="checkbox" checked>
                          <span class="switch-left">On</span>
                          <span class="switch-right">Off</span>
                        </label>
                    </div>

                </div>
            </div>

            <div class="tab-panel tab-active" data-tab="content">

                <div class="form-group">   
                    <div class="label-container">
                        <label for="name">Name:</label>
                    </div>
                    <div class="input-container">
                        <input type="text" name="name" value="{{isset($menu->name) ? $menu->name : ''}}"  class="input-highlight"/>
                    </div>
                </div>


                @isset($menu->name)
                    <div id="menu-item-form-container">
                        @include('admin.menu_items.index', ['menu' => $menu])
                    </div>
                @endisset

            </div>    
                             
        </form> 
        
    @endif

@endsection 




@section('table')

    @isset($menus)

        <table class="table-info">
            <thead >
                <tr class="touch">
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($menus as $menu_element)
                    <tr class="table-row" id="{{$menu_element->id}}">
                        <td>{{$menu_element->name}}</td>
                        <td>
                            <div class="crud-buttons">
                                <div id="edit-button" class="edit-button" data-url="{{route('menus_show', ['menu' => $menu_element->id ])}}">
                                    <svg  viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                    </svg>
                                </div>
                            
                                <div id="delete-button" class="delete-button" data-url="{{route('menus_destroy', ['menu' => $menu_element->id ])}}">
                                    <svg viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>    

    @endisset

@endsection






