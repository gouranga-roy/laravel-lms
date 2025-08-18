<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ Request::is('/') ? 'active' : ''  }}">
                    <a href="{{ url('/') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#" class="{{ Request::is('borrow') || Request::is('borrow-search') ? 'active' : '' }}"><i class="fe fe-users"></i> <span> Borrowing</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('borrow.index') }}" class="{{ Request::is('borrow') ? 'link-active' : '' }}">All Borrowing</a></li>
                        <li><a href="{{ route('borrow.search') }}" class="{{ Request::is('borrow-search') ? 'link-active' : '' }}">Add New Borrowing</a></li>
                    </ul>
                </li>
                <li> 
                    <a href="#"><i class="fe fe-user"></i> <span>Reservation</span></a>
                </li>
                <li class="submenu">
                    <a href="#" class="{{ Request::is('book') || Request::is('book/create') ? 'active' : '' }}"><i class="fe fe-document"></i> <span> Books</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('book.index') }}" class="{{ Request::is('book') ? 'link-active' : '' }}">All Books</a></li>
                        <li><a href="{{ route('book.create') }}" class="{{ Request::is('book/create') ? 'link-active' : '' }}">Add New Book</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#" class="{{ Request::is('student') || Request::is('student/create') ? 'active' : '' }}"><i class="fe fe-users"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('student.index') }}" class="{{ Request::is('student') ? 'link-active' : '' }}">All Students</a></li>
                        <li><a href="{{ route('student.create') }}" class="{{ Request::is('student/create') ? 'link-active' : '' }}">Add New Students</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>