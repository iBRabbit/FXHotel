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

</style>

<footer class="navbar navbar-expand-lg navbar-light  d-flex justify-content-center mt-auto">

    <p class = "align-items-center pt-2 pb-2 m-0 fw-bold text-white" id="footer-copyright">Copyright © Lalala Koper 2023</p>

    <div class="social-media-container">
            
            <a href="https://www.facebook.com/" target="_blank" class="social-media-link">
                <img src="{{ asset('images/facebook.png') }}" alt="Facebook" width="30px" height="30px">
            </a>
            
            <a href="https://www.twitter.com/" target="_blank" class="social-media-link">
                <img src="{{ asset('images/twitter.png') }}" alt="Twitter" width="30px" height="30px">
            </a>

            <a href="https://www.instagram.com/" target="_blank" class="social-media-link">
                <img src="{{ asset('images/instagram.png') }}" alt="Instagram" width="30px" height="30px">
            </a>

    </div>

</footer>
