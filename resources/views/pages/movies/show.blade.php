@extends('layouts.default')

@section('content')
  <script>
    var movie_id = {{ $movie->id }};  
  </script>  

  <section class="">
    <div class="container py-20 mx-auto">
      
      <div class="flex flex-wrap items-center mt-10 mb-3">
        <div class="w-full p-4 lg:flex-1">
            <h2 class="mb-2 text-4xl font-semibold leading-tight text-center text-gray-800 capitalize">{{ $movie->name }}</h2>
        </div>
      </div>

      <!-- Row -->
      <div class="flex w-full mx-auto xl:w-3/4 lg:w-11/12">
        <!-- Col -->
        <div class="hidden w-full h-auto bg-gray-400 bg-cover rounded-l-lg lg:block lg:w-1/2">
          <img src="{{ asset($movie->poster) }}" alt="" class="object-cover h-full mx-auto w-60">
        </div>
        <!-- Col -->
        <div class="w-full p-5 bg-white rounded-lg lg:w-1/2 lg:rounded-l-none">
          <span class="block">วันที่เข้าฉาย: {{ $movie->showing_date }}</span>
          <span class="block">คะเเนน: {{ count($comments) === 0 ? 'N/A' : round($movie_score, 2) . '/5' }}</span>
        </div>
      </div>

    </div>
  </section>

  @if(Auth::check())
  <section>
    <div class="flex w-full mx-auto border-gray-100 xl:w-1/2 lg:w-11/12">
      <div class="w-full">
        @if(session('add_comment_success'))
        <div class="px-4 py-3 mb-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
          <span class="block sm:inline">{{ session('add_comment_success') }}</span>
        </div>
        @endif
        
        <div class="flex flex-col p-4 leading-normal bg-white border border-gray-400 rounded">
          <div class="flex items-center justify-between px-4">
            <h2 class="pt-3 pb-2 text-lg text-gray-800">เพิ่มความคิดเห็นใหม่ของคุณ</h2>
            <div class="flex items-center">
              <span class="pt-3 pb-2 mr-3 text-sm">ให้คะแนน</span>
              <div class="pt-3 pb-2 rating score-rating">
                <i class="cursor-pointer rating__star far fa-star"></i>
                <i class="cursor-pointer rating__star far fa-star"></i>
                <i class="cursor-pointer rating__star far fa-star"></i>
                <i class="cursor-pointer rating__star far fa-star"></i>
                <i class="cursor-pointer rating__star far fa-star"></i>
              </div>
            </div>
          </div>
          <div class="w-full px-3 mt-2 mb-2 md:w-full">
              <textarea 
                id="comment_body"
                class="w-full h-40 px-3 py-2 font-medium leading-normal placeholder-gray-700 bg-gray-100 border border-gray-400 rounded resize-none focus:outline-none focus:bg-white" 
                name="comment_body"></textarea>
          </div>
          <div class="px-3 text-right">
            <button 
              id="submit_comment_form"
              type='button' 
              class="px-4 py-1 mr-1 font-medium tracking-wide text-gray-700 bg-white border border-gray-400 rounded-lg hover:bg-gray-100" >
                เพิ่ม
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif

  <section>
    <div class="flex w-full mx-auto border-gray-100 xl:w-3/4 lg:w-11/12">
      <div class="w-full px-10 py-20">
        <h1 class="mb-5 text-xl text-center">ส่วนเเสดงความคิดเห็น</h1>
        @if(count($comments) === 0)
          <div class="w-full mb-10 lg:max-w-full lg:flex">
            <div class="flex flex-col w-full p-4 leading-normal text-center bg-white border border-gray-400 rounded">
              <span class="text-sm italic text-gray-700">ยังไม่มีการแสดงความคิดเห็น</span>
            </div>
          </div>

          {{-- <div class="w-full mb-10 lg:max-w-full lg:flex">
            <div class="flex flex-col justify-between w-full p-4 leading-normal bg-white border border-gray-400 rounded">
              <div class="mb-8">
                <div class="mb-2 text-lg font-bold text-gray-700">ให้คะแนน 1/5</div>
                <hr class="mb-6 border-t" />
                <p class="text-base text-gray-700">มาม่าโบรกเกอร์สเกตช์ สตีลโปรโมท แรงใจเรซินแตงโม</p>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <img class="w-10 h-10 mr-4 rounded-full" src="{{ asset('images/profile.png') }}" alt="Avatar of Writer">
                  <div class="flex text-sm">
                    <p class="font-semibold leading-none text-gray-900">สิงห์ คะนองนา</p>
                  </div>
                </div>
                <div>
                  <p class="text-sm text-gray-600">วันที่แสดงความคิดเห็น: 18 สิงหาคม 2564</p>
                </div>
              </div>
            </div>
          </div> --}}
        @else
          {{-- Comment --}}
          @foreach($comments as $comment)
            <div class="w-full mb-10 lg:max-w-full lg:flex">
              <div class="flex flex-col justify-between w-full p-4 leading-normal bg-white border border-gray-400 rounded">
                <div class="mb-8">
                  <div class="mb-2 text-lg font-bold text-gray-700">ให้คะแนน {{ $comment->score }}/5</div>
                  <hr class="mb-6 border-t" />
                  <p class="text-base text-gray-700">{{ $comment->comment }}</p>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <img class="w-10 h-10 mr-4 rounded-full" src="{{ asset('images/profile.png') }}" alt="Avatar of Writer">
                    <div class="flex text-sm">
                      <p class="font-semibold leading-none text-gray-900">{{ $comment->user->name }}</p>
                    </div>
                  </div>
                  <div>
                    <p class="text-sm text-gray-600">วันที่แสดงความคิดเห็น: {{ date('Y-m-d', strtotime($comment->created_at)) }}</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          {{-- Comment --}}
        @endif
      </div>
    </div>
  </section>
