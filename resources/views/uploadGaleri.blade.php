@extends('layouts.admin')

@section('sidebar')
@include('component.sidebar')
@endsection

@section('content')
<br>
<h2 class="text-2xl font-bold tracking-tight text-gray-900">Upload Gambar</h2>
<br>
<hr>
<br>
<form class="w-full max-w-lg" method="POST" action="<?= route('galeriUpload') ?>" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-wrap mx-3 mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Foto</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="file">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
    </div>
    <div class="flex flex-wrap mx-3 mb-6">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
    </div>
</form>
@endsection

@section('footer')
<script src="<?= asset('css/flowbite.js') ?>"></script>
@endsection