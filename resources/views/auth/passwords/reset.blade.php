@extends('layouts.main')

@section('title', 'Reset Password')

@section('content')
    <div class="container max-w-full mx-auto py-12 md:py-24 px-6">
        <div class="font-sans">
            <div class="max-w-sm mx-auto px-6">
                <div class="relative flex flex-wrap">
                    <div class="w-full relative">
                        <div class="mt-6">

                            <div class="mb-5 pb-1border-b-2 text-center font-base text-gray-700">
                                <a href="/" class="font-mono font-semibold text-3xl text-black">
                                    /.<span class="text-red-600">SMIT</span>
                                </a>
                            </div>

                            <div class="text-center">
                                <span class="font-semibold">A part of</span>
                                <x-auth.text-button
                                    title="@aasumitro"
                                    link="http://twitter.com/aasumitro"
                                    target="_blank"
                                    label-style="ml-2"
                                    text-style="font-mono"></x-auth.text-button>
                                <span class="font-semibold ml-2">Assets</span>
                                <p class="text-sm mt-2">
                                    Change your password!
                                </p>
                            </div>

                            <form class="mt-8">
                                <div class="mx-auto max-w-lg">
                                    <div class="py-2">
                                        <span
                                            class="px-1 text-sm text-gray-600 font-semibold"
                                        >
                                          Email Address
                                        </span>
                                        <input
                                            type="email"
                                            class="text-md mt-2 block px-5 py-3 rounded-lg
                                                w-full bg-white border-2 border-gray-300
                                                placeholder-gray-600 shadow-md
                                                focus:placeholder-gray-500focus:bg-white
                                                focus:border-gray-600 focus:outline-none"
                                            required
                                            autofocus
                                        >
                                    </div>

                                    <div class="py-2">
                                        <span class="px-1 text-sm text-gray-600 font-semibold">
                                          Password
                                        </span>
                                        <div class="relative">
                                            <input
                                                type="password"
                                                class="text-md mt-2 block px-5 py-3 rounded-lg
                                                      w-full bg-white border-2
                                                      border-gray-300 placeholder-gray-600 shadow-md
                                                      focus:placeholder-gray-500
                                                      focus:bg-white
                                                      focus:border-gray-600
                                                      focus:outline-none"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="py-2">
                                        <span class="px-1 text-sm text-gray-600 font-semibold">
                                          Confirm Password
                                        </span>
                                        <div class="relative">
                                            <input
                                                type="password"
                                                class="text-md mt-2 block px-5 py-3 rounded-lg
                                                      w-full bg-white border-2
                                                      border-gray-300 placeholder-gray-600 shadow-md
                                                      focus:placeholder-gray-500
                                                      focus:bg-white
                                                      focus:border-gray-600
                                                      focus:outline-none"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <button
                                        class="mt-3 text-md font-semibold
                                            bg-gray-800 w-full text-white rounded-lg
                                            px-6 py-4 block shadow-xl hover:text-white hover:bg-black"
                                        type="submit"
                                    >
                                        Reset Password
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

