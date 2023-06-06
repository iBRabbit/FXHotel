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

                {{-- @dd(Auth::user()) --}}

                @if(!Auth::check() || !Auth::user()->isAdmin())

                    <li class="nav-item button ps-2 pe-2">
                        <a class="nav-link btn btn-primary" style="color:white; width:10vw"
                        href=
                        {{
                            $isUserHasReservation ?
                            "/reservations/checkout/" . $isUserHasReservation->id :
                            "/reservations"
                        }}

                        >Reserve Now</a>
                    </li>
                @endif

                <li class="nav-item ps-2 pe-2">

                    <a class="nav-link text-primary" href="/rooms">Rooms</a>
                </li>
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="/facilities">Facilities</a>
                </li>
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="/aboutus">About Us</a>
                </li>

                @if (Auth::check())
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-primary ps-2 pe-2" href="#" id="navbarDarkDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ "Hi, " . Auth::user()->getLastName()}}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/transactions">My Transactions</a>
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
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
