<nav class="container flex flex-wrap items-center px-4 mx-auto">
    <a href="{{ route('home') }}">
        <h1 class="text-2xl font-semibold text-indigo-600">CinePLUS</h1>
    </a>
    <button class="px-3 py-2 ml-auto text-indigo-900 border-2 border-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white lg:hidden">
        <span class="block w-6 my-1 border-b-2 border-current"></span>
        <span class="block w-6 my-1 border-b-2 border-current"></span>
        <span class="block w-6 my-1 border-b-2 border-current"></span>
    </button>
    <div class="hidden w-full ml-auto lg:block lg:w-auto">
        <a  
          href="{{ route('home') }}" 
          class="block px-4 py-2 font-medium hover:text-indigo-700 lg:inline-block {{ Route::currentRouteName() == 'home' ? 'text-indigo-700' : '' }}">
            กำลังฉาย
        </a>
        
        <a 
          href="{{ route('coming_soon') }}" 
          class="block px-4 py-2 font-medium hover:text-indigo-700 lg:inline-block {{ Route::currentRouteName() == 'coming_soon' ? 'text-indigo-700' : '' }}">
            โปรแกรมหน้า
        </a>

        @if(Auth::check())
        <div class="inline-block pl-4">
            <i class="fas fa-user"></i>
            <a href="#" class="block py-2 pl-1 font-medium hover:text-indigo-700 lg:inline-block">{{ auth()->user()->name }}</a>
            <a href="{{ route('logout') }}" class="block py-2 pl-1 font-medium hover:text-indigo-700 lg:inline-block">ออกจากระบบ</a>
        </div>
        @else
            <div class="inline-block px-4 py-2">
                <a href="{{ route('login') }}" class="inline-block px-6 py-2 text-white bg-indigo-600 border-2 border-indigo-600 rounded-md hover:text-indigo-600 hover:bg-indigo-100">เข้าสู่ระบบ / ลงทะเบียน</a>
            </div>
        @endif
    </div>
</nav>