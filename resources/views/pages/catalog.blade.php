<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Documentasd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
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
      <div class="catalog">
        <section class="darkbg">
            <div class="container-fluid container-general main">
                <h1 class="display-5 text-center animated animatedFadeInUp fadeInUp" style="color: #f9faff;">
                    <span class="gradient-text-blue">
                        READY TO SHIP 
                    </span>
                    GAMING PC
                </h1>
                <p class="lead text-center animated animatedFadeInUp fadeInUp" >
                    Eager to dive into the gaming universe without the wait? PowerGPU offers an exclusive selection of ready to ship prebuilt gaming PCs, delivering the unmatched performance you’ve come to expect from our custom builds, but without the build time. Our expedited shipping ensures these systems are on their way to you either the same day or the next business day. With fresh stock added every Friday, your next gaming adventure is just a click away. Stay ahead of the game and check back regularly for the latest in high-powered, ready to ship gaming machines.   
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
                        <img src="Image\catalogImage\catalog-pc-red.png" class="card-img-top" alt="...">
                        <div class="card-body card-content card-typography card-design">
                            <h2 class="display-5 card-title gradient-text-red">Low Specifications PC</h2>
                            <p class="lead card-text">Your gateway to the digital world. Simple, affordable, and perfect for everyday tasks.</p>
                            @auth
                                <a href="/pc-branch-low" class="btn btn-primary button-red">Go Pre-order Now!</a>
                            @else
                                <a href="/login" class="btn btn-primary button-red">Log in to Pre-order</a>
                            @endauth
                        </div>
                    </div>
                    <div class="card cardbg cardsize">
                        <img src="Image\catalogImage\catalog-pc-blue.png" class="card-img-top" alt="...">
                        <div class="card-body card-content card-typography card-design">
                            <h2 class="display-5 card-title gradient-text-blue">Medium Specifications PC</h2>
                            <p class="lead card-text">The jack-of-all-trades. Widely versatile, reliable, and ready to handle anything from gaming to content creation.</p>
                            @auth
                                <a href="/pc-branch-medium" class="btn btn-primary button-blue">Go Pre-order Now!</a>
                            @else
                                <a href="/login" class="btn btn-primary button-blue">Log in to Pre-order</a>
                            @endauth
                        </div>
                    </div>
                    <div class="card cardbg cardsize">
                        <img src="Image\catalogImage\catalog-pc-green.png" class="card-img-top" alt="...">
                        <div class="card-body card-content card-typography card-design">
                            <h2 class="display-5 card-title gradient-text-green">High Specifications PC</h2>
                            <p class="lead card-text">The ultimate powerhouse. Unleash your creativity and experience gaming at its finest with this top-of-the-line machine.</p>
                            @auth
                                <a href="/pc-branch-high" class="btn btn-primary button-green">Go Pre-order Now!</a>
                            @else
                                <a href="/login" class="btn btn-primary button-green">Log in to Pre-order</a>
                            @endauth
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