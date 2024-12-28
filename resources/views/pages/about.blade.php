<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentasd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
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
                        <a class="nav-link" href="/contact" style="color: #000000;">Contact</a>
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
      <div class="about">
        <section class="main-bg ">
            <div class="masking">

            </div>
            <div class="container-fluid container-general main animated animatedFadeInUp fadeInUp">
                <div>
                    <h1 class="display-5 text-center">
                        About
                    </h1>
                    <div class="underline center">
                        
                    </div>
                </div>
                <p class="lead text-center">
                    We strive to offer every individual customer the best possible PC experience from start to finish no matter what PC they have purchased from us.
                </p>
            </div>

        </section>

        <section class="intro-bg">
            <div class="masking">

            </div>
            <div class="container-fluid container-general intro fade-in-right">
                <div>
                    <h1 class="display-5">
                        WHO WE ARE
                    </h1>
                    <div class="underline">
                        
                    </div>
                </div>
                <div class="intro-p-container">
                    <p class="lead">
                        ORIGIN PC is a PC company that builds award winning custom PCs for gamers, enthusiasts, and professionals.
                    </p>
                </div>
            </div>
        </section>

        <section class="darkbg">
            <div class="slanted-rect wow slideInRectRight" data-wow-offset="600" style="visibility: visible;animation-name: slideInRectRightXl;"></div>
            <div class="masking">

            </div>
            <div class="container-fluid container-general mission">
                <picture>
                    <img src="Image\aboutImage\mission-pcwhite-.png" alt="">
                </picture>
                <div class="mission-content animated animatedFadeInUp fadeInUp">
                    <div>
                        <h1 class="display-5">
                            MISSION
                        </h1>
                        <div class="underline">
                            
                        </div>
                    </div>
                    <p class="lead">
                        Our mission is to create the absolute best custom PCs for every individual’s specific wants and needs. Whether you want the most realistic and immersive gaming experience or ultra-fast workstation performance, every ORIGIN PC is up to the task.
                    </p>
                </div>
            </div>
        </section>

        <section class="legacy-bg">
            <div class="masking">

            </div>
            <div class="container-fluid container-general legacy fade-in-right">
                <div>
                    <h1 class="display-5">
                        LEGACY
                    </h1>
                    <div class="underline">
                        
                    </div>
                </div>
                <p class="lead">
                    Founded in 2009, the team sought out to continue building custom high-performance PCs and providing world-class support. With several years of experience in PC building, support, and service, ORIGIN PC is comprised of industry veterans that have helped grow the professionally-built PC market.
                </p>
            </div>
        </section>

        <section class="darkbg">
            <div class="slanted-rect wow slideInRectRight" data-wow-offset="600" style="visibility: visible;animation-name: slideInRectRightXl;"></div>
            <div class="masking">

            </div>
            <div class="container-fluid container-general forward">
                <picture>
                    <img src="Image\aboutImage\forward-pc.png" alt="">
                </picture>
                <div class="forward-content animated animatedFadeInUp fadeInUp">
                    <div>
                        <h1 class="display-5">
                            Looking Forward
                        </h1>
                        <div class="underline">
                            
                        </div>
                    </div>
                    <p class="lead">
                        In 2019, ORIGIN PC was acquired by CORSAIR, combining expertise in PC building and expansive PC hardware to grow ORIGIN PC even more. With iCUE, Hydro X Series custom cooling, unique system designs, and internal components, CORSAIR and ORIGIN PC will continue to collaborate and bring a greater PC experience to the world.
                    </p>
                </div>
            </div>
        </section>

        <section class="darkbg">
            <div class="masking">

            </div>
            <div class="container-fluid container-general pillars ">
                <div class="pillars-title">
                    <h1 class="pillars-title-size display-5 text-center">
                        PILLARS
                    </h1>
                    <div class="underline">
                        
                    </div>
                </div>

                <div class="container-fluid cardlist">
                    <div class="card cardbg" style="">
                        <img src="Image\aboutImage\card1.jpg" class="card-img-top" alt="...">
                        <div class="card-body card-content card-typography animated animatedFadeInUp fadeInUp">
                          <h2 class="display-5 card-title gradient-text">Performance</h2>
                          <p class="lead card-text">We use only superior components paired with award-winning integration and offer professional overclocking to support the most demanding PC usage.</p>
                          <ul>
                            <li>
                                <p class="list-p">
                                    Once built, specialists integrate the PC and run rigorous tests ensuring the PC is ready for anything.
                                </p>
                            </li>
                            <li>
                                <p class="list-p">
                                    Once built, specialists integrate the PC and run rigorous tests ensuring the PC is ready for anything.
                                </p>
                            </li>
                            <li>
                                <p class="list-p">
                                    ORIGIN PC is well-known for professional overclocking CPU and GPUs to find the exact sweet spot of the most performance while maintaining proper temperatures and guaranteeing 100% stability.
                                </p>
                            </li>
                            <li>
                                <p class="list-p">
                                    The performance our machines can deliver will give you an edge on the competition.
                                </p>
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div class="card cardbg" style="">
                        <img src="Image\aboutImage\card1.jpg" class="card-img-top" alt="...">
                        <div class="card-body card-content card-typography animated animatedFadeInUp fadeInUp">
                          <h2 class="display-5 card-title gradient-text">Support</h2>
                          <p class="lead card-text">Contact our lifetime US-based support team.</p>
                          <ul>
                            <li>
                                <p class="list-p">
                                    All of our systems come with an industry-leading FREE lifetime support based in the United States.
                                </p>
                            </li>
                            <li>
                                <p class="list-p">
                                    Our support team is comprised of gamers and PC enthusiasts happy to take the time to answer your questions at any time
                                </p>
                            </li>
                            <li>
                                <p class="list-p">
                                    We also offer free lifetime labor on upgrades so you can send your system back into us at any time and we will perform the labor for free.
                                </p>
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div class="card cardbg" style="">
                        <img src="Image\aboutImage\card1.jpg" class="card-img-top" alt="...">
                        <div class="card-body card-content card-typography animated animatedFadeInUp fadeInUp">
                          <h2 class="display-5 card-title gradient-text">Customization</h2>
                          <p class="lead card-text">Every PC we build is custom, hand-built to order by request.</p>
                          <ul>
                            <li>
                                <p class="list-p">
                                    We offer customization inside and out including HD UV printing, different color options, laser etching, or detailed airbrushing.
                                </p>
                            </li>
                            <li>
                                <p class="list-p">
                                    Optional RGB lighting can be to your system via certain desktop designs, LED strips, or RGB fans.
                                </p>
                            </li>
                            <li>
                                <p class="list-p">
                                    Every PC is a one-of-a-kind work of art when it leaves our facility.
                                </p>
                            </li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
</body>
</html>