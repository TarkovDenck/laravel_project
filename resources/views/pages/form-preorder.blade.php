<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentasd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/form-preorder.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- Mengimpor CSS SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

      
</head>
<body>
      <!-- Mengimpor JS SweetAlert2 -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
      <!-- Mengimpor file JavaScript terpisah -->
      <script src=""></script>

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
              <a class="nav-link" href="{{ url('home') }}" style="color: #000000;">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('catalog') }}" style="color: #000000;">Shop</a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="{{ url('about') }}" style="color: #000000;">About us</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('contact') }}" style="color: #000000;">Contact</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('comment') }}" style="color: #000000;">Comment</a>
          </li>>
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
                <h1 class="display-5 text-center animated animatedFadeInUp fadeInUp" style="color: #f9faff;">
                    <span class="gradient-text-blue">
                        READY TO SHIP 
                    </span>
                    GAMING PC
                </h1>
                <p class="lead text-center animated animatedFadeInUp fadeInUp" >
                  Your order is almost ready for you, so we request that you provide the required information to complete the ordering process promptly and finalize your order efficiently. We will ensure that everything will be carried out accurately and to your satisfaction.
                </p>
            </div>
        </section>

        <section class="darkbg">
          <div class="container-fluid container-general pillars">
              <div class="container-fluid cardlist">
                  <div class="card cardbg cardsize">
                      <div class="card-body card-content card-typography card-design">
                        <div class="formdesign">
                          <form class="row g-3">
                            <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Email</label>
                              <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-6">
                              <label for="inputPassword4" class="form-label">Password</label>
                              <input type="password" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-12">
                              <label for="inputAddress" class="form-label">Address</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="col-md-6">
                              <label for="inputCity" class="form-label">City</label>
                              <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="col-md-4">
                              <label for="inputState" class="form-label">State</label>
                              <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label for="inputZip" class="form-label">Pos Code</label>
                              <input type="text" class="form-control" id="inputZip">
                            </div>
                            <div></div>
                            <div class="underline">
                            
                            </div>
                              <div  class="card-typography">
                                <h2 class="gradient-text-silver display-1 fade-in-right">
                                    AMD POWER SILVER
                                </h2>
                                <div class="list-main">
                                  <h5 class="lead fade-in-right">Build Specifications:</h5>
                                  <ul class="list-main" style="opacity: 90%;">  
                                      <li class="fade-in-right">
                                          COUGAR Duoface RGB Mid-Tower Case - Black
                                      </li>
                                      <li class="fade-in-right">
                                          DeepCool LT520 Liquid CPU Cooler - Black
                                      </li>
                                      <li class="fade-in-right">
                                          MSI MAG B650 Tomahawk WiFi DDR5 ATX Motherboard
                                      </li>
                                      <li class="fade-in-right">
                                          AMD Ryzen 7 7800X3D Processor
                                      </li>
                                      <li class="fade-in-right">
                                          KINGSTON Fury Beast RGB 32GB (2x16GB) DDR5 6000MHz C36 RAM - Black
                                      </li>
                                      <li class="fade-in-right">
                                          KINGSTON SKC3000d 2TB Gen4 NVMe SSD
                                      </li>
                                      <li class="fade-in-right">
                                          MSI Ventus 3X GeForce RTX 4080 Super OC 16GB
                                      </li>
                                      <li class="fade-in-right">
                                          be quiet! PURE POWER 12 850W 80+ Gold Fully-Modular ATX 3.0 Power Supply
                                      </li>
                                      <li class="fade-in-right">
                                          Windows 11
                                      </li>
                                  </ul>
                                  <div class="card-typography">
                                    <h3 class="glow fade-in-right">
                                      Total Price: $1,444.44
                                  </h3>
                                  </div>  
                                </div>
                              </div>  
                              <div class="underline">
                            
                              </div>  
                              <div>
                                <label for="shippingMethod" class="form-label">Choose Your Shipping Option</label>
                                <select class="form-select" id="paymentMethod"  aria-label="Default select example">
                                  <option value="1">Regular (Estimation of 1 Month)</option>
                                  <option value="2">Express (Estimation of 1 Week)</option>
                                </select>
                              </div>
                              <div></div>
                              <div>
                                <label for="paymentMethod" class="form-label">Choose Your Payment Method</label>
                                <select class="form-select" id="paymentMethod"  aria-label="Default select example">
                                  <option value="1">Cash on Delivery</option>
                                  <option value="2">Debit Card</option>
                                  <option value="3">Credit Card</option>
                                </select>
                              </div>
                              <div class="col-12">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="agreeTerms">
                                  <label class="form-check-label" for="agreeTerms">
                                    I Agree for All Terms and Conditions
                                  </label>
                                </div>
                              </div>                        
                              <div class="col-12">
                                <button type="submit" class="btn btn-primary">Finish Payment</button>
                              </div> 
                          </form>
                        </div>
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