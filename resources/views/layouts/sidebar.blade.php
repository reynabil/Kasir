<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                @if (Auth::user()->role == 'Super Admin')
                    <ul aria-expanded="false">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="/registerindex">Register</a></li>
                        <li><a href="/produk">Produk</a></li>
                        <li><a href="/pelanggan">Pelanggan</a></li>
                        <li><a href="/addpenjualan">Kasir</a></li>
                        <li><a href="/penjualan">history Penjualan</a></li>
                    </ul>
                @endif
                @if (Auth::user()->role == 'Petugas')
                    <ul aria-expanded="false">
                        <li><a href="/addpenjualan">Kasir</a></li>
                        <li><a href="/penjualan">history Penjualan</a></li>
                    </ul>
                @endif
            </li>

            {{-- <div class="copyright">
            <p><strong>Gymove Fitness Admin Dashboard</strong> © 2020 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div> --}}
    </div>
</div>
