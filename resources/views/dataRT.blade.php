@extends('layouts.admin')

@section('sidebar')
@include('component.sidebar')
@endsection

@section('topbar')
@include('component.topbar')
@endsection

@section('content')
    <hr>
    <div class="mx-3 my-3">
        <a href="<?=route('databaru')?>"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Data Baru</button></a>
    </div>
    <hr>

    <ul role="list" class="divide-y divide-gray-100">
        
        @foreach ($organisasi as $person)
        <li class="flex justify-between gap-x-6 py-5">
            <div class="flex gap-x-4">
                <!-- <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="" alt=""> -->
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900"> {{$person->nama}} </p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Informasi Tambahan</p>
                </div>
            </div>

            <div class="hidden sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900"> <b> Jabatan </b></p>
                <p class="leading-6 text-gray-900"> {{$person->jabatan}} </p>
            </div>
            <div class="hidden sm:flex sm:flex-col sm:items-end">
                <a href="<?=route('deletedRT')."?person=".$person->no?>"> <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button> </a>
                <!-- <a href="http://"></a> <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button> -->
            </div>
        </li>
        @endforeach
    </ul>

@endsection

@section('footer')
<script src="<?= asset('css/flowbite.js') ?>"></script>
@endsection