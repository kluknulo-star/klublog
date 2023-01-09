@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление тега</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">


                        <form action="{{route('admin.tag.store')}}" method="post" class="w-25">
                            @csrf
                            <div class="form-group">
                                <label>Название тега</label>
                                <input type="text" class="form-control" name="title">
                                @error('title')
                                    <div class="text-danger">Поле необходимо заполнить</div>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-dark">Создать</button>
                        </form>
                        {{-- Удалять по слову Ctrl + Backspace--}}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

