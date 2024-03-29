<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Telzir - Home </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/custom.css')   }}">


</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#corNavbar01"
            aria-controls="corNavbar01" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="corNavbar01">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('web.index') }}">Home <span class="sr-only">(Página
                            atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Conato</a>
                </li>

            </ul>

        </div>
    </nav>


    @yield('content')



    <!-- Footer -->
    <footer class="bg-primary text-center text-white">
        <div class="container p-4">
            <section class="">



                <a target="_blank" class="btn btn-outline-light btn-floating m-1" href="jeffersonsevero08@gmail.com"
                    role="button"><i class="fab fa-google"></i></a>

                <a target="_blank" class="btn btn-outline-light btn-floating m-1"
                    href="https://www.instagram.com/jeffersonccss/" role="button"><i class="fab fa-instagram"></i></a>

                <a target="_blank" class="btn btn-outline-light btn-floating m-1"
                    href="https://www.linkedin.com/in/jefferson-severo-83760a152/" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                <a target="_blank" class="btn btn-outline-light btn-floating m-1"
                    href="https://github.com/jeffersonsevero" role="button"><i class="fab fa-github"></i></a>
            </section>



            <section class="">
                <p>
                    Todos os direitos reservaos!
                </p>

                <div class="text-center p-3">
                    © {{ date('Y') }} Copyright:
                    <p>Feito por <em>Jefferson C. Severo</em> </p>
                </div>
            </section>

        </div>


    </footer>
    <!-- Footer -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <script src="{{ public_path() . '/js/script.js'  }}"></script>

    @hasSection('js')
    @yield('js')

    @endif


</body>

</html>
