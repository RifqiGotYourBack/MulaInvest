

<body>

    <!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- tambahan admin -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MulaInvest @yield('title')</title>

    <!-- css buat bagian admin -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- css -->
    <style>
      body {
        font-family: 'Montserrat', sans-serif;
        font-family: 'Poppins', sans-serif;
        .hoverText:hover {
          color: #fbc000;
          transition-duration: 0.3s;
        }
        .white {
          color: white;
        }
        .hoverCard {
        border-width: 3px;
        border-color: black;
        background-color: white;
        transition: background-color 0.4s;
        }

        .hoverCard:hover {
        background-color: #FFC232;
        border-width: 3px;
        border-color: #FFC232;
        }

        .hoverSidebar {
        text-decoration: none;
        font-weight: 400;
        transition:  0.15s;
        }

        .hoverSidebar:hover {
        font-weight: 650;
        }
      }
    </style>
  </head>
