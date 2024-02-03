@extends('layouts.admin')

@section('tiny-mde')
<link rel="stylesheet" type="text/css" href="<?= asset('css/tiny-mde.min.css') ?>" />
@endsection

@section('sidebar')
@include('component.sidebar')
@endsection

@section('content')
@endsection

@section('footer')
<script src="<?= asset('css/jquery.js') ?>"></script>
@endsection