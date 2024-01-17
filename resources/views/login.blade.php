
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- <link rel="stylesheet" href="<?=asset('css/tailwind.css')?>"> -->
</head>
<body class="font-sans">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <!-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sirandu</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form id="login" class="space-y-6" action="<?=route('login')?>" method="POST">
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
          <div class="text-sm">
            <a href="#" class="font-semibold text-green-600 hover:text-sky-600 disabled:opacity-75">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" required>
        </div>
      </div>

      <div>
        <button id="login-submit" type="button" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign In</button>
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
                // minlength: 8
            },
            password: {
                required: true,
                // minlength: 8
            },
        },
        messages: {
        username: {
            required: "Username harus diisi",
            minlength: "Minimal 8 Karakter"
        },
        password: {
            required: "Password harus disii",
            minlength: "Minimal 8 Karakter"
            
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