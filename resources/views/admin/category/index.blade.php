@extends('admin.master')
@section('title','Display Category')
@section('page_title','All Category')
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Table - Category</h4>
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


            <div class="panel-body">
                <table id="data-table-default"
                    class="table table-striped table-bordered align-middle w-100 text-nowrap">
                    <thead>
                        <tr>
                            <th width="1%"></th>
                            <th class="text-nowrap">Category Name</th>
                            <th class="text-nowrap">Slug</th>
                            <th class="text-nowrap">Category Lavel</th>
                            <th class="text-nowrap">parent Id</th>
                            <th class="text-nowrap">No of Post</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach($category as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td>{{ $data->name ?? 'N/A' }} </td>
                            <td>{{ $data->slug ?? 'N/A' }}</td>
                            <td>
                                @if($data->category_level == 1)
                                <span class="badge bg-primary">Second</span>
                                @elseif($data->user_type == 2)
                                <span class="badge bg-danger">Third</span>
                                @else
                                <span class="badge bg-success">first</span>
                                @endif
                            </td>
                            <td>{{ $data->parent_id ?? 'main category' }}</td>
                            <td>
                                @if($data->post_count() >0)
                                <a href="{{ route('post.index') }}?category_id={{$data->id}}">{{ $data->post_count() }}</a>
                                @else 
                                No post found
                                @endif
                            </td>
                            <td> 
                                @if($data->status == 'draft')
                                <span class="badge bg-danger">Draft</span>
                                @else
                                <span class="badge bg-success">publish</span>
                                @endif    
                            </td>
                            <td>
                                
                                <a href="{{ route('category.edit',$data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('category.delete',$data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                     
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="hljs-wrapper">
                <pre><code class="html" data-url="{{url('admin/data/table-manage/default.json')}}"></code></pre>
            </div>

        </div>
    </div>
</div>

@endsection