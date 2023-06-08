@php
    App::setLocale(Cookie::get('lang')); 
@endphp
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>

    {{-- Bootstrap v.5.2.3 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       <style>
           .form-control[readonly] {
               background-color: #e9ecef;
               opacity: 1;
           }
       </style>
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Content --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    @if ($errors->any())
        <script>
            let errorMessages = {
                @foreach ($errors->keys() as $error)
                    @error($error)
                        '{{ $error }}': '{{ $message }}',
                    @enderror
                @endforeach
            };
            Object.keys(errorMessages).forEach(inputName => {
                $(`[name="${inputName}"]`).addClass("is-invalid");
                let errMessageElement = `<div class='invalid-feedback'>${errorMessages[inputName]}</div>`;
                $(errMessageElement).insertAfter(`[name="${inputName}"]`);
            });
        </script>
    @endif

    <script>
        let en_dropdown = document.getElementById("en_dropdown");
        let id_dropdown = document.getElementById("id_dropdown");
        let cn_dropdown = document.getElementById("cn_dropdown");
        // let btn = document.getElementById("btn");

        // btn.addEventListener("click", () => {
        //     console.log("Masuk");
        // });

        // en_dropdown.addEventListener("click", () => {
        //     {{ Cookie::queue(Cookie::make('lang', 'en')) }}
        //     console.log("Masuk")
        // });

        // id_dropdown.addEventListener("click", () => {
        //     {{ Cookie::queue(Cookie::make('lang', 'id')) }}
        // });

        // cn_dropdown.addEventListener("click", () => {
        //     {{ Cookie::queue(Cookie::make('lang', 'cn')) }}
        // });


    </script>
</body>

</html>
