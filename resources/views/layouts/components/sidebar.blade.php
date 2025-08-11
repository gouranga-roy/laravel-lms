<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="#"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li> 
                    <a href="#"><i class="fe fe-layout"></i> <span>Borrowing</span></a>
                </li>
                <li> 
                    <a href="#"><i class="fe fe-user"></i> <span>Reservation</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-users"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('student.index') }}">All Students</a></li>
                        <li><a href="{{ route('student.create') }}">Add New Students</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Books</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="#">All Books</a></li>
                        <li><a href="#">Add New Book</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>