@extends('layouts.default')
@section('content')
  <section class="">
    <div class="container py-20 mx-auto">

      <div class="flex flex-wrap items-center mt-10 mb-3">
        <div class="w-full p-4 lg:flex-1">
            <h2 class="mb-2 text-4xl font-semibold leading-tight text-center text-gray-800 capitalize">เข้าสู่ระบบ</h2>
        </div>
      </div>

      <div class="flex flex-wrap justify-center">
        <div class="w-full p-5 bg-white rounded-lg lg:w-4/12 lg:rounded-l-none">
          @if (session('register_success'))
            <div class="px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
              {{-- <strong class="font-bold">สำเร็จ</strong> --}}
              <span class="block sm:inline">{{ session('register_success') }}</span>
            </div>
          @endif

          <form class="px-8 pt-6 pb-8 mb-4 rounded" id="login_form">
            @csrf
            <div class="mb-4">
              <label class="block mb-2 text-sm font-bold text-gray-700" for="username">อีเมล</label>
              <input
                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="username" type="text" name="email" />
            </div>

            <div class="mb-4">
              <label class="block mb-2 text-sm font-bold text-gray-700" for="password">รหัสผ่าน</label>
              <input
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="password" type="password" name="password" />
            </div>

            <div class="mb-6 text-center">
              <button
                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                type="submit">ล็อกอิน</button>
            </div>

            <hr class="mb-6 border-t" />

            <div class="text-center">
              <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                  href="{{ route('register') }}">สร้างบัญชี</a>
            </div>

          </form>
        </div>
      </div>
      </div>
    </div>
  </section>
@endsection

@section('javascript')
  <script>
    $(function() {
      $('#login_form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          type: 'POST',
          url: '/login',
          data: $(this).serialize(),
        }).done(function(res) {
          if (res.status == 'fail') {
            if (res.code == 1) {
              Swal.fire({
                title: 'เข้าสู่ระบบไม่สำเร็จ',
                text: "อีเมลหรือรหัสผ่านไม่ถูกต้อง",
                icon: 'error',
                showCancelButton: true,
                cancelButtonText: 'ปิด',
                showConfirmButton: false,
              })
            } else if (res.code == 2) {
              Swal.fire({
                title: 'เข้าสู่ระบบไม่สำเร็จ',
                text: "กรุณากรอกอีเมลและรหัสผ่าน",
                icon: 'error',
                showCancelButton: true,
                cancelButtonText: 'ปิด',
                showConfirmButton: false,
              })
            }
          } else {
            window.location.href = '/';
          }
        });
      });
    });
  </script>
@endsection