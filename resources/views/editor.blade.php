@extends('layouts.admin')

@section('title')
<title>Editor</title>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="<?= asset('css/jquery-ui.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?= asset('css/quill.snow.css') ?>" />
@endsection

@section('sidebar')
@include('component.sidebar')
@endsection

@section('topbar')
@include('component.topbar')
@endsection

@section('content')
<form action="#" method="POST" onsubmit="updateTextContainer()">
@csrf
    <div>
        <button type="submit" class=" bg-blue-700 px-4 py-2 text-white rounded-none" onclick="$('form').attr('target', '_blank');">Preview</button>
        <button class=" bg-green-700 px-4 py-2 text-white rounded-none" onclick="$('form').attr('target', '');">Publish</button>
    </div>
    <br>
    <hr>
    <br>
    
    <div class="editor">
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br></p>
    </div>

</form>

@endsection

@section('footer')

@endsection

@section('script')
<!-- <script src="<?= asset('js/jquery/jquery.js') ?>"></script> -->
<!-- <script src="<?= asset('js/jquery/jquery-ui.js') ?>"></script> -->
<script src="<?= asset('js/quill/quill.js') ?>"></script>
<script type="text/javascript">
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>
@endsection