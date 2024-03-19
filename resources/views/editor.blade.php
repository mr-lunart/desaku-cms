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
<!-- <div class="" style="position:absolute; top:0; left:0; background-color: yellow; width: 100vw; height: 100vh;"></div> -->
<form action="#" method="POST" onsubmit="updateTextContainer()">
    @csrf
    <div>
        <button type="submit" class=" bg-blue-700 px-4 py-2 text-white rounded-none" onclick="$('form').attr('target', '_blank');">Preview</button>
        <button class=" bg-green-700 px-4 py-2 text-white rounded-none" onclick="$('form').attr('target', '');">Publish</button>
    </div>
    <br>
    <hr>
    <br>

</form>
<div id="sabak">

    <div id="component-container-0" class="wrapper">
        <button id="component-4" class=" bg-green-700 px-4 py-2 text-white rounded-none" onclick=" test(this) "><b>+</b></button>
    </div>

</div>

@endsection

@section('footer')

@endsection

@section('script')
<script src="<?= asset('js/jquery/jquery.js') ?>"></script>
<script src="<?= asset('js/jquery/jquery-ui.js') ?>"></script>
<script src="<?= asset('js/quill/quill.js') ?>"></script>
<script src="<?= asset('js/editor/sabak.js') ?>"></script>
<script>
    // var quill = new Quill('#editor-0', {
    //     theme: 'snow'
    // });
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

    function spawnAddComponent(id, classes, elements, attr = null) {

        let storage = uuidStorage(id)
        let lastIndex = Object.keys(storage.uuid).pop()

        let divNode = document.createElement(elements)
        divNode.setAttribute('class', classes)
        divNode.setAttribute('id', storage.uuid[lastIndex])
        if ( !attr == null ) {
            divNode.setAttribute(attr['name'], attr['value'])
        }

        return divNode
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

    function showFloatingEditorMenu(elementNode) {
        elementNode.parentNode.insertAdjacentHTML('afterbegin','<p>Hallo</p>')
        console.log(elementNode.parentNode)
    }


    function test(elementNode) {
        let wrapper = spawnAddComponent("component-wrapper", 'wrapper my-3', "div")
        let component = spawnAddComponent("component", 'new-component bg-green-700 px-4 py-2 text-white rounded-none', "button")
        component.innerText=component.id;
        component.setAttribute('onclick','test(this)')
        wrapper.appendChild(component)
        document.getElementById('sabak').insertBefore(wrapper, elementNode.parentNode)
        let wrapper2 = spawnAddComponent("component-wrapper", 'wrapper my-3', "div")
        let component2 = spawnAddComponent("component", 'new-component bg-green-700 px-4 py-2 text-white rounded-none', "button")
        component2.innerText=component2.id;
        component2.setAttribute('onclick','test(this)')
        wrapper2.appendChild(component2)
        document.getElementById('sabak').insertBefore(wrapper2, elementNode.parentNode.nextSibling)
        // elementNode.remove()
    }

</script>
@endsection