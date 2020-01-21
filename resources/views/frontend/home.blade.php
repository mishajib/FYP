@extends("layouts.frontend.app")

@section("title", "Home")

@section("content")
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- post -->
                <div class="col-md-6">
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-1.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="col-md-6">
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-2.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="{{ route('category') }}">Jquery</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Ask HN: Does Anybody Still Use JQuery?</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Recent Posts</h2>
                    </div>
                </div>

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-3.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-1" href="{{ route('category') }}">Web Design</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-4.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-5.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="{{ route('category') }}">Jquery</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Ask HN: Does Anybody Still Use JQuery?</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->

                <div class="clearfix visible-md visible-lg"></div>

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-6.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-1.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-4" href="{{ route('category') }}">Css</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">CSS Float: A Tutorial</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-2.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-1" href="{{ route('category') }}">Web Design</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <!-- post -->
                        <div class="col-md-12">
                            <div class="post post-thumb">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-2.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-3" href="{{ route('category') }}">Jquery</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">Ask HN: Does Anybody Still Use JQuery?</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-1.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-4" href="{{ route('category') }}">Css</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">CSS Float: A Tutorial</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="b{{ route('category') }}"><img src="{{ asset('assets/frontend/img/post-2.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-1" href="{{ route('category') }}">Web Design</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="b{{ route('category') }}">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <div class="clearfix visible-md visible-lg"></div>

                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-4.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-5.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-3" href="{{ route('category') }}">Jquery</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">Ask HN: Does Anybody Still Use JQuery?</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <div class="clearfix visible-md visible-lg"></div>

                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-3.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-1" href="{{ route('category') }}">Web Design</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-4.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Most Read</h2>
                        </div>

                        <div class="post post-widget">
                            <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/widget-1.jpg') }}" alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="{{ route('post') }}">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
                            </div>
                        </div>

                        <div class="post post-widget">
                            <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/widget-2.jpg') }}" alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="{{ route('post') }}">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
                            </div>
                        </div>

                        <div class="post post-widget">
                            <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/widget-3.jpg') }}" alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="{{ route('post') }}">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
                            </div>
                        </div>

                        <div class="post post-widget">
                            <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/widget-4.jpg') }}" alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="{{ route('post') }}">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post widget -->

                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Featured Posts</h2>
                        </div>
                        <div class="post post-thumb">
                            <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-2.jpg') }}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-3" href="{{ route('category') }}">Jquery</a>
                                    <span class="post-date">March 27, 2018</span>
                                </div>
                                <h3 class="post-title"><a href="{{ route('post') }}">Ask HN: Does Anybody Still Use JQuery?</a></h3>
                            </div>
                        </div>

                        <div class="post post-thumb">
                            <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-1.jpg') }}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                    <span class="post-date">March 27, 2018</span>
                                </div>
                                <h3 class="post-title"><a href="{{ route('post') }}">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post widget -->

                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{ asset('assets/frontend/img/ad-1.jpg') }}" alt="">
                        </a>
                    </div>
                    <!-- /ad -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Featured Posts</h2>
                    </div>
                </div>

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-4.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-5.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="{{ route('category') }}">Jquery</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Ask HN: Does Anybody Still Use JQuery?</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="col-md-4">
                    <div class="post">
                        <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-3.jpg') }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-1" href="{{ route('category') }}">Web Design</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('post') }}">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>Most Read</h2>
                            </div>
                        </div>
                        <!-- post -->
                        <div class="col-md-12">
                            <div class="post post-row">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-4.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-12">
                            <div class="post post-row">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-6.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-2" href="{{ route('category') }}">JavaScript</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-12">
                            <div class="post post-row">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-1.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-4" href="{{ route('category') }}">Css</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">CSS Float: A Tutorial</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-12">
                            <div class="post post-row">
                                <a class="post-img" href="{{ route('post') }}"><img src="{{ asset('assets/frontend/img/post-2.jpg') }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-3" href="{{ route('category') }}">Jquery</a>
                                        <span class="post-date">March 27, 2018</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('post') }}">Ask HN: Does Anybody Still Use JQuery?</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <div class="col-md-12">
                            <div class="section-row">
                                <button class="primary-button center-block">Load More</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="{{ route('home') }}" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{ asset('assets/frontend/img/ad-1.jpg') }}" alt="">
                        </a>
                    </div>
                    <!-- /ad -->

                    <!-- catagories -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2>Catagories</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                <li><a href="{{ route('category') }}" class="cat-1">Web Design<span>340</span></a></li>
                                <li><a href="{{ route('category') }}" class="cat-2">JavaScript<span>74</span></a></li>
                                <li><a href="{{ route('category') }}" class="cat-4">JQuery<span>41</span></a></li>
                                <li><a href="{{ route('category') }}" class="cat-3">CSS<span>35</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /catagories -->

                    <!-- tags -->
                    <div class="aside-widget">
                        <div class="tags-widget">
                            <ul>
                                <li><a href="{{ route('category') }}">Chrome</a></li>
                                <li><a href="{{ route('category') }}">CSS</a></li>
                                <li><a href="{{ route('category') }}">Tutorial</a></li>
                                <li><a href="{{ route('category') }}">Backend</a></li>
                                <li><a href="{{ route('category') }}">JQuery</a></li>
                                <li><a href="{{ route('category') }}">Design</a></li>
                                <li><a href="{{ route('category') }}">Development</a></li>
                                <li><a href="{{ route('category') }}">JavaScript</a></li>
                                <li><a href="{{ route('category') }}">Website</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /tags -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@stop
