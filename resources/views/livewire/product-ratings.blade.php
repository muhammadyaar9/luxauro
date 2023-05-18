<div>
    <style>
        

        .text-yellow-400 {
            color: #133033 !important;
        }
    </style>
    <section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full mt-16 md:mt-0">
                    <div
                        class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                        @auth
                            <div class="w-full space-y-5">
                                <p class="font-medium text-black-500 uppercase">
                                    Rate this product
                                </p>
                            </div>
                            @if (session()->has('message'))
                                <p class="text-xl text-gray-600 md:pr-16">
                                    {{ session('message') }}
                                </p>
                            @endif
                            @if ($hideForm != true)
                                <form wire:submit.prevent="rate()">
                                    <div class="block max-w-3xl px-1 py-2 mx-auto">
                                        <div class="flex space-x-1 rating">
                                            <label for="star1">
                                                <input hidden wire:model="rating" type="radio" id="star1"
                                                    name="rating" value="1" />
                                                    <svg class="cursor-pointer block w-8 h-8 fill-current text-grey @if ($rating >= 5) text-yellow-400 @endif"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path stroke="#000" stroke-width="1.5" @if ($rating >= 1)  @else fill="none" @endif d="M10 1.529l2.932 5.976 6.538.95-4.72 4.593 1.405 7.73L10 16.271l-7.155 3.517 1.405-7.73L.53 8.505l6.538-.95L10 1.529z" />
                                                    </svg>
                                            </label>
                                            <label for="star2">
                                                <input hidden wire:model="rating" type="radio" id="star2"
                                                    name="rating" value="2" />
                                                    <svg class="cursor-pointer block w-8 h-8 fill-current text-grey @if ($rating >= 5) text-yellow-400 @endif"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path stroke="#000" stroke-width="1.5" @if ($rating >= 2)  @else fill="none" @endif d="M10 1.529l2.932 5.976 6.538.95-4.72 4.593 1.405 7.73L10 16.271l-7.155 3.517 1.405-7.73L.53 8.505l6.538-.95L10 1.529z" />
                                                    </svg>
                                            </label>
                                            <label for="star3">
                                                <input hidden wire:model="rating" type="radio" id="star3"
                                                    name="rating" value="3" />
                                                    <svg class="cursor-pointer block w-8 h-8 fill-current text-grey @if ($rating >= 5) text-yellow-400 @endif"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path stroke="#000" stroke-width="1.5" @if ($rating >= 3) @else fill="none" @endif d="M10 1.529l2.932 5.976 6.538.95-4.72 4.593 1.405 7.73L10 16.271l-7.155 3.517 1.405-7.73L.53 8.505l6.538-.95L10 1.529z" />
                                                    </svg>
                                            </label>
                                            <label for="star4">
                                                <input hidden wire:model="rating" type="radio" id="star4"
                                                    name="rating" value="4" />
                                                <svg class="cursor-pointer block w-8 h-8 fill-current text-grey @if ($rating >= 5) text-yellow-400 @endif"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path stroke="#000" stroke-width="1.5" @if ($rating >= 4) @else fill="none" @endif d="M10 1.529l2.932 5.976 6.538.95-4.72 4.593 1.405 7.73L10 16.271l-7.155 3.517 1.405-7.73L.53 8.505l6.538-.95L10 1.529z" />
                                                </svg>
                                            </label>
                                            {{-- <label for="star5">
                                                <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                                                <svg class="cursor-pointer block w-8 h-8 @if ($rating >= 5) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label> --}}


                                            {{-- <label for="star5">
                                                <input hidden wire:model="rating" type="radio" id="star5"
                                                    name="rating" value="5" />
                                                <svg class="cursor-pointer block w-8 h-8 @if ($rating >= 5) text @else text-grey @endif "
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                </svg>
                                                <li class="me-1"><i class="bi bi-star"></i></li>
                                            </label> --}}

                                            <label for="star5">
                                                <input hidden wire:model="rating" type="radio" id="star5"
                                                    name="rating" value="5" />
                                                {{-- <svg class="cursor-pointer block w-8 h-8 fill-current text-grey @if ($rating >= 5) text-yellow-400 @endif"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"  fill="none">
                                                    <path stroke="#000" stroke-width="1.5" fill="none"
                                                        d="M10 1.529l2.932 5.976 6.538.95-4.72 4.593 1.405 7.73L10 16.271l-7.155 3.517 1.405-7.73L.53 8.505l6.538-.95L10 1.529z" />
                                                </svg> --}}
                                                <svg class="cursor-pointer block w-8 h-8 fill-current text-grey @if ($rating >= 5) text-yellow-400 @endif"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path stroke="#000" stroke-width="1.5" @if ($rating >= 5)  @else fill="none" @endif d="M10 1.529l2.932 5.976 6.538.95-4.72 4.593 1.405 7.73L10 16.271l-7.155 3.517 1.405-7.73L.53 8.505l6.538-.95L10 1.529z" />
                                                </svg>
                                            </label>

                                        </div>
                                        <div class="my-5">
                                            @error('comment')
                                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                            @enderror
                                            <textarea wire:model.lazy="comment" name="descriptions"
                                                class="block w-full px-4 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none"
                                                placeholder="Comment.."></textarea>
                                        </div>
                                        <div class="block text-end">
                                            <button type="submit" class="w-half px-3 btn btn-primary">Submit</button>
                                            @auth
                                                @if ($currentId)
                                                    <button type="submit" class="w-half px-3 btn btn-danger"
                                                        wire:click.prevent="delete({{ $currentId }})"
                                                        class="text-sm cursor-pointer">Delete</button>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @else
                            <div>
                                <div class="mb-8 text-center text-gray-600">
                                    You need to login in order to be able to rate the product!
                                </div>
                                <a href="{{ route('login') }}"
                                    class="block px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">Login</a>
                            </div>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="relative block pt-20 pb-24 overflow-hidden text-left bg-white">
        <div class="w-full px-20 mx-auto text-left md:px-10 max-w-7xl xl:px-16">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-12 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-indigo-900">
                        Ratings
                    </h2>
                </div>
            </div>
            <div
                class="box-border flex grid flex-wrap justify-center gap-10 -mx-4 text-center text-indigo-900 lg:gap-16 lg:justify-start lg:text-left">
                @forelse ($comments as $comment)
                    <div class="flex col-span-1">
                        <div class="relative flex-shrink-0 w-20 h-20 text-left">
                            <a href="{{ '@' . $comment->user->username }}">
                            </a>
                        </div>
                        <div class="relative px-4 mb-16 leading-6 text-left">
                            <div class="box-border text-lg font-medium text-gray-600">
                                {{ $comment->comment }}
                            </div>
                            <div class="box-border mt-5 text-lg font-semibold text-indigo-900 uppercase">
                                Rating: <strong>{{ $comment->rating }}</strong> <i class="fa fa-star"
                                    style="color:#133033 !importent"></i>
                                @auth
                                    @if (auth()->user()->id == $comment->user_id || auth()->user()->role == 'admin')
                                        - <a wire:click.prevent="delete({{ $comment->id }})"
                                            class="text-sm cursor-pointer">Delete</a>
                                    @endif
                                @endauth
                            </div>
                            <div class="box-border text-left text-gray-700" style="quotes: auto;">
                                <a href="{{ '@' . $comment->user->username }}">
                                    {{ $comment->user->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex col-span-1">
                        <div class="relative px-4 mb-16 leading-6 text-left">
                            <div class="box-border text-lg font-medium text-gray-600">
                                No ratings
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
    </section>
</div>
