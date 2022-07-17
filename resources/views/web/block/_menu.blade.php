
<div class="collapse navbar-collapse">
    <!-- menus -->
    <ul class="navbar-nav mr-auto">
        @if(!empty($mainMenuPc))
            @foreach($mainMenuPc as $key => $value)
            <li class="nav-item {{ !empty($value['children']) ? 'dropdown' : '' }}  {{ !empty($breadCrumb[0]) && ($breadCrumb[0]['item'] == url($value['url'])) ? 'active' : '' }}">
                <a href="{{ $value['url'] }}" class="nav-link {{!empty($value['children']) ? 'dropdown-toggle' : ''}}" title="{{$value['name']}}">{{$value['name']}}</a>

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
        {{-- <li class="nav-item">
            <a class="nav-link" href="category.html">Lifestyle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category.html">Inspiration</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#">Pages</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="category.html">Category</a></li>
                <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                <li><a class="dropdown-item" href="blog-single-alt.html">Blog Single Alt</a></li>
                <li><a class="dropdown-item" href="about.html">About</a></li>
                <li><a class="dropdown-item" href="contact.html">Contact</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
        </li> --}}
    </ul>
</div>