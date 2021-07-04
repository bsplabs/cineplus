@extends('layouts.default')
@section('content')
{{-- bg-white --}}
  <section class="">
    <div class="container py-20 mx-auto">
      <div class="flex flex-wrap items-center mt-10 mb-3">
        <div class="w-full p-4 lg:flex-1">
            <h2 class="mb-2 text-4xl font-semibold leading-tight text-center text-gray-800 capitalize">กำลังฉาย</h2>
        </div>
      </div>
      <div class="flex flex-wrap">
        @foreach ($movies as $movie)
          <div class="w-full p-4 xl:w-3/12 sm:w-6/12">
            <a href="{{ route('movies.show', ['id' => $movie->id]) }}" class="block p-4 overflow-hidden bg-white rounded shadow-md cursor-pointer hover:shadow-xl">
              <div class="text-center">
                <span class="inline-block px-3 py-1 mb-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">วันที่เข้าฉาย: {{ $movie->showing_date }}</span>
              </div>

              <div class="flex-shrink-0 mx-auto h-96">
                <img class="object-cover h-full mx-auto w-60" src="{{ asset($movie->poster) }}" alt="">
              </div>
              
              <div class="px-6 py-4 text-center">
                <div class="mb-2 text-xl font-bold">{{ $movie->name }}</div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection