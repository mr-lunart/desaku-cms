@extends('layouts.admin')

@section('sidebar')
@include('component.sidebar')
@endsection

@section('content')
<div class="bg-white">
  <div class="mx-auto">
    <br>
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Galeri</h2>
    <br>
    <hr>
    <div class="mx-3 my-3">
      <a href="<?= route('uploadGaleri') ?>"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upload</button></a>
    </div>
    <hr>

    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      @foreach ($images as $image)
      <div class="border rounded p-4">
        <div class="group relative">
          <div class="">
            <img src="data:image/jpeg;base64,<?= $image -> thumbnail ?>" alt="Picture" class="">
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="#">
                  <span aria-hidden="true" class="absolute inset-0 "></span>
                  <p class="break-all">{{ $image->nama }}</p>
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">{{ $image -> uuid }}</p>
              <p class="text-sm font-medium text-gray-900">{{ $image -> tanggal }}</p>
              <br>
              <a href=""><button type="button" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Hapus</button></a>
            </div>
            
          </div>
        </div>
      </div>
      @endforeach
      <!-- More products... -->
    </div>

  </div>
</div>


@endsection

@section('footer')
<script src="<?= asset('css/flowbite.js') ?>"></script>
@endsection