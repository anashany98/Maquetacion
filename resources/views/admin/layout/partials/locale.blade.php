
@if(isset($tab))

    <div class="tabs-language-items">
        <div class="tabs-language-menu">
            <ul> 
                @foreach ($localizations as $localization)

                <li class="tab-language-item {{ $loop->first ? 'tab-translate-active':'' }}" data-tab="{{$tab}}" data-localetab="{{$localization->alias}}">
                    {{$localization->name}}
                </li>      
   
                @endforeach
            </ul>
        </div>
    </div>

    {{$slot}}

@endisset



