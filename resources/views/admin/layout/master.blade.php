<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Painel Administrativo &mdash; MLDesigner</title>

    <!-- General CSS Files in Public -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">

    <!-- CSS Data Table -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css">

    <!-- API CSS Libraries Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- <div class="navbar-bg">
                
            </div> --}}
            {{-- START NAVBAR --}}
            @include('admin.layout.navbar')
            {{-- END NAVBAR --}}

            {{-- START SIDEBAR --}}
            @include('admin.layout.sidebar')
            {{-- END SIDEBAR --}}

            <!-- START MAIN CONTENT -->
            <div class="main-content">
                {{-- Submete ao Dashboard --}}
                @yield('content')

            </div>
            <!-- END MAIN CONTENT -->

            {{-- STARTE FOOTER --}}
            <footer class="main-footer">
                <div class="footer-left">
                    Todos os Direitos Reservados &copy; <?= date('Y') ?> <div class="bullet"></div> Desenvolvido por <a
                        href="https://github.com/Mleite22">MLDesigner</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
            {{-- END FOOTER --}}
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('backend/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- JS Data Table -->
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    <!-- JS Libraies Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('backend/assets/js/page/index-0.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

    {{-- InputMask --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    {{-- JS SWEETALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- Implementando a logica do Toastr --}}
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
    {{-- Implementando a logica do SweetAlert --}}
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-item', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: "Tem certeza?",
                    text: "Você não poderá reverter isso!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1e5e2f",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, excluir!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,

                            success: function(data) {

                                if (data.status == 'success') {
                                    Swal.fire({
                                        title: "Excluído!",
                                        text: "Seu arquivo foi excluído com sucesso!",
                                        icon: "success"
                                    });
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })
                    }
                });
            })
        });
    </script>

    <script>
        //Adicionar máscara de moeda
        $('#mascara_valor').mask('#.##0,00', {
            reverse: true
        });
    </script>
    @stack('scripts')
</body>

</html>
