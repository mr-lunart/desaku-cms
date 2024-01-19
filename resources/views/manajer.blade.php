@extends('layouts.admin')

@section('sidebar')
@include('component.sidebar')
@endsection

@section('content')
<div class="flex flex-auto flex-row justify-between container border px-4 py-5 font-sans rounded-md">
    <div class="">
        <h1 class="text-xl font-semibold"><bold>Manajer Admin</blod></h1>
    </div>
    <div class="">
        <a href="{{}}"><button class="rounded-md bg-red-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500">Tambah Admin</button></a>
    </div>
</div>
<br>
<div class="container rounded-md border px-4 py-4 font-sans">
    <table class="table-fixed w-full">
        <thead class="">
            <tr>
            <th class="border-b pt-0 pb-3 text-left">Nama Admin</th>
            <th class="border-b pt-0 pb-3 text-left">Terakhir Aktif</th>
            <th class="border-b pt-0 pb-3 text-left">Hak Akses</th>
            <th class="border-b pt-0 pb-3 text-left">Opsi</th>
            <th class="border-b pt-0 pb-3 text-left">Log</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @foreach ($admins as $admin)
            <tr class="border">
                <td class="p-3 text-wrap">{{$admin->name}}</td>
                <td class="p-3 text-wrap break-all">{{$admin->last_login_at}}</td>
                <td class="p-3">
                    <button class="flex justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500">Lihat Hak</button>
                </td>
                <td class="p-3">
                    <button class="rounded-md bg-red-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500">Hapus</button>
                    <button class="rounded-md bg-blue-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
@endsection