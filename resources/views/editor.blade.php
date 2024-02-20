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

<div id="component-container-0" class="wrapper">
    <button id="component-4" class=" bg-green-700 px-4 py-2 text-white rounded-none" onclick="test('component-0')"><b>+</b></button>
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

    function spawnAddComponent(id) {
        let format = 'component-container-'
        let Div = document.createElement('div')
        Div.setAttribute('class', 'wrapper')
        Div.setAttribute('id', format.concat(id))
    }

    function newComponent(id) {
        let container = document.getElementById(id).parentNode;
    }

    function uuidGenerator() {
        let storage = getStorage('uuid')
        if (storage == null) {
            return null

        } else {
            let item = JSON.parse(storage)
            let gen = Object.keys(item.uuid).pop()
            return parseInt(gen)
        }

    }

    function uuidReset() {
        result = localStorage.removeItem('uuid')
        return result
    }

    function uuidStorage(id) {
        let uid = uuidGenerator()
        let storage = getStorage('uuid')
        if (uid == null) {
            let item = {
                uuid: {}
            }
            item.uuid[0] = id + "-" + 0
                setStorage('uuid', JSON.stringify(item))

        } else {
            uid = uid + 1
            item = JSON.parse(storage)
            if (!(item.uuid.hasOwnProperty(uid))) {
                item.uuid[uid] = id + "-" + uid
                setStorage('uuid', JSON.stringify(item))
            } else {
                return JSON.parse(getStorage('uuid'))
            }
        }
        return JSON.parse(getStorage('uuid'))
    }

    function test(id) {
        let storage = uuidStorage(id)
        let lastIndex = Object.keys(storage.uuid).pop()
        console.log({
            [lastIndex]: storage.uuid[lastIndex]
        })
    }
    // function paragraf(id, sabak) {
    //     sabak.createDivEditor()
    //     // document.getElementById(id).parentNode.insertBefore(sabak.createDivEditor(),document.getElementById(id))
    //     // document.getElementById(id).remove()
    //     // document.getElementById(id).parentNode.insertBefore(document.createElement("button"), document.getElementById(id).nextSibling)
    // }
</script>
@endsection