@section('sidebar')

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-table"></i> Books <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/books/create">Enter Books</a></li>
                    <li><a href="/books">View Books</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Issue <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/issue/create">Create Issue</a></li>
                    <li><a href="/issue">View Issues</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Member Defaults <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/memberDefaults/create">Member Defaults</a></li>
                    <li><a href="/memberDefaults">View Members Defaults</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Member Registrations <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/memberRegistrations/create">Member Registrations</a></li>
                    <li><a href="/memberRegistrations">View Members</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-home"></i> Subjects <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/subject/create">Enter Subjects</a></li>
                    <li><a href="/subject">View Subjects</a></li>
                    <li><a href="index3.html">Dashboard3</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Faculties <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/faculty/create">Enter Faculty</a></li>
                    <li><a href="/faculty">View Faculties</a></li>
                </ul>
            </li>



            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                    <li><a href="fixed_footer.html">Fixed Footer</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="e_commerce.html">E-commerce</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="project_detail.html">Project Detail</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="profile.html">Profile</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="page_403.html">403 Error</a></li>
                    <li><a href="page_404.html">404 Error</a></li>
                    <li><a href="page_500.html">500 Error</a></li>
                    <li><a href="plain_page.html">Plain Page</a></li>
                    <li><a href="login.html">Login Page</a></li>
                    <li><a href="pricing_tables.html">Pricing Tables</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#level1_1">Level One</a>
                    <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#level1_2">Level One</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
                        class="label label-success pull-right">Coming Soon</span></a></li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" <span
        class=" glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>

<!-- /menu footer buttons -->

@endsection