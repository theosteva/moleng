<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>@yield('title') | ML Analyser</title>
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            background-color: #0B0F2A;
            color: #FFFFFF;
            font-family: 'Arial', sans-serif;
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
 </head>
 <body class="text-white">
  @include('components.header')

  @yield('content')

  <footer class="flex justify-center space-x-4 p-4 bg-gray-800">
   <a class="flex items-center space-x-2" href="#">
    <img alt="App Store" height="40" src="https://storage.googleapis.com/a1aa/image/qVGOVjsRw7oSOdzvOWtbxv3MS3W4YFBz9cKz2NiO5zp0Je1JA.jpg" width="100"/>
   </a>
   <a class="flex items-center space-x-2" href="#">
    <img alt="Google Play" height="40" src="https://storage.googleapis.com/a1aa/image/0YlXOB6F2XIqNFdlXOYRVkfeakTU4e1PjOuVfNqhb3WocivOB.jpg" width="100"/>
   </a>
  </footer>
 </body>
</html> 