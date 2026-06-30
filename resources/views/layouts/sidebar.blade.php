   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <a href="#" class="brand-link">
           <img src="{{ asset('adminlte3/dist/img/logobeko.png') }}" alt="Beko09Workshop"
               class="brand-image img-circle elevation-3" style="opacity: .8">
           <span class="brand-text font-weight-light"><strong><b>Beko 09 Workshop <span
                           class="text-danger">.</span>™</b></strong></span>
       </a>
       <div class="sidebar">
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">
                   <li class="nav-item">
                       <a wire:navigate href="{{ route('dashboard') }}" class="nav-link @yield('menuDashboard')">
                           <i class="nav-icon fas fa-home"></i>
                           <p>
                               <strong>Dashboard
                           </p>
                       </a>
                   </li>
                   <li class="nav-divider">
                       <hr class="my-1 border-secondary">
                   </li>
                   @auth
                       @if (auth()->user()->role === 'Admin')
                           <li class="nav-header text-info"><i class="fas fa-user-shield mr-2"></i><strong>MENU
                                   ADMIN</strong>
                           </li>
                           <li class="nav-item">
                               <a wire:navigate href="{{ route('admin.user.index') }}" class="nav-link @yield('menuAdminUser')">
                                   <i class="nav-icon fas fa-users"></i>
                                   <p>
                                       Manajemen User
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a wire:navigate href="{{ route('admin.jasabubut.index') }}"
                                   class="nav-link @yield('menuAdminJasaBubut')">
                                   <i class="nav-icon fas fa-tools"></i>
                                   <p>
                                       Data Jasa Bubut
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a wire:navigate href="{{ route('admin.sparepart.index') }}"
                                   class="nav-link @yield('menuAdminSparepart')">
                                   <i class="nav-icon fas fa-motorcycle"></i>
                                   <p>
                                       Data Sparepart
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a wire:navigate href="{{ route('admin.datatransaksi.index') }}"
                                   class="nav-link @yield('menuAdminDataTransaksi')">
                                   <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                   <p>
                                       Data Transaksi
                                   </p>
                               </a>
                           </li>
                           <li class="nav-divider">
                               <hr class="my-1 border-secondary">
                           </li>
                       @endif
                   @endauth
                   @auth
                       @if (auth()->user()->role === 'Pelanggan')
                           <li class="nav-header text-success"><i class="fas fa-user-friends mr-2"></i><strong>MENU
                                   PELANGGAN</strong>
                           </li>
                           <li class="nav-item">
                               <a wire:navigate href="{{ route('pelanggan.jasabubut.index') }}"
                                   class="nav-link @yield('menuPelangganJasaBubut')">
                                   <i class="nav-icon fas fa-receipt"></i>
                                   <p>
                                       Daftar Jasa Bubut
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a wire:navigate href="{{ route('pelanggan.sparepart.index') }}"
                                   class="nav-link @yield('menuPelangganSparepart')">
                                   <i class="nav-icon fas fa-receipt"></i>
                                   <p>
                                       Daftar Sparepart
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a wire:navigate href="{{ route('pelanggan.order.index') }}"
                                   class="nav-link @yield('menuPelangganOrder')">
                                   <i class="nav-icon fas fa-cart-shopping"></i>
                                   <p>
                                       Order Jasa Bubut & Sparepart
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a wire:navigate href ="{{ route('pelanggan.pesanansaya.index') }}"
                                   class="nav-link @yield('menuPelangganPesanananSaya')">
                                   <i class="nav-icon fas fa-shopping-bag"></i>
                                   <p>
                                       Pesanan Saya
                                   </p>
                               </a>
                           </li>
                       @endif
                   @endauth
               </ul>
           </nav>
       </div>
   </aside>
