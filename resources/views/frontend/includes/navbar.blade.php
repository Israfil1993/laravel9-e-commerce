<nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
        @foreach( $categoies as $rs)
        <div class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown">{{ $rs->title }} <i class="fa fa-angle-down float-right mt-1"></i></a>
            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                <a href="" class="dropdown-item">Men's Dresses</a>

            </div>
        </div>
        @endforeach


</nav>
</div>
