<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/chat/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">
                            Help Desk
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="messaging">
                            <div class="inbox_msg">
                                <div class="mesgs">
                                    <div class="msg_history">
                                        @forelse($messages as $message)
                                        <div class="incoming_msg mt-4">
                                            <div class="incoming_msg_img">
                                                <img src="{{ asset('storage/profile/'.$message->user->image) }}"
                                                    alt="{{ $message->user->name }}">

                                            </div>
                                            <div class="received_msg">
                                                <span>{{ $message->user->name }}</span>
                                                <div class="received_withd_msg">
                                                    <p>{{ $message->message }}</p>
                                                    <span class="time_date">
                                                        {{ $message->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>


                                        @empty
                                        <span>No data found!!!</span>
                                        @endforelse

                                    </div>
                                    <div class="type_msg">
                                        <form action="{{ route('chat.store') }}" method="POST">
                                            @csrf
                                            <div class="input_msg_write">
                                                <input name="message" type="text" class="write_msg"
                                                    placeholder="Type a message" />
                                                <button class="msg_send_btn" type="submit"><i class="far fa-paper-plane"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>
</body>

</html>