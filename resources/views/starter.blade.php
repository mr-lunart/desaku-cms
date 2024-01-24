
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation Configuration</title>
    <link rel="stylesheet" href="<?=asset('css/tailwind.css')?>">
</head>
<body class="font-sans">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm border">
    <!-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
    <div>
        <h2 class="m-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Installation Configuration</h2>
    </div>
  </div>

  <div class="p-3 sm:mx-auto sm:w-full sm:max-w-sm border">
    <form id="login" class="space-y-6" action="" method="POST">
    @csrf
      <div>
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <div class="mt-2">
          <input id="username" name="username" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" required title="Kolom Wajib Di Isi">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" required>
        </div>
      </div>

      <div>
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
        <div class="mt-2">
          <input id="username" name="username" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" required title="Kolom Wajib Di Isi">
        </div>
      </div>

      <div>
        <button id="login-submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/additional-methods.js')}}"></script>

<script>
  $(document).ready(function() {
    $("#login-submit").on("click", function(e) {

      $("#login").validate({
        rules: {
          username: {
            required: true,
            minlength: 8,
            alphanumeric:true
            },
          password: {
            required: true,
            minlength: 8,
            alphanumeric:true
            },
        },
        messages: {
          username: {
            required: "<small style='color:red'>Username harus terisi</small>",
            minlength: "<small style='color:red'>Minimal 8 Karakter</small>",
            alphanumeric:"<small style='color:red'>Gunakan Angka, Huruf dan Underline</small>"
            },
          password: {
            required: "<small style='color:red'>Password harus terisi</small>",
            minlength: "<small style='color:red'>Minimal 8 Karakter</small>",
            alphanumeric:"<small style='color:red'>Gunakan Angka, Huruf dan Underline</small>"
            },
        },
        submitHandler: function(form) {
          // Tindakan yang akan dijalankan setelah validasi berhasil
            form.submit();
        }
      });
      
    });
  })
</script>
</body>
</html>