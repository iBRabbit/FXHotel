<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        
        {{-- Logo --}}
        <img src="{{ asset('images/web_icon.png') }}" alt="FX Hotels" width="100vw" >

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item button ps-2 pe-2">
                    <a class="nav-link btn btn-primary"  href="#" style="color:white; width:10vw">Reserve Now</a>
                </li>

                <li class="nav-item ps-2 pe-2">
                    
                    <a class="nav-link text-primary" href="#">Rooms</a>
                </li>
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="#">Facilities</a>
                </li>
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="#">About us</a>
                </li>
                
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link text-primary" href="#">Sign Up</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
