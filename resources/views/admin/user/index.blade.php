@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="col-12">
                    <a class="btn btn-dark" href="{{route('admin.user.create')}}" role="button">Добавить
                        пользователя</a>
                </div>
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
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->user_id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.user.show', ['user' => $user->user_id])}}"
                                                   class="text-dark"><i class="far fa-eye"></i></a></td>
                                            <td class="text-center">
                                                <a href="{{route('admin.user.edit', ['user' => $user->user_id])}}"
                                                   class="text-info"><i class="fas fa-paint-brush"></i></a></td>
                                            <td class="text-center">
                                                <button class="border-0 bg-transparent">
                                                    <a class="text-danger" data-toggle="modal"
                                                       data-target="#deleteCategoryModal{{$user->user_id}}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteCategoryModal{{$user->user_id}}"
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
                                                        Вы действительно хотите удалить тег "{{$user->name}}"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{route('admin.user.destroy', ['user' => $user->user_id])}}"
                                                            method="user">
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
                {{$users->withQueryString()->links()}}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

