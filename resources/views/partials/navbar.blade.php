@php
    use App\Models\Reservation;
    $isUserHasReservation = Auth::check() ? Reservation::where('user_id', Auth::user()->id)->where('status', 'pending')->first() : null;
@endphp

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

        {{-- Logo --}}
        <a href="/">
            <img src="{{ asset('images/web_icon.png') }}" alt="FX Hotels" width="100vw">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                @if(!Auth::check() || !Auth::user()->isAdmin())

                    <li class="nav-item button ps-2 pe-2">
                        <a class="nav-link btn btn-primary" style="color:white; width:10vw"
                        href=
                        {{
                            $isUserHasReservation ?
                            "/reservations/checkout/" . $isUserHasReservation->id :
                            "/reservations"
                        }}

                        >{{ __('navbar.reserve') }}</a>
                    </li>
                @endif

                <li class="nav-item ps-2 pe-2">

                    <a class="nav-link text-primary" href="/rooms">{{ __('navbar.rooms') }}</a>
                </li>
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="/facilities">{{ __('navbar.facilities') }}</a>
                </li>
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="/aboutus">{{ __('navbar.aboutus') }}</a>
                </li>

                @if (Auth::check())
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-primary ps-2 pe-2" href="#" id="navbarDarkDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ "Hi, " . Auth::user()->getLastName()}}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/transactions">{{ Auth::user()->role == 'Admin' ?  __('navbar.dropdown.adminMyTransaction') : __('navbar.dropdown.myTransaction')}}</a>
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('navbar.dropdown.logout') }}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <li class="nav-item ps-2 pe-2">
                        <a class="nav-link text-primary" href="/register">Sign Up</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
