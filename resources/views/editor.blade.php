@extends('layouts.admin')

@section('tiny-mde')
<link rel="stylesheet" type="text/css" href="<?= asset('css/tiny-mde.min.css') ?>" />
@endsection

@section('sidebar')
@include('component.sidebar')
@endsection

@section('content')
<form action="#" method="POST" onsubmit="updateTextContainer()">

    <button type="submit" class=" bg-blue-700 px-4 py-2 text-white rounded-none" onclick="$('form').attr('target', '_blank');">Preview</button>
    <button class=" bg-green-700 px-4 py-2 text-white rounded-none" onclick="$('form').attr('target', '');">Publish</button>
    @csrf
    <div class="txtcontainer">
        <textarea id="txt" name="markdown">Silahkan Menulis...</textarea>
    </div>
    
</form>
<br>
<div id="toolbar"></div>
<br>
<div style="padding-bottom: 100px;" class="border border-gray-200 px-2 pb-6 rounded" id="editor">
</div>
@endsection

@section('footer')
<script src="<?= asset('js/tiny-mde.min.js') ?>"></script>
<script src="<?= asset('js/jquery.js') ?>"></script>
<script type="text/javascript">
    var tinyMDE = new TinyMDE.Editor({
        textarea: 'txt',
        element: 'editor'
    });

    var commandBar = new TinyMDE.CommandBar({
        element: 'toolbar',
        editor: tinyMDE
    });

    function updateTextContainer() {
        document.getElementById('txt').value = tinyMDE.getContent();
    }
</script>
@endsection