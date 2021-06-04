@php
    $route = 'tags';
    $filters = ['parent' => $groups]; 
@endphp

@extends('admin.layout.table-form')


@section('form')

   
    @isset($tag)

        <form  class="admin-form"id="user-form" action="{{route("tags_store")}}" autocomplete="off">

            {{ csrf_field() }}
                
            <input autocomplete="false" name="hidden" type="text" style="display:none;">
            <input type="hidden" name="group" value="{{isset($tag->group) ? $tag->group : ''}}"> 
            <input type="hidden" name="key" value="{{isset($tag->key) ? $tag->key : ''}}"> 


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

                    <div class="import-button" id="import-button" data-url="{{route('tags_import')}}">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M1,12H10.76L8.26,9.5L9.67,8.08L14.59,13L9.67,17.92L8.26,16.5L10.76,14H1V12M19,3C20.11,3 21,3.9 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V16H5V19H19V7H5V10H3V5A2,2 0 0,1 5,3H19Z" />
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


                <div class="form-container">
                    <div class="tabs-container">
                        <div class="tabs-container-menu">
                            <ul>
                                <li class="tab-item tab-active" data-tab="content">
                                    Contenido
                                </li>      
                            </ul>
                        </div>
                    </div>
        
                    <div class="tab-panel tab-active" data-tab="content">
                        <div class="one-column">
                            <div class="form-group">
                                <div class="form-label">
                                    <label>
                                    Pulse <span id="import-tags" data-url="{{route('tags_import')}}">aquí</span> para importar todos los archivos de traducciones.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @component('admin.layout.partials.locale', ['tab' => 'content'])

                    @foreach ($localizations as $localization)

                        <div class="tab-language-panel {{ $loop->first ?'tab-translate-active':'' }}" data-tab="content" data-localetab="{{$localization->alias}}">
                            <div class="two-columns">
                                <div class="form-group">
                                    <div class="label-container">
                                        <label for="value">Traducción para la clave {{$tag->key}} del grupo {{$tag->group}}</label>
                                    </div>
                                    <div class="input-container">    
                                        <input type="text" class="input" name="tag[value.{{$localization->alias}}]" value="{{isset($tag["value.$localization->alias"]) ? $tag["value.$localization->alias"] : ''}}" >
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
        <thead >    
            <tr class="touch">    
                <th>Group</th>
                <th>Key</th>
            </tr>
        </thead>

        @foreach($tags as $tag_element)
            <tr class="table-row" data-group="{{$tag_element->group}}" data-key="{{$tag_element->key}}">
                <td>{{$tag_element->group}}</td>
                <td>{{$tag_element->key}}</td>
            </tr>
        @endforeach

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



