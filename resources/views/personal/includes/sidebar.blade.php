<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-header">Меню</li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('personal.main.index')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-home"></i>--}}
{{--                        <p>--}}
{{--                            Главная--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{route('personal.like.index')}}" class="nav-link">
                        <i class="nav-icon far fa-heart"></i>
                        <p>
                            Понравившиеся посты
                            {{--                            <span class="badge badge-info right">2</span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('personal.comment.index')}}" class="nav-link">
                        <i class="nav-icon far fa-comment"></i>
                        <p>
                            Комментарии
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
