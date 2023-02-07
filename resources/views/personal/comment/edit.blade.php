@extends('personal.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
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


                    <form action="{{route('personal.comment.update', ['comment' => $comment->comment_id])}}" method="post" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Комментарий</label>
                            <textarea type="text" class="form-control" name="message">{{$comment->message}}
                            </textarea>
                            @error('message')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-dark">Изменить</button>
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
<!-- /.content-wrapper -->
@endsection
