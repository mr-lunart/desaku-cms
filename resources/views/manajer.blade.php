@extends('layouts.admin')

@section('sidebar')
@include('component.sidebar')
@endsection

@section('content')
<div class="container border px-4 py-5 font-sans">
    <span class="">
        <h1 class="text-2xl font-semibold">Administrator</h1>
    </span>
</div>
<br>
<div class="container rounded-md border px-4 py-4 font-sans">
    <table class="table-auto w-full">
        <thead class="">
            <tr>
            <th class="border-b pt-0 pb-3 text-left">Song</th>
            <th class="border-b pt-0 pb-3 text-left">Artist</th>
            <th class="border-b pt-0 pb-3 text-left">Year</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            <tr>
            <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
            <td>Malcolm Lockyer</td>
            <td>1961</td>
            </tr>
            <tr>
            <td>Witchy Woman</td>
            <td>The Eagles</td>
            <td>1972</td>
            </tr>
            <tr>
            <td>Shining Star</td>
            <td>Earth, Wind, and Fire</td>
            <td>1975</td>
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