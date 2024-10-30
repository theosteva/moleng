<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>@yield('title') | ML Analyser</title>
  <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            background-color: #0B0F2A;
            color: #FFFFFF;
            font-family: 'Inria Sans', sans-serif;
        }
        .nav-link {
            color: #A0A3BD;
        }
        .nav-link.active {
            color: #FFFFFF;
            background: linear-gradient(90deg, rgba(0, 255, 255, 0.5), rgba(255, 0, 255, 0.5));
        }
        .hero-card {
            background-color: #1C1F3A;
        }
  </style>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @stack('styles')
 </head>
 <body class="text-white">
  @include('components.header')

  @yield('content')

 </body>
</html> 