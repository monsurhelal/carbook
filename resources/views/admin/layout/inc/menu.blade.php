        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                            <i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-label">system settings</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-app-store"></i><span class="nav-text">Features</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('feature.index') }}">Features List </a></li>
                            <li><a href="{{ route('feature.create') }}">Features Create</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-app-store"></i><span class="nav-text">Cars</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Cars List </a></li>
                            <li><a href="./app-calender.html">Create Cars</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>