@php
    $route = 'tags';
@endphp

@extends('admin.layout.table-form')


@section('form')

   
    @isset($tag)

        <form  class="admin-form"id="user-form" action="{{route("tags_store")}}" autocomplete="off">

            {{ csrf_field() }}
                
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            <input type="hidden" name="id" value="{{isset($tag->id) ? $tag->id : ''}}"> 


            <div class="tabs-container">
                <div class="tabs-container-menu">
                    <ul>
                        <li class="tab-item tab-active" data-tab="content">
                            Content
                        </li>          
                    </ul>
                </div>
                
                <div class="button">
                    
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

                @component('admin.layout.partials.locale', ['tab' => 'content'])

                    @foreach ($localizations as $localization)

                        <div class="tab-language-panel {{ $loop->first ?'tab-translate-active':'' }}" data-tab="content" data-localetab="{{$localization->alias}}">
                            <div class="two-columns">
                                <div class="form-group">
                                    <div class="label-container">
                                        <label for="value">Traducción para la clave {{$tag->key}} del grupo {{$tag->group}}</label>
                                    </div>
                                    <div class="input-container">    
                                        <input type="text" class="input" name="locale[value.{{$localization->alias}}]" value="{{isset($tag["value.$localization->alias"]) ? $tag["value.$localization->alias"] : ''}}" >
                                    </div>    
                                </div>
                            </div>

                        </div>

                    @endforeach
                    
                @endcomponent

            </div>    
                
        </form> 
        
    @endif

@endsection 

@section('table')
    
    
    <table class="table-info">
        @foreach($tags as $tag_element)

            <thead >
                <tr class="touch">
                    <th> Group {{$tag_element->group}}</th>
                    <th> Key {{$tag_element->key}}</th>
                </tr>
            </thead>

        @endforeach
        {{-- <tbody>
            @foreach($tags as $tag_element)
                <tr class="table-row">
                    <td>{{$tag_element->group}}</td>
                    <td>{{$tag_element->key}}</td>
                    <td>{{ Carbon\Carbon::parse($tag_element->created_at)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody> --}}

        <div class="buttons">

            <div class="crud-buttons">
                <div id="edit-button" class="edit-button" data-url="{{route('tags')}}"> 
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                    </svg>
                </div>
            </div>      
   
            @include('admin.layout.partials.pagination', ['items' => $tags])
            
        </div>   
    </table>
   
    

@endsection



