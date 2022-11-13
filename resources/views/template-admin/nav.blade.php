<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('listUser') }}" aria-expanded="false">
                        <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">List USer</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin-transaksi.index') }}" aria-expanded="false"><i
                            class="mdi me-2 mdi-table"></i><span class="hide-menu">Transaksi</span></a>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('pendapatan') }}" aria-expanded="false"><i
                            class="mdi me-2 mdi-table"></i><span class="hide-menu">Pendapatan</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('home') }}" aria-expanded="false"><i class="mdi me-2 mdi-page-last"></i><span
                            class="hide-menu">Web NK kafe</span></a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
