@php
    $route = 'business_information';
@endphp

@extends('admin.layout.table-form')


@section('form')

   

    <form  class="admin-form" id="business-information-form" action="{{route("business_information_store")}}" autocomplete="off">

        {{ csrf_field() }}
            
        <input autocomplete="false" name="hidden" type="text" style="display:none;">
        <input type="hidden" name="id" value="front/information"> 


        <div class="tabs-container">
            <div class="tabs-container-menu">
                <ul>
                    <li class="tab-item tab-active" data-tab="content">
                        Content
                    </li>  

                    <li class="tab-item" data-tab="logo">
                        Logo
                    </li>   
                    
                    <li class="tab-item" data-tab="presentation">
                        Presentation
                    </li>  

                    <li class="tab-item" data-tab="Socials">
                        Social
                    </li>  
                </ul>
            </div>
            
            <div class="button">
                
                <div class="refresh-button" id="refresh-button" data-url="{{route('faqs_create')}}">
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

                <div class="label-container">
                    <label for="name">Name:</label>
                </div>
                <div class="input-container">
                    <input type="text" name="name" value="{{isset($faq->name) ? $faq->name : ''}}"  class="input-highlight"/>
                </div>
            </div>

            @component('admin.layout.partials.locale', ['tab' => 'content'])

                @foreach ($localizations as $localization)

                <div class="locale-tab-panel {{ $loop->first ? 'locale-tab-active':'' }}" data-tab="content" data-localetab="{{$localization->alias}}">

                    <div class="two-columns">
                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Teléfono 
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[telephone.{{$localization->alias}}]" value="{{isset($business["telephone.$localization->alias"]) ? $business["telephone.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>
            
                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Email 
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[email.{{$localization->alias}}]" value="{{isset($business["email.$localization->alias"]) ? $business["email.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>
                    </div>
                    
                    <div class="two-columns">
                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Provincia 
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[province.{{$localization->alias}}]" value="{{isset($business["province.$localization->alias"]) ? $business["province.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Población 
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[poblation.{{$localization->alias}}]" value="{{isset($business["poblation.$localization->alias"]) ? $business["poblation.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>
                    </div>
    
                    <div class="two-columns">
                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Código Postal 
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[postalcode.{{$localization->alias}}]" value="{{isset($business["postalcode.$localization->alias"]) ? $business["postalcode.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Dirección 
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[adress.{{$localization->alias}}]" value="{{isset($business["adress.$localization->alias"]) ? $business["adress.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>
                    </div>
                    
                    <div class="two-columns">
                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">Horario</label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[schedule.{{$localization->alias}}]" value="{{isset($business["schedule.$localization->alias"]) ? $business["schedule.$localization->alias"] : ''}}" class="input-highlight">
                            </div>
                        </div>
                    </div>

                </div>


                @endforeach


            @endcomponent

        </div>    
        <div class="tab-panel" data-tab="logo">


            @component('admin.layout.partials.locale', ['tab' => 'logo'])


                @foreach ($localizations as $localization)

                    <div class="tab-language-panel {{ $loop->first ? 'tab-translate-active':'' }}" data-tab="logo" data-localetab="{{$localization->alias}}">

                        <div class="two-columns">
                            <div class="form-group">
                                <div class="form-label">
                                    <label for="name" class="label-highlight">Logo</label>
                                </div>
                                <div class="form-input">
                                    @include('admin.layout.partials.upload_image', [
                                        'entity' => 'business-information',
                                        'type' => 'single', 
                                        'content' => 'logo', 
                                        'alias' => $localization->alias,
                                        'files' => $business->images_logo_preview
                                    ])
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-label">
                                    <label for="name" class="label-highlight">Logo Negative </label>
                                </div>
                                <div class="form-input">
                                    @include('admin.layout.partials.upload_image', [
                                        'entity' => 'business-information',
                                        'type' => 'single', 
                                        'content' => 'logolight', 
                                        'alias' => $localization->alias,
                                        'files' => $business->images_logolight_preview
                                    ])
                                </div>
                            </div>

                        </div>
                            
                    </div>
            
                @endforeach

            @endcomponent
        
        </div>

            @component('admin.layout.partials.locale', ['tab' => 'socials'])

            @foreach ($localizations as $localization)

                <div class="locale-tab-panel {{ $loop->first ? 'locale-tab-active':'' }}" data-tab="socials" data-localetab="{{$localization->alias}}">

                    <div class="four-columns">
                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Instagram
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[instagram.{{$localization->alias}}]" value="{{isset($business["instagram.$localization->alias"]) ? $business["instagram.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Facebook 
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[facebook.{{$localization->alias}}]" value="{{isset($business["facebook.$localization->alias"]) ? $business["facebook.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Twitter 
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[twitter.{{$localization->alias}}]" value="{{isset($business["twitter.$localization->alias"]) ? $business["twitter.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-label">
                                <label for="business" class="label-highlight">
                                    Whatsapp
                                </label>
                            </div>
                            <div class="form-input">
                                <input type="text" name="business[whatsapp.{{$localization->alias}}]" value="{{isset($business["whatsapp.$localization->alias"]) ? $business["whatsapp.$localization->alias"] : ''}}"  class="input-highlight"  />              
                            </div>
                        </div>
                    </div>

                </div>

            @endforeach

        @endcomponent

         </div>

        <div class="tab-panel" data-tab="presentation">

            @component('admin.layout.partials.locale', ['tab' => 'presentation'])

                @foreach ($localizations as $localization)

                    <div class="locale-tab-panel {{ $loop->first ? 'locale-tab-active':'' }}" data-tab="presentation" data-localetab="{{$localization->alias}}">

                        <div class="one-column">
                            <div class="form-group">
                                <div class="form-label">
                                    <label for="business" class="label-highlight">Eslogan</label>
                                </div>
                                <div class="form-input">
                                    <input type="text" name="business[slogan.{{$localization->alias}}]" value="{{isset($business["slogan.$localization->alias"]) ? $business["slogan.$localization->alias"] : ''}}" class="input-highlight">
                                </div>
                            </div>
                        </div>

                        <div class="two-columns">
                            <div class="form-group">
                                <div class="form-label">
                                    <label for="business" class="label-highlight">
                                        Nuestra compañía
                                    </label>
                                </div>
                                <div class="form-input">
                                    <textarea class="ckeditor input-highlight" name="business[ourbusiness.{{$localization->alias}}]">{{isset($business["ourbusiness.$localization->alias"]) ? $business["ourbusiness.$localization->alias"] : ''}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-input">
                                    @include('admin.layout.partials.upload_image', [
                                        'entity' => 'business-information',
                                        'type' => 'single', 
                                        'content' => 'ourbusiness', 
                                        'alias' => $localization->alias,
                                        'files' => $business->images_our_business_preview
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="two-columns">
                            <div class="form-group">
                                <div class="form-input">
                                    @include('admin.layout.partials.upload_image', [
                                        'entity' => 'business-information',
                                        'type' => 'single', 
                                        'content' => 'ourfleet', 
                                        'alias' => $localization->alias,
                                        'files' => $business->images_our_fleet_preview
                                    ])
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-label">
                                    <label for="business" class="label-highlight">
                                        Nuestra flota
                                    </label>
                                </div>
                                <div class="form-input">
                                    <textarea class="ckeditor input-highlight" name="business[ourfleet.{{$localization->alias}}]">{{isset($business["ourfleet.$localization->alias"]) ? $business["ourfleet.$localization->alias"] : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            
            @endcomponent

        </div>
                        
    </form> 
        

@endsection 



