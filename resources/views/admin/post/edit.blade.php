@extends('admin.master')
@section('title','post-update')
@section('page_title','post update')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">post update</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                            class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                            class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                            class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                            class="fa fa-times"></i></a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('post.update',$data->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Post Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                                    @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Content</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">{{ $data->description }}</textarea>
                                    @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                       </div>
                       
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                @if($data->image)
                                <img src="{{ url($data->image) }}" alt="" width="120px">
                                @else 
                                <img src="{{ url('no_image.jpg') }}" alt="" width="120px">
                                @endif
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> Feature Image</label>
                                    <input type="file" name="image" id="" class="form-control">
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label"> Select Category</label>
                                    <select name="category_id" id="" class="form-select" aria-placeholder="Select One">
                                        <option value="">-- select one --</option>
                                        @foreach(categoryAll() as $catdata)
                                        @if($catdata->id == $data->category_id)
                                        <option value="{{ $catdata->id }}" selected>{{ $catdata->name }}</option>
                                        @else
                                        <option value="{{ $catdata->id }}">{{ $catdata->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            @if($data->postMeta() !=NULL)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label form-label">Icon</label>
                                    <input type="text" name="icon" class="form-control" value="{{ $data->postMeta()->meta_value }}" placeholder="fa fa-document">
                                    @error('icon') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                 
                   
                    
                    <div class="col-md-12">
                        <div class="form-group my-2">
                            <button name="status" value="publish" class="btn btn-danger btn-sm" type="submit">Publish</button>
                            <button name="status" value="draft" class="btn btn-info btn-sm" type="submit">draft</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection