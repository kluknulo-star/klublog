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
                    <div class="card w-50">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th colspan="3" class="text-center">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->comment_id}}</td>
                                        <td>{{$comment->message}}</td>
                                        <td class="text-center">
                                            <a
                                                href="{{route('personal.comment.edit', ['comment' => $comment->comment_id])}}"
                                               class="text-success"><i class="fas fa-pen"></i></a></td>
                                        <td class="text-center">
                                            <button class="border-0 bg-transparent">
                                                <a class="text-danger" data-toggle="modal"
                                                   data-target="#deleteCategoryModal{{$comment->comment_id}}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteCategoryModal{{$comment->comment_id}}"
                                         tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModal"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteCategoryModalLabel">Удаление
                                                        поста</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Вы действительно хотите удалить тег "{{$comment->message}}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{route('personal.comment.destroy', ['comment' => $comment->comment_id])}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Закрыть
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>


            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
@endsection
