@extends("layouts.frontend.app")

@section("title", "Contact Us")

@section("page-header")
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li>Contact</li>
                    </ul>
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
    </div>
@stop

@section("content")
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                    <div class="section-row">
                        <h3>Send A Message</h3>
                        <form action="{{ route('frontend.message.send') }}"
                              method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <span>Email</span>
                                        <input class="input" required
                                               type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <span>Subject</span>
                                        <input class="input" required
                                               type="text" name="subject">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" required
                                                  name="message"
                                                  placeholder="Message"></textarea>
                                    </div>
                                    <button type="submit"
                                            class="primary-button">Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@stop
