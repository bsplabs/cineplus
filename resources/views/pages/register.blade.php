@extends('layouts.default')
@section('content')
  <section class="">
    <div class="container py-20 mx-auto">
      <div class="flex flex-wrap items-center mt-10 mb-3">
        <div class="w-full p-4 lg:flex-1">
            <h2 class="mb-2 text-4xl font-semibold leading-tight text-center text-gray-800 capitalize">ลงทะเบียน</h2>
        </div>
      </div>

      <div class="flex flex-wrap justify-center">
        <div class="w-full p-5 bg-white rounded-lg lg:w-4/12 lg:rounded-l-none">
          <form class="px-8 pt-6 pb-8 mb-4 rounded" id="register_form">
            @csrf
            <div class="mb-4">
              <label class="block mb-2 text-sm font-bold text-gray-700" for="username">ชื่อ</label>
              <input
                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="username" type="text" name="name" />
            </div>

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
                type="submit">สร้างบัญชี</button>
            </div>

            <hr class="mb-6 border-t" />

            <div class="text-center">
              <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                  href="{{ route('login') }}">มีบัญชีเเล้ว</a>
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
        $('#register_form').on('submit', function(e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: '/register',
            data: $(this).serialize(),
          }).done(function(res) {
            if (res.status == 'fail') {
              if (res.code == 1) {
                Swal.fire({
                  title: 'ลงทะเบียนไม่สำเร็จ',
                  text: "ระบบเกิดข้อผิดพลาดบางอย่าง",
                  icon: 'error',
                  showCancelButton: true,
                  cancelButtonText: 'ปิด',
                  showConfirmButton: false,
                })
              } else if (res.code == 2) {
                Swal.fire({
                  title: 'ลงทะเบียนไม่สำเร็จ',
                  text: 'เนื่องจากข้อมูลที่กรอกเข้ามาไม่ถูกต้องหรืออาจจะอีเมลซ้ำ',
                  icon: 'error',
                  showCancelButton: true,
                  cancelButtonText: 'ปิด',
                  showConfirmButton: false,
                })
              }
            } else {
              window.location.href = '/login'
              // Swal.fire({
              //   title: 'ลงทะเบียนสำเร็จเเล้ว',
              //   icon: 'success',
              //   showCancelButton: false,
              //   confirmButtonText: 'ไปต่อ',
              // }).then((result) => {
              //   if (result.isConfirmed) {
              //     window.location.href = '/login'
              //   }
              // })
            }
          });
        });
      });
    </script>
@endsection