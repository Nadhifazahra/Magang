<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengajuan Calon Peserta Magang</title>
  @vite('resources/css/app.css')
  <style>
    body {
      overflow-y: scroll;
    }

    /*Supaya smooth*/
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
                <a href="{{ route('pengajuan.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white bg-gray-900">Pengajuan</a>
                <a href="{{ route('pengajuan.waiting') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Daftar Pengajuan</a>
                <a href="{{ route('pengajuan.approved') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Daftar Peserta</a>
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
            <a href="{{ route('beranda') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Beranda</a>
            <a href="{{ route('pengajuan.create') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Pengajuan</a>
            <a href="{{ route('pengajuan.waiting') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Daftar Pengajuan</a>
            <a href="{{ route('pengajuan.approved') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Daftar Peserta</a>
          </div>
          <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </div>
              <div class="ml-3">
                <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
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
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Sign out</a>
            </div>
          </div>
        </div>
    </nav>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Formulir Pendaftaran Calon Peserta Magang</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
              <h2 class="text-base font-bold leading-7 text-gray-900">Identitas Peserta</h2>
              <p class="mt-1 text-sm leading-6 font-semibold text-gray-600">Segera isikan data diri Anda yang sesuai dan teliti kembali sebelum Anda melakukan submit.</p>

              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
                  <div class="mt-2">
                    <input type="number" name="nik" id="nik" class="block w-full rounded-md border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Masukkan 16 digit NIK Anda">
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                  <div class="mt-2">
                    <input type="text" name="nama" id="nama" class="block w-full rounded-md border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=" Nama Lengkap">
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="jenis_kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
                  <div class="mt-2">
                    <div class="flex gap-x-4">
                      <div class="flex items-center">
                        <input id="laki_laki" name="jenis_kelamin" type="radio" value="Laki-laki" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="laki_laki" class="ml-2 block text-sm text-gray-900">Laki-laki</label>
                      </div>
                      <div class="flex items-center">
                        <input id="perempuan" name="jenis_kelamin" type="radio" value="Perempuan" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="perempuan" class="ml-2 block text-sm text-gray-900">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                  <div class="mt-2">
                    <textarea id="alamat" name="alamat" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="no_hp" class="block text-sm font-medium leading-6 text-gray-900">Nomor HP</label>
                  <div class="mt-2">
                    <input type="number" name="no_hp" id="no_hp" maxlength="12" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                  <div class="mt-2">
                    <div class="flex gap-x-4">
                      <div class="flex items-center">
                        <input id="mahasiswa" name="status" type="radio" value="Mahasiswa" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="mahasiswa" class="ml-2 block text-sm text-gray-900">Mahasiswa</label>
                      </div>
                      <div class="flex items-center">
                        <input id="siswa" name="status" type="radio" value="Siswa" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="siswa" class="ml-2 block text-sm text-gray-900">Siswa</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="instansi" class="block text-sm font-medium leading-6 text-gray-900">Instansi</label>
                  <div class="mt-2">
                    <input type="text" name="instansi" id="instansi" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="jurusan" class="block text-sm font-medium leading-6 text-gray-900">Jurusan</label>
                  <div class="mt-2">
                    <input type="text" name="jurusan" id="jurusan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Mulai</label>
                  <div class="mt-2">
                    <input type="date" name="start_date" id="start_date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="end_date" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Berakhir</label>
                  <div class="mt-2">
                    <input type="date" name="end_date" id="end_date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="surat_pengantar" class="block text-sm font-medium leading-6 text-gray-900">Surat Pengantar</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <input id="surat_pengantar" name="surat_pengantar" accept=".png,.jpg,.pdf" type="file" required>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="kartu" class="block text-sm font-medium leading-6 text-gray-900">KTM / Kartu Pelajar</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <input id="kartu" name="kartu" accept=".png,.jpg,.pdf" type="file" required>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="proposal" class="block text-sm font-medium leading-6 text-gray-900">Proposal</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <input id="proposal" name="proposal" accept=".png,.jpg,.pdf" type="file">
                  </div>
                </div>

                <!-- <div class="col-span-full">
                  <label for="surat_pengantar" class="block text-sm font-medium leading-6 text-gray-900">Surat Pengantar</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <input id="surat_pengantar" name="surat_pengantar" type="file" accept=".png,.jpg,.pdf" class="sr-only">
                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" onclick="document.getElementById('surat_pengantar').click();">Upload</button>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="kartu" class="block text-sm font-medium leading-6 text-gray-900">Kartu</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <input id="kartu" name="kartu" type="file" accept=".png,.jpg,.pdf" class="sr-only">
                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" onclick="document.getElementById('kartu').click();">Upload</button>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="proposal" class="block text-sm font-medium leading-6 text-gray-900">Proposal</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <input id="proposal" name="proposal" type="file" accept=".png,.jpg,.pdf" class="sr-only">
                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" onclick="document.getElementById('proposal').click();">Upload</button>
                  </div>
                </div> -->

              </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Reset</button>
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Submit</button>
            </div>
          </div>
        </form>
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