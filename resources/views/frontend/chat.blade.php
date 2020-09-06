@extends('layouts.frontend.app')

@section("title", 'Help Desk (Chat Option)')

@section('content')
    @guest
        <p class="text-center">You have to login first to chat. <a
                href="{{  route('login') }}">Login</a></p>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-5">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title text-center">
                                HELP DESK
                            </h1>
                        </div>
                        <div class="card-body">
                            <div class="messaging">
                                <div class="inbox_msg">
                                    <div class="mesgs">
                                        <div class="msg_history">
                                            @forelse($messages as $message)
                                                <div class="incoming_msg mt-4">
                                                    <div
                                                        class="incoming_msg_img">
                                                        <img
                                                            src="{{ asset('storage/profile/'.@$message->user->image) }}"
                                                            alt="{{ @$message->user->name }}">

                                                    </div>
                                                    <div class="received_msg">
                                                        <span>{{ @$message->user->name }}</span>
                                                        <div
                                                            class="received_withd_msg">
                                                            <p>{{ $message->message }}</p>
                                                            <span
                                                                class="time_date">
                                                        {{ $message->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>


                                            @empty
                                                <span>No chat yet. be a
                                                    first!</span>
                                            @endforelse

                                        </div>
                                        <div class="type_msg">
                                            <form
                                                action="{{ route('chat.store') }}"
                                                method="POST">
                                                @csrf
                                                <div class="input_msg_write">
                                                    <input name="message"
                                                           type="text"
                                                           class="write_msg"
                                                           placeholder="Type a message"/>
                                                    <button class="msg_send_btn"
                                                            type="submit"><i
                                                            class="fa fa-paper-plane"
                                                            aria-hidden="true"></i>
                                                    </button>
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
    @endguest
@endsection
