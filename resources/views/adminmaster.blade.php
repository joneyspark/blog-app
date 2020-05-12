<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Dashboard - SB Admin Pro</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
        <style>
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-Thin.otf')}}');
            font-weight: 100;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-ThinItalic.otf')}}');
            font-weight: 100;
            font-style: italic;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-ExtraLight.otf')}}');
            font-weight: 200;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-ExtraLightItalic.otf')}}');
            font-weight: 200;
            font-style: italic;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-Light.otf')}}');
            font-weight: 300;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-LightItalic.otf')}}');
            font-weight: 300;
            font-style: italic;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-Regular.otf')}}');
            font-weight: 400;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-RegularItalic.otf')}}');
            font-weight: 400;
            font-style: italic;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-Medium.otf')}}');
            font-weight: 500;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-MediumItalic.otf')}}');
            font-weight: 500;
            font-style: italic;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-SemiBold.otf')}}');
            font-weight: 600;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-SemiBoldItalic.otf')}}');
            font-weight: 600;
            font-style: italic;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-Bold.otf')}}');
            font-weight: 700;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-BoldItalic.otf')}}');
            font-weight: 700;
            font-style: italic;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-ExtraBold.otf')}}');
            font-weight: 800;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-ExtraBoldItalic.otf')}}');
            font-weight: 800;
            font-style: italic;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-Black.otf')}}');
            font-weight: 800;
            font-style: normal;
            }
            @font-face {
            font-family: "Metropolis";
            src: url('{{asset('/admin/assets/fonts/metropolis/Metropolis-BlackItalic.otf')}}');
            font-weight: 800;
            font-style: italic;
            }
        </style>
        <script type="text/javascript">
        (function (){
            window.Laravel = {
                csrfToken: '{{ csrf_token() }}'
            };
        })();
        </script>
    </head>
    <body class="nav-fixed">
        <div id="app">
            <admin-master></admin-master>
        </div>
        <script src="{{mix('/js/app.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('admin/js/scripts.js')}}"></script>
    </body>
</html>