@endsection

@section('javascript')
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(function() {
      console.log('Movie id ---> ', movie_id);
      // $('.rating__star').hover(function() {
      //   console.log($(this).index());
      // });

      $('.rating__star').click(function() {
        var index = $(this).index();

        // var el = $('.score-rating').child();
        
        $('.rating__star').each(function(i, v) {
          if (i < index) {
            $(this).removeClass('far fa-star').addClass('fas fa-star');
          } else if (i == index) {
            if ($(this).hasClass('fas fa-star')) {
              $(this).removeClass('fas fa-star').addClass('far fa-star');
            } else {
              $(this).removeClass('far fa-star').addClass('fas fa-star');
            }
          } else {
            $(this).removeClass('fas fa-star').addClass('far fa-star');
          }
        });

        // console.log('Socre ---> ' + $('.fas').length);
      });

      
      $('#submit_comment_form').click(function(e) {
        e.preventDefault();
        var data = {
          'movie_id': movie_id,
          'comment': $('#comment_body').val(),
          'score': $('.score-rating > .fas').length
        };

        if (data.movie_id == false || data.movie_id == null) {
          Swal.fire({
            title: 'เกิดข้อผิดพลาด',
            text: "ไม่พบ movie id",
            icon: 'error',
            showCancelButton: true,
            cancelButtonText: 'ปิด',
            showConfirmButton: false,
          })
          return false;
        } 

        if (data.comment == false || data.comment == null) {
          Swal.fire({
            title: 'เกิดข้อผิดพลาด',
            text: "กรุณากรอกความคิดเห็น",
            icon: 'error',
            showCancelButton: true,
            cancelButtonText: 'ปิด',
            showConfirmButton: false,
          })
          return false;
        }

        $.ajax({
          type: 'POST',
          url: '/comments',
          data: data,
        }).done(function(res) {
          console.log(res);
          if (res.status == 'fail') {
            if (res.code == 1) {
              Swal.fire({
                title: 'เพิ่มความคิดเห็นไม่สำเร็จ',
                text: "มีบางอย่างผิดพลาด",
                icon: 'error',
                showCancelButton: true,
                cancelButtonText: 'ปิด',
                showConfirmButton: false,
              })
            } else if (res.code == 2) {
              Swal.fire({
                title: 'เพิ่มความคิดเห็นไม่สำเร็จ',
                text: "ข้อมูลไม่ถูกต้อง",
                icon: 'error',
                showCancelButton: true,
                cancelButtonText: 'ปิด',
                showConfirmButton: false,
              })
            }
          } else {
            window.location.reload();
          }
        });

      });

    });
  </script>
@endsection

          

