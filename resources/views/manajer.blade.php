@extends('layouts.admin')

@section('sidebar')
@include('component.sidebar')
@endsection

@section('content')
<div class="container border px-4 py-5 font-sans rounded-md">
    <span class="">
        <h1 class="text-xl font-semibold"><bold>Manajer Admin</blod></h1>
    </span>
</div>
<br>
<div class="container rounded-md border px-4 py-4 font-sans">
    <table class="table-auto w-full">
        <thead class="">
            <tr>
            <th class="border-b pt-0 pb-3 text-left">Nama Admin</th>
            <th class="border-b pt-0 pb-3 text-left">Tanggal Dibuat</th>
            <th class="border-b pt-0 pb-3 text-left">Hak Akses</th>
            <th class="border-b pt-0 pb-3 text-left">Opsi</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            <tr class="border">
                <td class="p-3">The Sliding Mr. Bones </td>
                <td></td>
                <td class="p-3">
                    <button class="flex justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500">Lihat Hak</button>
                </td>
                <td class="p-3">
                    <button class="rounded-md bg-red-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500">Hapus</button>
                    <button class="rounded-md bg-blue-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500">Edit</button>
                </td>
            </tr>
            <tr class="border">
                <td class="p-3">The Sliding Mr. Bones </td>
                <td></td>
                <td class="p-3">
                    <button class="flex justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500">Lihat Hak</button>
                </td>
                <td class="p-3">
                    <button class="rounded-md bg-red-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500">Hapus</button>
                    <button class="rounded-md bg-blue-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500">Edit</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/additional-methods.js')}}"></script>

@endsection