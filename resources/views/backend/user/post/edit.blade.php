@extends("layouts.backend.app")

@section("title", "Edit post")

@section("content-header", "Edit post")
@section("from-breadcrumb", "Edit post")
@section("breadcrumb-url", route('user.post.index'))
@section("to-breadcrumb", "Dashboard")

@section("content")
    <div class="container">
        <form role="form" action="{{ route('user.post.update', $post->id) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">

                <div class="col-md-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">
                                Edit post
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required
                                       placeholder="Enter post title" value="{{ old('title') ?? $post->title }}">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" data-max-height="5000" class="dropify"
                                       data-max-file-size="3mb"
                                       data-default-file="{{ old("image") ?? asset('storage/post/'.$post->image) }}"/>
                            </div>

                            <input type="checkbox" {{ $post->status == true ? 'checked':'' }} name="status"
                                   data-bootstrap-switch data-off-color="danger"
                                   data-on-color="success" data-on-text="Publish" data-off-text="Unpublish">
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">
                                Categories & Tags
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select Category</label>
                                <select name="categories[]" data-placeholder="Select Category" multiple="multiple"
                                        class="form-control select2bs4" id="select2" style="width: 100%;">
                                    <option value=""></option>
                                    @forelse($categories as $category)
                                        <option
                                            @foreach($post->categories as $postCategory)
                                            {{ $postCategory->id == $category->id ? 'selected' : ''}}
                                            @endforeach
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option disabled>
                                            <span class="text-danger">No category found!!!</span>
                                        </option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Select Tag</label>
                                <select name="tags[]" data-placeholder="Select Tag" multiple="multiple"
                                        class="form-control select2bs4" id="select3" style="width: 100%;">
                                    <option value=""></option>
                                    @forelse($tags as $tag)
                                        <option
                                            @foreach($post->tags as $postTag)
                                            {{ $postTag->id == $tag->id ? 'selected' : ''}}
                                            @endforeach
                                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @empty
                                        <option disabled>
                                            <span class="text-danger">No tag found!!!</span>
                                        </option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="btn-group">
                                <a href="{{ route('user.post.index') }}"
                                   class="btn btn-outline-danger m-t-15 waves-effect">BACK</a>
                                <button type="submit" class="btn btn-outline-primary m-t-15 waves-effect">SUBMIT
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title">
                                Body
                            </h1>
                        </div>
                        <div class="card-body">
                            <textarea name="body" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                {{ old('body') ?? $post->body }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
