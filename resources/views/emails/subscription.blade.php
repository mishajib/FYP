<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscription Email</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-5">Thanks for Subscribe</h1>

            <div class="row mb-5">

                @forelse($posts as $post)
                    <div class="col-md-3">
                        <div class="card">
                            <img
                                src="{{ asset('storage/post/' . $post->image)}}"
                                class="card-img-top w-25 img-responsive" alt="{{
                                $post->title
                                }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">
                                    {!! Str::words($post->body, 25) !!}
                                </p>
                                <p class="text-center">
                                    <a href="{{ route('frontend.post.details', $post->slug) }}"
                                       class="btn
                            btn-primary">
                                        View Post
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <span class="text-danger text-center h3">
                        No data found!
                    </span>
                @endforelse

            </div>

            <b>Thanks,</b> <br>
            {{ config('app.name') }}
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
