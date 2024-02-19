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

    <div id="editor-0">
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br></p>
    </div>

</form>

<div id="wrap-0" class="wrapper">
    <button id="button-0" class=" bg-green-700 px-4 py-2 text-white rounded-none" onclick="addSection('button-200')"><b>+</b></button>
</div>

@endsection

@section('footer')

@endsection

@section('script')
<script src="<?= asset('js/jquery/jquery.js') ?>"></script>
<script src="<?= asset('js/jquery/jquery-ui.js') ?>"></script>
<script src="<?= asset('js/quill/quill.js') ?>"></script>
<script src="<?= asset('js/editor/sabak.js') ?>"></script>
<script type="text/javascript">
    var quill = new Quill('#editor-0', {
        theme: 'snow'
    });
</script>
<script>
    // if (typeof(Storage) !== "undefined") {
    //     console.log('supported')
    //     // Code for localStorage/sessionStorage.
    // } else {
    //     console.log('not supported')
    //     // Sorry! No Web Storage support..
    // }
    function setStorage(name, item) {
        if (localStorage.getItem(name) == null) {
            localStorage.setItem(name, item);
            return {
                name: 'created'
            }
        } else {
            localStorage.setItem(name, item);
            return {
                name: 'updated'
            }
        }
    }

    function getStorage(name) {
        if (localStorage.getItem(name) == null) {
            return null
        } else {
            return localStorage.getItem(name);
        }
    }

    // if (!(localStorage.getItem('editor') == null)) {
    //     var retrievedObject = localStorage.getItem('editor');
    //     var uuid = JSON.parse(retrievedObject)
    //     uuid.id.push(idElement)
    //     localStorage.setItem("editor", JSON.stringify(uuid));
    // } else {


    //     var retrievedObject = localStorage.getItem('editor');
    // }
    // console.log('retrievedObject: ', JSON.parse(retrievedObject));
    // localStorage.removeItem('editor')

    function addSection(id) {
        let storage = getStorage('editor')
        let uid = id.split('-')[1]
        if (storage == null) {
            let item = {
                uuid: {}
            }
            item.uuid[uid] = id
            setStorageStatus = setStorage('editor', JSON.stringify(item))

        } else {
            item = JSON.parse(storage)
            if (!(item.uuid.hasOwnProperty(uid))) {
                item.uuid[uid] = id
                setStorageStatus = setStorage('editor', JSON.stringify(item))
            } else {
                return console.log(getStorage('editor'))
                // return console.log('uuid has been existed')
            }
        }
        return console.log(getStorage('editor'))

        // let uuid = JSON.parse(getStorage('editor'))
        // uuid 
        // uuid.id.push(idElement)

    }
    // function paragraf(id, sabak) {
    //     sabak.createDivEditor()
    //     // document.getElementById(id).parentNode.insertBefore(sabak.createDivEditor(),document.getElementById(id))
    //     // document.getElementById(id).remove()
    //     // document.getElementById(id).parentNode.insertBefore(document.createElement("button"), document.getElementById(id).nextSibling)
    // }
</script>
@endsection