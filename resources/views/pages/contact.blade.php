<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentasd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <!-- Mengimpor CSS SweetAlert2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <script>
            // Define the global object
            window.sharedData = {};
        </script>
</head>
<body>
      <!-- Mengimpor JS SweetAlert2 -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
      <!-- Mengimpor file JavaScript terpisah -->
      <script >
         @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: true
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}', // Menampilkan error pertama
                showConfirmButton: true
            });
        @endif
      </script>

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
      <div class="catalog">
        <section class="darkbg">
            <div class="container-fluid container-general main">
                <h1 class="display-5 text-center animated animatedFadeInUp fadeInUp" style="color: #f9faff;">
                    <span class="gradient-text-blue">
                        CONTACT 
                    </span>
                    US
                </h1>
                <p class="lead text-center animated animatedFadeInUp fadeInUp" >
                  We're always pleased to connect! If you have a question about our products or services, require assistance with an order, have a proposal for improvement, or simply want to say hi, we'd love to hear from you. Please complete the contact form with as much detail as possible, and a member of our staff will respond within 24 hours. We appreciate your patience and are looking forward to supporting you.
                </p>
            </div>
        </section>

        <section class="darkbg">
          <div class="container-fluid container-general pillars">
              <div class="container-fluid cardlist">
                  <div class="card cardbg cardsize">
                      <div class="card-body card-content card-typography card-design">
                        <div class="formdesign">
                          <form action="{{ route('contact.store') }}" method="POST" class="row g-3" id="contact-form">
                            @csrf
                            <div class="mb-3">
                                <label for="emailForm" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="emailForm" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="messageForm" class="form-label">Your Message</label>
                                <textarea class="form-control" id="messageForm" name="message" rows="3" placeholder="Comment" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Go contact us</button>
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
  <script src="javascript/Contact.js"></script>
</body>
</html>