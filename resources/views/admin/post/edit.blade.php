@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
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

                        <form action="{{route('admin.post.update', ['post' => $post->post_id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <label>
                                    Название
                                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                </label>
                                @error('title')
                                <div class="text-danger">Поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="categorySelect">Категория</label>
                                <select class="form-control" id="categorySelect" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            {{$category->category_id == $post->category_id ? ' selected ' : ''}}
                                            value={{$category->category_id}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label id="tagSelect">Теги</label>
                                <select class="select2" multiple="multiple" data-placeholder="Select a State"
                                        style="width: 100%;" name="tag_ids[]">
                                    @foreach($tags as $tag)
                                        <option
                                            {{$tagsInPost->contains($tag) ? ' selected ' : ''}}
                                            value="{{$tag->tag_id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Главное изображение</label>
                                <div class="w-25 mb-2">
                                    <img src="{{asset('storage/' . $post->main_image)}}" alt="main_image" height="150px">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                @error('main_image')
                                <div class="text-danger">Поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Изображение для превью</label>
                                <div class="w-25 mb-2">
                                    <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image" height="150px">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>

                                @error('preview_image')
                                <div class="text-danger">Поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Описание</label>
                                <textarea id="summernote" name="content">{{$post->content}}</textarea>
                                @error('content')
                                <div class="text-danger">Поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Обновить</button>
                            </div>
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

