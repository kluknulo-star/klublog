@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Тэги</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="col-12">
                    <a class="btn btn-dark" href="{{route('admin.tag.create')}}" role="button">Добавить
                        тег</a>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card w-25">
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
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{$tag->tag_id}}</td>
                                            <td>{{$tag->title}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.tag.show', ['tag' => $tag->tag_id])}}"
                                                   class="text-dark"><i class="far fa-eye"></i></a></td>
                                            <td class="text-center">
                                                <a href="{{route('admin.tag.edit', ['tag' => $tag->tag_id])}}"
                                                   class="text-info"><i class="fas fa-paint-brush"></i></a></td>
                                            <td class="text-center">
                                                <button class="border-0 bg-transparent">
                                                    <a class="text-danger" data-toggle="modal"
                                                       data-target="#deleteCategoryModal{{$tag->tag_id}}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteCategoryModal{{$tag->tag_id}}"
                                             tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModal"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteCategoryModalLabel">Удаление
                                                            тега</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Вы действительно хотите удалить тег "{{$tag->title}}"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{route('admin.tag.destroy', ['tag' => $tag->tag_id])}}"
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
                {{$tags->withQueryString()->links()}}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

