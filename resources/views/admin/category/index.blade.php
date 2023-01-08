@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="col-12">
                    <a class="btn btn-primary" href="{{route('admin.category.create')}}" role="button">Добавить категорию</a>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <ul>
                        @foreach($categories as $category)
                            <li>{{$category->title}}</li>
                        @endforeach
                        </ul>
                        {{--                    <h4>Categories</h4>--}}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    {{$categories->links()}}
@endsection

