<!doctype html>
<html lang="fr">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Hypnos groupe hôtelier</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/headers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-admin">

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="home" viewBox="0 0 16 16">
        <path
            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
    </symbol>
    <symbol id="speedometer2" viewBox="0 0 16 16">
        <path
            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
        <path fill-rule="evenodd"
              d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
    </symbol>
    <symbol id="table" viewBox="0 0 16 16">
        <path
            d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
    </symbol>
    <symbol id="people-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </symbol>
    <symbol id="grid" viewBox="0 0 16 16">
        <path
            d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
    </symbol>
    <symbol id="email" viewBox="0 0 16 16">
        <path
            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
    </symbol>
</svg>

<nav>
    <header>
        <div class="px-3 py-2 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/"
                       class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"/>
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="{{ route('home') }}" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#home"/>
                                </svg>
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('addBooking') }}" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#table"/>
                                </svg>
                                Réserver
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#email"/>
                                </svg>
                                Contactez-nous
                            </a>
                        </li>
                        @auth
                            @if(auth()->user()->role == 'admin')
                                <div class="dashboard">
                                    <li>
                                        <a href="{{ route('admin.index') }}" class="nav-link text-white">
                                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                                <use xlink:href="#speedometer2"/>
                                            </svg>
                                            Admin Dashboard
                                        </a>
                                    </li>
                                </div>
                            @endif
                            @if(auth()->user()->role == 'manager')
                                <li>
                                    <a href="{{ route('manager.index') }}" class="nav-link text-white">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                            <use xlink:href="#speedometer2"/>
                                        </svg>
                                        Manager Dashboard
                                    </a>
                                </li>

                            @endif
                            @if(auth()->user()->role == 'user')
                                <li>
                                    <a href="{{ route('booking.index') }}" class="nav-link text-white">
                                        <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                            <use xlink:href="#people-circle"/>
                                        </svg>
                                        Mon profil
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->displayFullName() }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        <div class="px-3 py-2 border-bottom mb-3">
            <div class="container d-flex flex-wrap justify-content-end"></div>
        </div>
    </header>
</nav>


{{--    Test admin Menu--}}
@auth
    @if(auth()->user()->role == 'admin')
        <nav class="admin-menu">
            <header>
                <div class="px-3 py-2 bg-dark text-white">
                    <div class="container">
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                            <a href="/"
                               class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                                    <use xlink:href="#bootstrap"/>
                                </svg>
                            </a>

                            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                                <li class="nav-item">
                                    <a href="{{ route('admin.index') }}" class="nav-link active" aria-current="page">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#home"/>
                                        </svg>
                                        Hôtels ({{ $hotels->count() }})
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.adminManager.listSuites') }}" class="nav-link text-white">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#speedometer2"/>
                                        </svg>
                                        Suites ({{ $suites->count() }})
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.adminManager.listManagers') }}"
                                       class="nav-link text-white">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#table"/>
                                        </svg>
                                        Managers ({{ $managers->count() }})
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.adminContact.index') }}" class="nav-link text-white">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#grid"/>
                                        </svg>
                                        Messages <span class="message">({{ $contacts->count() }})</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.adminManager.listUsers') }}" class="nav-link text-white">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#people-circle"/>
                                        </svg>
                                        Clients ({{ $users->count() }})
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="px-3 py-2 border-bottom mb-3">
                </div>
            </header>
        </nav>
    @endif
@endauth
{{--    Fin Admin Menu--}}

<main class="container">
    @include('notifications')
    @yield("content")
</main>


<script src="{{ asset('js/bootstrap.bundle.min.js') }}"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- jQuery -->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>

@stack('scripts')

</body>
</html>
