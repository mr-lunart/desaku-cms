@extends('layouts.admin')

@section('tiny-mde')
<link rel="stylesheet" type="text/css" href="<?= asset('css/tiny-mde.min.css') ?>" />
@endsection

@section('sidebar')
@include('component.sidebar')
@endsection

@section('topbar')
@include('component.topbar')
@endsection

@section('content')
<br>
<label for="message" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Visi</label>
<div id="toolbar"></div>

<div class="border border-gray-200 px-2 pb-6 rounded" id="editor">
</div>
<br>
<label for="message" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">Misi</label>
<div id="toolbar2"></div>

<div class="border border-gray-200 px-2 pb-6 rounded" id="editor2">
</div>
<br>
<form action="<?= route('visiUpload') ?>" method="POST" onsubmit="updateTextContainer()">
    @csrf
    <div class="txtcontainer">
        <textarea id="txt" name="visi"><?=$visi?></textarea>
    </div>
    <div class="txtcontainer">
        <textarea id="txt2" name="misi"><?=$misi?></textarea>
    </div>
    <button type="submit" class=" bg-blue-700 px-4 py-2 text-white rounded-none">Simpan</button>
</form>

@endsection

@section('footer')
<script src="<?= asset('css/tiny-mde.min.js') ?>"></script>
<script src="<?= asset('css/flowbite.js') ?>"></script>
<script type="text/javascript">
    var tinyMDE = new TinyMDE.Editor({
        textarea: 'txt',
        element: 'editor'
    });
    
    var tinyMDE2 = new TinyMDE.Editor({
        textarea: 'txt2',
        element: 'editor2'
    });

    var commandBar = new TinyMDE.CommandBar({
        element: 'toolbar',
        editor: tinyMDE,
        commands:['ul', 'ol']
    });
    var commandBar2 = new TinyMDE.CommandBar({
        element: 'toolbar2',
        editor: tinyMDE2,
        commands:['ul', 'ol']
    });

    function updateTextContainer() {
        document.getElementById('txt').value = tinyMDE.getContent();
        document.getElementById('txt2').value = tinyMDE2.getContent();
    }
</script>
@endsection