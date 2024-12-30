
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentasd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container-fluid warnaijo">
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
                  <li class="nav-item">
                    <a class="nav-link" href="/home" style="color: #000000;">Home <span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/catalog" style="color: #000000;">Shop</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="/about" style="color: #000000;">About us</a>
                    <div class="wow"></div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/contact-page" style="color: #000000;">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/comment" style="color: #000000;">Comments</a>
                  </li>
                </ul>
                <!-- Tombol Login/Logout -->
                @guest
                <!-- Tampilkan jika belum login -->
                <a href="/login" class="btn btn-primary">Log in</a>
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
        <div class="container-fluid content flexing-row mainGreen ">
            <picture class="responsive-herobg">
                <img src="Image\super-rts-systems-responsive.jpg" alt="">
            </picture>
            <div class="flexing-col content-main fade-in-right mainGreen-content">
                <h1 class="h1-1">
                    WELCOME
                </h1>
                <h1 class="h1-2">
                    Experience The New Era of Technology 
                </h1>
                <p class="opacity-75">
                    LERO Electronics constantly reinvents the future. We explore the unknown to discover technologies to help people all over the world lead happier, healthier lives.</p>
                <button type="button" class="btn btn-light button" style="background: -webkit-linear-gradient(0deg, #151ce8, #3fcbfa); border: #376EFF; border-radius: 0;">
                    <h4 style="color: #ffffff;">
                        Explore
                    </h4>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid warnaputih flexing-col maincontent2">
        <div class="flexing-col trueneutral white-content1 white-content1-extrapadding">
            <div class="flexing-col trueneutral white-subcontent1">
                <h1 class="h1-1" style="">
                    THE BEST PREBUILT GAMING PCS
                </h1>
        </div>
        <div class="flexing-col trueneutral white-content1">
                <div class="flexing-row white-content1-2">
                    <div class="flexing-col trueneutral white-sidecontent2 animated animatedFadeInUp fadeInUp">
                        <img src="Image/iconTruck.png" alt="">
                        <p class="lead">
                            Ships in 1-3<br>days
                        </p>
                    </div>
                    <div class="flexing-col trueneutral white-sidecontent2 animated animatedFadeInUp fadeInUp">
                        <img src="Image/iconBox.png" alt="">
                        <p class="lead">
                            Free Ground Shipping
                        </p>
                    </div>
                    <div class="flexing-col trueneutral white-sidecontent2 animated animatedFadeInUp fadeInUp">
                        <img src="Image/IconFinancial.png" alt="">
                        <p class="lead">
                        Financing Available
                        </p>
                    </div>
                    <div class="flexing-col trueneutral white-sidecontent2 animated animatedFadeInUp fadeInUp">
                        <img src="Image/IconHeadset.png" alt="">
                        <p class="lead">
                        Lifetime based support
                        </p>
                    </div>  
                </div>
        </div>
    </div>

        <div class="flexing-row trueneutral white-content2 reason-content">
            <div class="flexing-row image">
                <img class="shadow-image reason-image" src="Image/super-gpu.jpg" alt="" style="">
            </div>
            <div class="flexing-col white-subcontent2 gaping-subcontent2">
                <div class="flexing-col white-subcontent2">
                    <h1>
                        Why Buy A Prebuilt Gaming PC? 
                    </h1>
                    <p class="opacity-75">
                        Our PC Ready-To-Ship (RTS) systems are exceptional prebuilt gaming PCs. Enjoy the convenience of allowing our professional assembly team to save you the stress of building a PC from scratch. Choose from a lineup of high-performance systems that ship in only 1-3 business days!
                    </p>
                </div>
                <div class="flexing-col white-subcontent2">
                    <h1>
                        Unrivaled Performance 
                    </h1>
                    <p class="opacity-75">
                        Our PC Prebuilt, Ready-To-Ship (RTS) Systems offer immediate access to high-performance gaming. Upgrade your setup and gaming experience with the latest, premium components.
                    </p>
                </div>
                <div class="flexing-col white-subcontent2">
                    <h1>
                        Built by Experts 
                    </h1>
                    <p class="opacity-75">
                        Game with peace of mind - the seasoned professionals at ORIGIN PC see your gaming desktop built from start to finish and ensure top-tier cable management.
                    </p>
                </div>
            
            </div>
        </div>

        <div class="container-fluid warnaputih flexing-col maincontent2-padding">
            <div class="flexing-col trueneutral white-content1">
                    <div class="flexing-row white-content1-3 adminreview">
                        <div class="flexing-col trueneutral white-sidecontent3 animated animatedFadeInUp fadeInUp">
                            <h5 class="display-6">
                                "...built for exceptional 4k gaming with clean looks"
                            </h5>
                            <p class="lead" style="color: #376EFF; font-weight: 600;">     
                                - Tyler Colp, LERO
                            </p>
                        </div>
                        <div class="flexing-col trueneutral white-sidecontent3 animated animatedFadeInUp fadeInUp">
                            <h5 class="display-6" >
                                "The Neuron earns our Editors' Choice for providing excellent quality and performance in a high-end mid-tower desktop that can fill a dual gaming and workstation role."
                            </h5>
                            <p class="lead" style="color: #376EFF; font-weight: 600;">
                                - Charles Jefferies, Reviewer
                            </p>
                        </div>
                        <div class="flexing-col trueneutral white-sidecontent3 animated animatedFadeInUp fadeInUp">
                            <h5 class="display-6">
                                "Fierce Performance.
                                Top-notch hardware."
                            </h5>
                            <p class="lead" style="color: #376EFF; font-weight: 600;">
                                - Joe Shields, LERO
                            </p>
                        </div>
                    </div>
            </div>
        </div>

        <div class="container-fluid warnaputih flexing-col  "></div>
            <div class="flexing-col trueneutral white-content1 dark reviews">
                    <h1>
                        Customer Reviews
                    </h1>                                               
                    <div class="flexing-row white-content1-4" style="align-items: start;">
                        <div class="flexing-col trueneutral white-sidecontent3 white-sidecontent3-newer">
                            <div class="flexing-row star" style="gap: 1rem;">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                            </div>
                            <h5 class="display-6">
                                "The staff are very helpful, friendly, and reply fast! Received my PC last week and man.. she's a beast. Built well, packaged well, the attention to detail is exactly the level I was hoping. Will 100% purchase future PCs from origin!"
                            </h5>
                            <p class="lead" style="color: #376EFF; font-weight: 600;">     
                                - curtisroof 2024-03-04
                            </p>
                        </div>
                        <div class="flexing-col trueneutral white-sidecontent3 white-sidecontent3-newer">
                            <div class="flexing-row star" style="gap: 1rem;">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                            </div>
                            <h5 class="display-6" >
                                "I have been very happy with my new Origin PC. Having built several of my PCs in the past and not wanting to build a new one I used Origin. Customer support was very good, they kept me informed of each step along the way.”
                            </h5>
                            <p class="lead" style="color: #376EFF; font-weight: 600;">
                                - edwillard 2023-10-27
                            </p>
                        </div>
                        <div class="flexing-col trueneutral white-sidecontent3 white-sidecontent3-newer">
                            <div class="flexing-row star" style="gap: 1rem;">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                                <img src="Image/star.png" alt="">
                            </div>
                            <h5 class="display-6">
                                "Over under an amazing experience, loved how hands on the staff is with updating you on your pc progress as well as their shipping standards, would definitely recommend them to friends and family looking to get their first or upgrade their current build."
                            </h5>
                            <p class="lead" style="color: #376EFF; font-weight: 600;">
                                - samuelcooper 2022-08-05


                            </p>
                        </div>
                    </div>
            </div>
        </div>

    <div class="container-fluid flexing-row trueneutral warnaijo footer">
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
            <p  class="lead">
                © Start, 2022. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>