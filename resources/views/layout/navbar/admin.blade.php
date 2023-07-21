<nav>
    <div class="navbar bg-accent-focus text-white z-30">
        <div class="navbar-start">
          <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost btn-circle">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
            </label>
            <ul tabindex="0" class=" text-black menu menu-sm dropdown-content mt-3 z-50 p-2 shadow bg-base-100 rounded-box w-52">
              <li><a>Dashboard</a></li>
              @role('Admin')
              <li><a href="/siswa">Daftar Siswa</a></li>
              <li><a href="/staff">Daftar Karyawan</a></li>
              <li><a href="/guru">Daftar Guru</a></li>
              @endrole
              <li>
                <details>
                <summary>Data Pelajaran</summary>
                <ul class="p-2">
                    @role('Admin')
                  <li><a href="/pelajaran">Data Mapel</a></li>
                  @endrole
                  @role('Guru|Siswa')
                  <li><details>
                    <summary>Data Materi dan tugas</summary>
                    <ul class="p-2">
                        <li><a href="/bab">Data Materi</a></li>
                        @role('Guru')
                      <li><a href="/bab/create">Buat Materi</a></li>
                      @endrole
                    </ul>
                  </details></li>
                  @endrole
                </ul>
              </details></li>
            </ul>
          </div>
        </div>
        <div class="navbar-center">
          <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
        </div>
        <div class="navbar-end">
            <div class="dropdown dropdown-end text-black">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                  <div class="w-10 rounded-full">
                    <img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                  </div>
                </label>
                @auth
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                      <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                      </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a href="/logout">Logout</a></li>
                  </ul>
                @endauth
              </div>
        </div>
      </div>
</nav>
