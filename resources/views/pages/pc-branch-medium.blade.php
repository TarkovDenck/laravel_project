<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Documentasd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/pc-branch.css') }}">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-main">
      <div class="container-fluid nav-content">
          <div class="flexing-row navlogo">
              <h1 class="display-6" style="font-weight: 500; color: #000000; letter-spacing: 15px;">LERO</h1>
          </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-collapse-sorting" id="navbarNav">
          <ul class="navbar-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home') }}" style="color: #000000;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('catalog') }}" style="color: #000000;">Shop</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('about') }}" style="color: #000000;">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact-page') }}" style="color: #000000;">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('comment') }}" style="color: #000000;">Comments</a>
                </li>
            </ul>
          </ul>
          <!-- Tombol Login/Logout -->
          @guest
          <!-- Tampilkan jika belum login -->
          <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
            @endguest

            @auth
                <!-- Tampilkan jika sudah login -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->username }} <!-- Menampilkan username -->
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            @endauth
        </div>
      </div>
    </nav>
      <div class="catalog">
        <section class="darkbg">
            <div class="container-fluid container-general main">
              <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active carousel-design">
                    <img src="Image\pc-branch\medium-blue\Ob1-scaled.png" class="d-block w-50 carousel-align carousel-design" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="Image\pc-branch\medium-blue\Ob2-scaled.png" class="d-block w-50 carousel-align carousel-design" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="Image\pc-branch\medium-blue\Ob7-scaled.png" class="d-block w-50 carousel-align carousel-design" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <div class="main-content animated animatedFadeInUp fadeInUp">
                <h1>
                    Introducing the AMD Power SILVER Gaming PC 
                </h1>
                <p class="lead">
                    Experience cutting-edge gaming performance with the AMD Power SILVER PC. This meticulously crafted machine boasts a formidable array of components, ensuring smooth gameplay and stunning visuals.
                <br>
                <br>
                The AMD Power SILVER is the perfect choice for gamers and enthusiasts seeking an uncompromising PC experience. Order yours today and elevate your gaming to new heights!
                </p>
            </div>
        </section>

        <section class="darkbg">
            <div class="container-fluid container-general pillars ">
                <div class="pillars-title">
                    <h1 class="pillars-title-size display-5 text-center">
                        OUR PC VARIANT
                    </h1>
                    <div class="underline">
                        
                    </div>
                </div>

                <div class="container-fluid cardlist">
                    <div class="card cardbg cardsize">
                        <div class="card-body card-content card-typography card-design">
                            <div  class="card-typography animated animatedFadeInUp fadeInUp">
                              <h2 class="gradient-text-silver display-1 ">
                                  AMD POWER SILVER
                              </h2>
                              <h3 class="glow ">
                                  $2,444.44
                              </h3>
                              <div class="list-main">
                                <h5 class="lead ">Build Specifications:</h5>
                                <ul class="list-main" style="opacity: 90%;">  
                                    <li class="">
                                        COUGAR Duoface RGB Mid-Tower Case - Black
                                    </li>
                                    <li class="">
                                        DeepCool LT520 Liquid CPU Cooler - Black
                                    </li>
                                    <li class="">
                                        MSI MAG B650 Tomahawk WiFi DDR5 ATX Motherboard
                                    </li>
                                    <li class="">
                                        AMD Ryzen 7 7800X3D Processor
                                    </li>
                                    <li class="">
                                        KINGSTON Fury Beast RGB 32GB (2x16GB) DDR5 6000MHz C36 RAM - Black
                                    </li>
                                    <li class="">
                                        KINGSTON SKC3000d 2TB Gen4 NVMe SSD
                                    </li>
                                    <li class="">
                                        MSI Ventus 3X GeForce RTX 4080 Super OC 16GB
                                    </li>
                                    <li class="">
                                        be quiet! PURE POWER 12 850W 80+ Gold Fully-Modular ATX 3.0 Power Supply
                                    </li>
                                    <li class="">
                                        Windows 11
                                    </li>
                                </ul>
                              </div>
                            </div>
                          <a href="/form-preorder" class="btn btn-primary button-blue">Go Pre-order Now!</a>
                        </div>
                    </div>
                    <div class="card cardbg cardsize">
                        <div class="card-body card-content card-typography card-design">
                            <div class="card-typography animated animatedFadeInUp fadeInUp">
                              <h2 class="gradient-text-gold ">
                                  AMD POWER GOLD
                              </h2> 
                              <h3 class="glow ">
                                  $2,666.66
                              </h3>
                              <div class="list-main">
                                <h5 class="lead ">Build Specifications:</h5>
                                <ul class="list-main" style="opacity: 90%;">  
                                    <li class="">
                                        COUGAR Duoface RGB Mid-Tower Case - Black
                                    </li>
                                    <li class="">
                                        DeepCool LT520 Liquid CPU Cooler - Black
                                    </li>
                                    <li class="">
                                        MSI MAG B650 Tomahawk WiFi DDR5 ATX Motherboard
                                    </li>
                                    <li class="">
                                        AMD Ryzen 7 7800X3D Processor
                                    </li>
                                    <li class="">
                                        KINGSTON Fury Beast RGB 32GB (2x16GB) DDR5 6000MHz C36 RAM - Black
                                    </li>
                                    <li class="">
                                        KINGSTON SKC3000d 2TB Gen4 NVMe SSD
                                    </li>
                                    <li class="">
                                        MSI Ventus 3X GeForce RTX 4080 Super OC 16GB
                                    </li>
                                    <li class="">
                                        be quiet! PURE POWER 12 850W 80+ Gold Fully-Modular ATX 3.0 Power Supply
                                    </li>
                                    <li class="">
                                        Windows 11
                                    </li>
                                </ul>
                              </div>
                            </div>
                          <a href="/form-preorder" class="btn btn-primary button-blue">Go Pre-order Now!</a>
                        </div>
                    </div>
                    <div class="card cardbg cardsize">
                        <div class="card-body card-content card-typography card-design">
                            <div class="card-typography animated animatedFadeInUp fadeInUp">
                              <h2 class="gradient-text-prestige-low display-1 ">
                                  AMD POWER PRESTIGE
                              </h2>
                              <h3 class="glow ">
                                  $2,888.88
                              </h3>
                              <div class="list-main">
                                <h5 class="lead ">Build Specifications:</h5>
                                <ul class="list-main" style="opacity: 90%;">  
                                    <li class="">
                                        COUGAR Duoface RGB Mid-Tower Case - Black
                                    </li>
                                    <li class="">
                                        DeepCool LT520 Liquid CPU Cooler - Black
                                    </li>
                                    <li class="">
                                        MSI MAG B650 Tomahawk WiFi DDR5 ATX Motherboard
                                    </li>
                                    <li class="">
                                        AMD Ryzen 7 7800X3D Processor
                                    </li>
                                    <li class="">
                                        KINGSTON Fury Beast RGB 32GB (2x16GB) DDR5 6000MHz C36 RAM - Black
                                    </li>
                                    <li class="">
                                        KINGSTON SKC3000d 2TB Gen4 NVMe SSD
                                    </li>
                                    <li class="">
                                        MSI Ventus 3X GeForce RTX 4080 Super OC 16GB
                                    </li>
                                    <li class="">
                                        be quiet! PURE POWER 12 850W 80+ Gold Fully-Modular ATX 3.0 Power Supply
                                    </li>
                                    <li class="">
                                        Windows 11
                                    </li>
                                </ul>
                              </div>
                            </div>
                          <a href="/form-preorder" class="btn btn-primary button-blue">Go Pre-order Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="flexing-col trueneutral white-content4 darkbg">
              <div class="white-subcontent4-2">
                <div class="mx- flexing-row bottomtitle-responsive350" style="justify-content: space-between;">
                    <h1 class="gradient-text-blue" style=" letter-spacing: 10px;">
                        LERO
                    </h1>
                    <div style="display: flex; align-items: center; gap: 1rem;  ">
                        <img style="width: 25px; " src="icon\x-social-media-black-icon 1.svg" alt="">
                        <img style="width: 25px; " src="icon\black-instagram-icon 1.svg" alt="">
                        <img style="width: 25px; " src="icon\youtube-icon 1.svg" alt="">
                    </div>
                </div>
                <p class="lead bottom-text" style="font-weight: 400;">
                    At LERO, we use the highest quality parts backed by manufacturer warranties to ensure the longevity of each custom build. We are the go to company for custom PCs that fit your need.<br><br>
                    Location: <span class="gradient-text-blue" style="font-weight: 600;">762 Park Ave, Youngsville, NC 27596</span><br><br>
                    Support Contact:  <span class="gradient-text-blue" style="font-weight: 600;">252-LERO4U</span>
                </p>
              </div>
        </div>
      </div>
      <div class="footer">
        <div class="footer-subcontent">
            <div class="images">
                <img src="icon/Group 33.svg" alt="">
                <img src="icon/Group 34.svg" alt="">
                <img src="icon/Group 35.svg" alt="">
                <img src="icon/Group 36.svg" alt="">
                <img src="icon/Group 37.svg" alt="">
                <img src="icon/Group 38.svg" alt="">
                <img src="icon/Group 39.svg" alt="">
            </div>
            <p class="lead">
                © Start, 2022. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>