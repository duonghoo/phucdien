
<ul class="nav navbar-nav navbar-right">
    @if(!empty($mainMenuPc))
            @foreach($mainMenuPc as $key => $value)
            <li class="nav-item ms-1 {{ !empty($value['children']) ? 'dropdown' : '' }}  {{ !empty($breadCrumb[0]) && ($breadCrumb[0]['item'] == url($value['url'])) ? 'active' : '' }}">
                <a href="{{ $value['url'] }}" class="nav-link  {{!empty($value['children']) ? 'dropdown-toggle' : ''}}" {{!empty($value['children']) ? 'data-toggle="dropdown"' : ''}} title="{{$value['name']}}">{{$value['name']}}</a>

                @if(!empty($value['children']))
                    <ul class="dropdown-menu">
                        @foreach($value['children'] as $item)
                            <li class="{{ !empty($breadCrumb[0]) && ($breadCrumb[0]['item'] == url($item['url'])) ? 'active' : '' }}">
                                <a href="{{ $item['url'] }}" class="dropdown-item " title="{{$item['name']}}">{{$item['name']}}</a>
                            </li>
                            @endforeach
                    </ul>
                @endif
            </li>
            @endforeach
        @endif
</ul>