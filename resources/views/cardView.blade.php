<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8" />
    <title>{{ $card->first_name }}  {{ $card->last_name }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <link rel="manifest" href="site.webmanifest" />
    <link rel="apple-touch-icon" href="icon.png" />
    <!-- Place favicon.ico in the root directory -->

    <!-- -----cdn------ -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <!-- -----cdn------ -->

    <link rel="stylesheet" href="{{ asset('website/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/main.css') }}" />

    <meta name="theme-color" content="#fafafa" />

</head>

<body>

    <section>
        <div class="wrapper">
            <div class="profile-card">
                <div class="profile-header">
                    @if ($card->cover_photo)
                        <img src="{{ asset($card->cover_photo) }}" alt="heder">
                    @else
                        <img src="{{ asset('website/img/heder.png') }}" alt="heder">
                    @endif
                    
                </div>
                <div class="qr">
                    <a href="">{!! QrCode::size(34)->generate(route('card.username',$card->user_name)) !!}</a>
                </div>
                <div class="profile-body">
                    <div class="author-img">
                        @if ($card->photo)
                            <img src="{{ asset($card->photo) }}" alt="heder">
                        @else
                            <img src="{{ asset('website/img/heder.png') }}" alt="heder">
                        @endif
                    </div>
                    <div class="name">{{ $card->first_name }}  {{ $card->last_name }}</div>
                    <div class="intro">
                        <p>{{ $card->phone }}</p>
                    </div>
                    <div class="social_list">
                        @if ($card->link_1)
                            <ul>
                                @foreach (json_decode($card->link_1) as $key=>$link)
                                    <li>
                                        @if ($key == 'linkedin')
                                            <i class="fab fa-linkedin-in custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">linkedin</a></span>
                                        @elseif($key == 'Vimeo')
                                            <i class="fab fa-vimeo-v custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">vimeo</a></span>
                                        @elseif($key == 'facebook')
                                            <i class="fab fa-facebook custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">facebook</a></span>
                                        @elseif($key == 'Twiter')
                                            <i class="fab fa-twitter custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">twitter</a></span>
                                        @elseif($key == 'Instagram')
                                            <i class="fab fa-instagram custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">instagram</a></span>
                                        @elseif($key == 'Behance')
                                            <i class="fab fa-behance custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">behance</a></span>
                                        @elseif($key == 'Youtube')
                                            <i class="fab fa-youtube custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">Youtube</a></span>
                                        @elseif($key == 'Skype')
                                            <i class="fab fa-skype custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">skype</a></span>
                                        @elseif($key == 'WhatsApp')
                                            <i class="fab fa-whatsapp custom_i"></i>
                                            <span>&nbsp;&nbsp;&nbsp; <a href="{{ $link }}">whatsapp</a></span>
                                        @endif
                                    </li>
                                    <br>
                                @endforeach
                                {{-- <li>
                                 <i class="fab fa-vimeo-v custom_i"></i><span>&nbsp;&nbsp;&nbsp; <a href="">Vimeo</a></span>
                                </li><br>
                                 --}}

                            </ul>
                        @endif

                    </div>
                    <div class="social-icon footer">
                        <ul>
                            <li>
                                <a href="tel:{{ $card->phone }}">
                                    <i class="fas fa-phone-alt"></i>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ $card->email }}">
                                    <i class="fas fa-envelope-open-text"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-share-alt"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-download"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="profile-body">
                    <span></span>
                </div> -->
                <div class="footer">
                    <span class="web_address">www.thelakhanigroup.com</span>
                    <span class="pby">Powered By <img src="{{ asset('website/img/pby.jpg') }}" alt=""></span>
                </div>
            </div>
        </div>  
    </section>




    <!-- Add your site or application content here -->

    <script src="{{ asset('website/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('website/js/plugins.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
    window.ga = function () {
        ga.q.push(arguments);
    };
    ga.q = [];
    ga.l = +new Date();
    ga("create", "UA-XXXXX-Y", "auto");
    ga("set", "anonymizeIp", true);
    ga("set", "transport", "beacon");
    ga("send", "pageview");
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>
