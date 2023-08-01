<html>
    <head>
        @include('master.css')
        <style type="text/css">
            #show_bg_2 {
                background-image:
                linear-gradient(to right, rgba(246, 211, 101, 0.2), rgba(243, 99, 59, 0.5)),
                url('{{ asset("img/properties/login.jpg") }}');
                width: 100%;
                height: 100%;
                background-size: cover;
                color: white;
                padding: 20px;
            }

            #show_bg_2_mobile {
                background-image:
                linear-gradient(to right, rgba(246, 211, 101, 0.2), rgba(243, 99, 59, 0.5)),
                url('{{ asset("images/login.jpg") }}');
                width: 100%;
                height: 300px;
                background-size:cover;
                color:white;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="d-none d-lg-block">
            <div class="row h-100">
                <div class="col-lg-4">
                    {{-- <img src="{{ asset('images/login.jpg') }}" class="w-100 h-100"> --}}
                    <div id="show_bg_2" class="d-flex justify-content-center align-items-center">
                        <div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span style="font-size:50px;">Great Things</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span style="font-size:50px;">Never Come</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span style="font-size:50px;">From Comfort Zones</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="container">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <span style="font-weight:700; font-size:50px;">Sign <span class="deep-orange-text">In</span></span>
                                </div>
                            </div>
                            <div class="row mt-5 d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <div class="md-form md-outline input-with-post-icon m-0">
                                        <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Email" style="height:50px;">
                                        <i class="fas fa-envelope input-prefix"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <div class="md-form md-outline input-with-post-icon m-0" style="height:50px;">
                                        <input type="password" class="form-control rounded-0" name="password" id="password" style="height:50px" placeholder="Password">
                                        <i class="fas fa-lock input-prefix"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5 d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-deep-orange btn-block rounded-pill z-depth-0">
                                        Sign In
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('redirect_google') }}">Google</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block d-lg-none d-flex flex-column h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <span style="font-size:30px; font-weight:600">Sign <span class="deep-orange-text">In</span></span>
                    </div>
                </div>
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="md-form md-outline input-with-post-icon mt-0 mb-0">
                                <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="email">
                                <i class="fas fa-envelope input-prefix"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="md-form md-outline input-with-post-icon mt-0 mb-0">
                                <input type="password" class="form-control rounded-0" name="password" id="password" placeholder="password">
                                <i class="fas fa-lock input-prefix"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <button type="submit" class="btn btn-md text-white deep-orange rounded-0 btn-block z-depth-0">
                                Sign In
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mt-auto">
                <div class="col-12">
                    <div id="show_bg_2_mobile" class="d-flex align-items-center justify-content-center">
                        <div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <span style="font-size:30px;">Great Things</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <span style="font-size:30px;">Never Come</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <span style="font-size:30px;">From Comfort Zones</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('master.js')
    </body>
</html>
