@extends('frontend.layouts.app')
@section('content')
@include('Chatify::layouts.headLinks')
<div class="inner-content">
    <div class="section-product-charter">
        <div class="container">
            <div class="row col-lg-9 mx-auto gx-5">
                <div class="col-12 col-md-4 gx-0 gx-md-3">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-12 col-md-8 gx-0 gx-md-2">
                    <div class="row">
                        <div class="col-12 col-md-7 gx-md-4">
                            <div class="messenger-listView">
                                {{-- Header and search bar --}}
                                <div class="m-header">
                                    <!-- <nav>
                                        <nav class="m-header-right">
                                            <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                                            <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                                        </nav>
                                    </nav> -->
                                    <input type="text" class="messenger-search" placeholder="Search" />
                                    <div class="messenger-listView-tabs">
                                        <!-- <a href="#" class="active-tab" data-view="users">
                                            <span class="far fa-user"></span> People</a> -->
                                        <!-- <a href="#" class="active-tab" data-view="groups">
                                            <span class="fas fa-users"></span> </a> -->
                                    </div>
                                </div>
                                <div class="m-body contacts-container">
                                    <div class="messenger-tab users-tab app-scroll" data-view="users" style="display: block;">
                                        <div class="favorites-section">
                                            <!-- <p class="messenger-title">Favorites</p> -->
                                            <div class="messenger-favorites app-scroll-thin"></div>
                                        </div>
                                        <!-- {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!} -->
                                        <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

                                    </div>

                                    <!-- {{-- ---------------- [ Group Tab ] ---------------- --}}
                                    <div class="messenger-tab groups-tab app-scroll" data-view="groups">
                                        {{-- items --}}
                                        <p style="text-align: center;color:grey;margin-top:30px">
                                            <a target="_blank" style="color:{{$messengerColor}};" href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
                                        </p>
                                    </div> -->

                                    {{-- ---------------- [ Search Tab ] ---------------- --}}
                                    <div class="messenger-tab search-tab app-scroll" data-view="search">
                                        {{-- items --}}
                                        <p class="messenger-title">Search</p>
                                        <div class="search-records">
                                            <p class="message-hint center-el"><span>Type to search..</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 gx-md-1">
                            <div class="messenger-messagingView">
                                {{-- header title [conversation name] amd buttons --}}
                                <div class="m-header m-header-messaging">
                                    <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                        {{-- header back button, avatar and user name --}}
                                        <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                            <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                            <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                            </div>
                                            <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                                        </div>
                                        {{-- header buttons --}}
                                        <!-- <nav class="m-header-right">
                                            <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                            <a href="/"><i class="fas fa-home"></i></a>
                                            <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                                        </nav> -->
                                    </nav>
                                </div>
                                {{-- Internet connection --}}
                                <div class="internet-connection">
                                    <span class="ic-connected">Connected</span>
                                    <span class="ic-connecting">Connecting...</span>
                                    <span class="ic-noInternet">No internet access</span>
                                </div>
                                {{-- Messaging area --}}
                                <div class="m-body messages-container app-scroll">
                                    <div class="messages">
                                        <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                                    </div>
                                    {{-- Typing indicator --}}
                                    <div class="typing-indicator">
                                        <div class="message-card typing">
                                            <p>
                                                <span class="typing-dots">
                                                    <span class="dot dot-1"></span>
                                                    <span class="dot dot-2"></span>
                                                    <span class="dot dot-3"></span>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    {{-- Send Message Form --}}
                                    @include('Chatify::layouts.sendForm')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
@endsection