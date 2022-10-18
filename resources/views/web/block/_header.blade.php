<header>
    <div class="top-bar bg_primary">
        <div class="container">
            <div class="row ">
                <div class="col-sm-8 address">
                    <p><i class="ti-location-pin"></i> {!! getSiteSetting('address') ?? '' !!}</p>
                </div>

                <div class="col-sm-2 address">
                    <select class="form-control mt-2 ms-auto changeLang">
                        <option value="vi" {{ session()->get('locale') == 'vi' ? 'selected' : '' }}>Vietnamese</option>
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    </select>
                </div>
                <div class="col-sm-2 social">
                    <ul>

                        <li><a href="{{ getSiteSetting('site_facebook') }} ?? ''" target="_blank"><i
                                    class="fab fa-facebook-f "></i></a></li>
                        <li><a href="{{ getSiteSetting('site_twitter') }} ?? ''" target="_blank"><i
                                    class="fab fa-twitter "></i></a></li>
                        <li><a href="{{ getSiteSetting('site_instagram') }} ?? ''" target="_blank"><i
                                    class="fab fa-instagram "></i></a></li>
                        {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li> --}}
                        <li><a href="{{ getSiteSetting('site_youtube') }} ?? ''" target="_blank"><i
                                    class="fab fa-youtube "></i></a></li>

                    </ul>
                </div>

            </div>
        </div>
    </div>

    <nav class="navbar navbar-custom navbar-fixed-top bg_secondary" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand"><img src="{{getSiteSetting('site_logo')}}" style="max-height:5rem" alt=""></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                
                <a class="navbar-brand" href="/">
                    
                    <span>Phúc Diễn</span>
                </a>

                <p>{{__('mes.contact_us')}} <b>{!! getSiteSetting('site_hotline') ?? '' !!}</b></p>
            </div>
            <div class="collapse navbar-collapse navbar-main-collapse">
                @include('web.block._menu', ['breadCrumb' => $breadCrumb ?? ''])
            </div>
        </div>
    </nav>
</header>

<script>
    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function() {
        window.location.href = url + "?lang=" + $(this).val();
    });
    document.addEventListener('DOMContentLoaded', (event) => {
       
    });
    $(document).ready(function() {
         
         $(function() {
             $('select').selectpicker();
         });
     });
</script>
