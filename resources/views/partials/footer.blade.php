<style>
    footer {
        position: relative;
        background-color: #72AAFF;
    }

    .social-media-container {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;

    }

    .social-media-link {
        margin-left: 1vw;
        margin-right: 1vw;
    }

    #footer-copyright {
        text-shadow: 2px 2px #636363;
    }

    .footer-left {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-inline-start: 10px;
    }
</style>


@php

@endphp

<footer class="navbar navbar-expand-lg navbar-light  d-flex justify-content-center mt-auto">

    <div class="footer-left">
        {{-- Dropdown for language selector --}}
        <div class="dropdown">
            <div class="btn-group dropup">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false" id = "btn">
                    Select Language
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <li><a class="dropdown-item" href="{{ setLanguageURL("cn")}}" id = "cn_dropdown">Chinese</a></li>
                    <li><a class="dropdown-item" href="{{ setLanguageURL("id") }}" id = "id_dropdown">Indonesian</a></li>
                    <li><a class="dropdown-item" href="{{ setLanguageURL("en") }}" id = "en_dropdown">English</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-center">
        <p class="align-items-center pt-2 pb-2 m-0 fw-bold text-white" id="footer-copyright">Copyright © Lalala Koper
            2023</p>
    </div>

    <div class="footer-right">
        <div class="social-media-container">

            <a href="https://www.facebook.com/" target="_blank" class="social-media-link">
                <img src="{{ asset('images/footer/facebook.png') }}" alt="Facebook" width="30px" height="30px">
            </a>

            <a href="https://www.twitter.com/" target="_blank" class="social-media-link">
                <img src="{{ asset('images/footer/twitter.png') }}" alt="Twitter" width="30px" height="30px">
            </a>

            <a href="https://www.instagram.com/" target="_blank" class="social-media-link">
                <img src="{{ asset('images/footer/instagram.png') }}" alt="Instagram" width="30px" height="30px">
            </a>

        </div>
    </div>



</footer>

