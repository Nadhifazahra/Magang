<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Calon Peserta Magang</title>
  @vite('resources/css/app.css')
  <style>
    body {
      overflow-y: scroll;
    }

    /* agar dropdown lebih halus */
    #profile-dropdown {
      transition: opacity 0.3s ease-out, transform 0.3s ease-out;
    }
  </style>
</head>

<body>
  <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
  <div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-15 w-20" src="img/Logo_PT_KAI.svg.png" alt="PT KAI">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{ route('beranda') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Beranda</a>
                <a href="{{ route('pengajuan.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Pengajuan</a>
                <a href="{{ route('pengajuan.waiting') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Daftar Pengajuan</a>
                <a href="{{ route('pengajuan.approved') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Daftar Peserta</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>

              <!-- Profile dropdown -->
              <div class="relative ml-3">
                <div>
                  <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                  </button>
                </div>

                <!--
                Dropdown menu, show/hide based on menu state.
                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
                <div id="profile-dropdown" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 transform opacity-0 scale-95 transition-all duration-300 ease-out hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Your Profile</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Settings</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Sign out</a>
                </div>

              </div>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="{{ route('beranda') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Beranda</a>
          <a href="{{ route('pengajuan.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Pengajuan</a>
          <a href="{{ route('pengajuan.waiting') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Daftar Pengajuan</a>
          <a href="{{ route('pengajuan.approved') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Daftar Peserta</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="male.jpg" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">Destian Ardan Alfatanu</div>
              <div class="text-sm font-medium leading-none text-gray-400">destian.alfatanu@example.com</div>
            </div>
            <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>
          </div>
          <div class="mt-3 space-y-1 px-2">
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
          </div>
        </div>
      </div>
    </nav>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Daftar Peserta Magang</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @foreach($dataApproved as $pengajuan)
        <ul role="list" class="divide-y divide-gray-100">
          <li class="flex items-center justify-between gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
              @if($pengajuan->jenis_kelamin === 'Laki-laki')
              <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('img/male.jpg') }}" alt="Male">
              @else
              <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('img/female.webp') }}" alt="Female">
              @endif
              <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900">{{ $pengajuan->nama }}</p>
                <p class="mt-1 text-xs leading-3 text-gray-500">{{ $pengajuan->instansi }}</p>
              </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
              <p class="text-sm leading-6 text-gray-900">{{ $pengajuan->start_date }} s.d {{ $pengajuan->end_date }}</p>
              <p class="mt-1 text-xs leading-5 text-gray-500">{{ $pengajuan->keterangan }}</p>
            </div>
          </li>
          @endforeach
        </ul>

      </div>
    </main>
  </div>

  <script>
    // JavaScript untuk mengontrol dropdown
    const userMenuButton = document.getElementById('user-menu-button');
    const profileDropdown = document.getElementById('profile-dropdown');

    userMenuButton.addEventListener('click', () => {
      profileDropdown.classList.toggle('hidden');
      setTimeout(() => {
        if (!profileDropdown.classList.contains('hidden')) {
          profileDropdown.classList.add('opacity-100', 'scale-100');
          profileDropdown.classList.remove('opacity-0', 'scale-95');
        } else {
          profileDropdown.classList.add('opacity-0', 'scale-95');
          profileDropdown.classList.remove('opacity-100', 'scale-100');
        }
      }, 10);
    });

    window.addEventListener('click', (event) => {
      if (!userMenuButton.contains(event.target) && !profileDropdown.contains(event.target)) {
        profileDropdown.classList.add('hidden', 'opacity-0', 'scale-95');
        profileDropdown.classList.remove('opacity-100', 'scale-100');
      }
    });
  </script>

</body>

</html>