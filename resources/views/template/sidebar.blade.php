<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile"
            style="background: url({{ url('/') }}/assets/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ url('/') }}/assets/images/users/profile.png" alt="user" />
            </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" role="button" aria-haspopup="true"
                    aria-expanded="true">{{ session('nama') }}</a>

            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if (Auth()->user()->role == 'Admin')
                    <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard/admin') }}"
                            aria-expanded="false"><i class="mdi mdi-gauge"></i><span
                                class="hide-menu">Dashboard</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ url('/mapel') }}" aria-expanded="false"><i
                                class="mdi mdi-widgets"></i><span class="hide-menu">Mapel</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ url('/siswa') }}" aria-expanded="false"><i
                                class="fa fas fa-graduation-cap"></i><span class="hide-menu">Siswa</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ url('/kelas') }}" aria-expanded="false"><i
                                class="fa far fa-building"></i><span class="hide-menu">Kelas</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ url('/mengajar') }}" aria-expanded="false"><i
                                class="fa fa-book"></i><span class="hide-menu">Mengajar</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ url('/akun') }}" aria-expanded="false"><i
                                class="mdi mdi-account-box"></i><span class="hide-menu">Pengguna</span></a>
                    </li>
                @else
                    <li> <a class="waves-effect waves-dark" href="{{ url('/backend') }}" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ url('/kategori') }}" aria-expanded="false"><i
                                class="mdi mdi-widgets"></i><span class="hide-menu">Data Mengajar</span></a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>

</aside>
