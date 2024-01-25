<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Installation Configuration</title>
  <link rel="stylesheet" href="<?= asset('css/tailwind.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/jquery-ui.css') ?>">
</head>

<body class="font-sans">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <!-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
      <div class="m-10">
        <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Installation Configuration</h2>
        <small class="text-center leading-9 tracking-tight text-gray-900">Akun yang disimpan akan menjadi pemilik website</small>
      </div>
    </div>
    <hr class="sm:mx-auto sm:w-full sm:max-w-sm">
    <div class="p-3 sm:mx-auto sm:w-full sm:max-w-sm">
      <form id="login" class="space-y-6" action="{{route('starter')}}" method="POST">
        @csrf
        <div>
          <div class="flex items-center justify-around gap-4">
            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          </div>
          <div class="mt-2 flex items-center justify-evenly gap-4">
            <div>
              <input id="username" name="username" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" required title="Kolom Wajib Di Isi">
            </div>
            <div>
              <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" required>
            </div>
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
          </div>
          <div class="mt-2">
            <input id="email" name="email" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" required title="Kolom Wajib Di Isi">
          </div>
        </div>

        <div>
          <button id="login-submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
        </div>

      </form>


    </div>
  </div>

  @if ($errors->any())
  <div id="dialog-message" title="Form Invalid !">
    @foreach ($errors->all() as $error)
    <div>
      <div class="ui-icon 	ui-icon-alert"></div>
      <small>{{ $error }}</small>
    </div>
    @endforeach
  </div>
  @endif

  <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
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
              alphanumeric: true
            },
            password: {
              required: true,
              minlength: 8,
              alphanumeric: true
            },
            email: {
              required: true,
              minlength: 8,
              email: true
            }
          },
          messages: {
            username: {
              required: "<small style='color:red'>Username harus terisi</small>",
              minlength: "<small style='color:red'>Minimal 8 Karakter</small>",
              alphanumeric: "<small style='color:red'>Gunakan Angka, Huruf dan Underline</small>"
            },
            password: {
              required: "<small style='color:red'>Password harus terisi</small>",
              minlength: "<small style='color:red'>Minimal 8 Karakter</small>",
              alphanumeric: "<small style='color:red'>Gunakan Angka, Huruf dan Underline</small>"
            },
            email: {
              required: "<small style='color:red'>Password harus terisi</small>",
              minlength: "<small style='color:red'>Minimal 8 Karakter</small>",
              email: "<small style='color:red'>Gunakan Format Email</small>"
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

  @if ($errors->any())
  <script>
    $(function() {
      $("#dialog-message").dialog({
        modal: true,
        buttons: {
          OK: function() {
            $(this).dialog("close");
          }
        }
      });
    });
  </script>
  @endif

</body>

</html>