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

                <li class="nav-item button ps-2 pe-2">
                    <a class="nav-link btn btn-primary" href="/reservations" style="color:white; width:10vw">Reserve Now</a>
                </li>

                <li class="nav-item ps-2 pe-2">

                    <a class="nav-link text-primary" href="#">Rooms</a>
                </li>
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="/facilities">Facilities</a>
                </li>
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="/aboutus">About us</a>
                </li>

                @if (Auth::check())
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-primary ps-2 pe-2" href="#" id="navbarDarkDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
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
