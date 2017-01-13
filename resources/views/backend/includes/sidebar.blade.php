<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/avatar_2x.png') }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <!-- dashboard -->
            <li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{{ url('admin/dashboard') }}">
                    <span>{{trans('menus.backend.sidebar.dashboard')}}</span>
                    <i class="fa fa-tachometer pull-left" aria-hidden="true"></i>
                </a>
            </li>
            <!-- account -->
            <li class="{{ Active::pattern('admin/account*') }}">
                <a href="{{ url('admin/account') }}">
                    <span>{{trans('menus.backend.sidebar.menuTitle.account')}}</span>
                    <i class="glyphicon glyphicon-chevron-right pull-left" aria-hidden="true"></i>
                </a>
            </li>
            <!-- cash -->
            <li class="{{ Active::pattern('admin/cash*') }}">
                <a href="{{ url('admin/cash') }}">
                    <span>{{trans('menus.backend.sidebar.menuTitle.cash')}}</span>
                    <i class="glyphicon glyphicon-chevron-right pull-left" aria-hidden="true"></i>
                </a>
            </li>
            <!-- cheque -->
            <li class="{{ Active::pattern('admin/cheque*') }}">
                <a href="{{ url('admin/cheque') }}">
                    <span>{{trans('menus.backend.sidebar.menuTitle.cheque')}}</span>
                    <i class="glyphicon glyphicon-chevron-right pull-left" aria-hidden="true"></i>
                </a>
            </li>

            <!-- managment -->
            @permission('manage-users')
            <li class="header">{{ trans('menus.backend.sidebar.managment') }}</li>
            <!-- user managment -->
            <li class="{{ Active::pattern('admin/access/*') }}">
                <a href="{{ url('admin/access/user') }}">
                    <span>{{trans('menus.backend.access.title')}}</span>
                    <i class="glyphicon glyphicon-user pull-left" aria-hidden="true"></i>
                </a>
            </li>
            @endauth

            <!-- reports -->
            <li class="header">{{ trans('menus.backend.sidebar.report') }}</li>
            <!-- Master report -->
            <li class="{{ Active::pattern('admin/report/master') }}">
                <a href="{{ url('admin/report/master') }}">
                    <span>{{trans('menus.backend.sidebar.reportTitle.master')}}</span>
                    <i class="glyphicon glyphicon-list-alt pull-left" aria-hidden="true"></i>
                </a>
            </li>
            <!-- Agent wise report -->
            <li class="{{ Active::pattern('admin/report/agent') }}">
                <a href="{{ url('admin/report/agent') }}">
                    <span>{{trans('menus.backend.sidebar.reportTitle.agent')}}</span>
                    <i class="glyphicon glyphicon-list-alt pull-left" aria-hidden="true"></i>
                </a>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>