<header class="navbar navbar-expand-md navbar-light">
    <div class="container-custom d-flex justify-content-end">

        <div class="d-flex align-items-center mx-3">
            <img src="{{ asset('img/icon/ICONA-MESSAGGI.svg')}}" alt="">
        </div>

        <div class="d-flex align-items-center mx-3">
            <img src="{{ asset('img/icon/ICONA-NOTIFICHE.svg')}}" alt="">
        </div>

        <div class="d-flex ml-3" id="navbarSupportedContent">
            <img src="{{ asset('img/icon/ICONA-ACCOUNT.svg')}}" alt="">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a style="color: white!important;" id="dropdownMenuButton" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ auth()->user()->user_data->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
