
@if(isset($tab))

    <div class="tabs-language-items">
        <div class="tabs-language-menu">
            <ul> 
                <li class="tab-language-items tab-translate-active" data-tab="{{$tab}}" data-localetab='es'>
                    Español
                </li>      
                <li class="tab-language-items" data-tab="{{$tab}}" data-localetab='en'>
                    English
                </li>         
            </ul>
        </div>
    </div>

    {{$slot}}

@endisset



