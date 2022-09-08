<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url({{ url('/') }}/assets/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ url('/') }}/assets/images/users/profile.png" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#"  role="button" aria-haspopup="true" aria-expanded="true">{{ session('nama')}}</a>

            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="{{ url('/backend') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ url('/kategori') }}" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Mapel</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ url('/penerbit') }}" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Siswa</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ url('/pengarang') }}" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Kelas</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ url('/buku') }}" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Mengajar</span></a>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Pengguna</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('/peminjaman') }}">Admin</a></li>
                    </ul>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('/peminjaman') }}">Pengajar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>

</aside>
