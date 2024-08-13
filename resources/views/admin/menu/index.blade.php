@extends('admin.master')
@section('title','menu managemeny')
@section('page_title','menu management')
@section('body')

<div class="row">
    <div class="col-md-12">
        @include('message.message')
    </div>
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Main Menu</h4>
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
                <form action="{{ route('menu.store.main') }}" class="form-horizontal" method="POST">
                    @csrf 
                    <input type="hidden" name="parent_id" value="0">
                    <input type="hidden" name="menu_position" value="1">
                    <div class="row">
                        @forelse ($allitems as $item)
 
                      @if($item['menu_type']== 'Category')
                      @if(menu_toggle($item['id'],'Category',1) == false)
                        @if(menu_exists($item['id'],'Category',1)==false)
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'Category'}" id="flexCheckDefault" name="menuvalue[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    {{ $item['name'] ?? $item['title'] }}
                                    </label>
                                </div>
                            </div>
                            @else
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'Category'}" id="flexCheckDefault" name="menuvalue[]" checked>
                                    <label class="form-check-label" for="flexCheckDefault">
                                    {{ $item['name'] ?? $item['title'] }}
                                    </label>
                                </div>
                            </div>
                            @endif
                            @endif
                        @elseif($item['menu_type']== 'Page')
                            @if(menu_toggle($item['id'],'Page',1) == false)
                            @if(menu_exists($item['id'],'Page',1)==false)
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'Page'}" id="flexCheckDefault" name="menuvalue[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item['name'] ?? $item['title'] }}
                                        </label>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'Page'}" id="flexCheckDefault" name="menuvalue[]" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item['name'] ?? $item['title'] }}
                                        </label>
                                    </div>
                                </div>
                                @endif
                                @endif
                        @elseif($item['menu_type']== 'AwardCategory')
                            @if(menu_toggle($item['id'],'AwardCategory',1) == false)
                                @if(menu_exists($item['id'],'AwardCategory',1)==false)
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'AwardCategory'}" id="flexCheckDefault" name="menuvalue[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item['name'] ?? $item['title'] }}
                                        </label>
                                    </div>
                                </div>
                                @else 
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'AwardCategory'}" id="flexCheckDefault" name="menuvalue[]" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item['name'] ?? $item['title'] }}
                                        </label>
                                    </div>
                                </div>
                                @endif
                            @endif
                        @endif
                      
                        @empty
                            <div class="col-md-12">
                                No Items Found
                            </div>
                        @endforelse
                       
                       
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-danger btn-sm my-2">Publish</button>
                        </div>
                    </div>
                </form>
            </div>
         </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Sub Menu</h4>
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
                <form action="{{ route('menu.store.sub') }}" class="form-horizontal" method="POST">
                    @csrf 
                    {{-- <input type="hidden" name="parent_id" value="0"> --}}
                    <input type="hidden" name="menu_position" value="2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-form-label form-label">Main Category</label>
                                <select name="parent_menu" id="" class="form-select">
                                    <option value="">Select One</option>
                                    @foreach($menus as $main_menu)
                                    <option value="{'menu_id':{{$main_menu->menu_id}},'menu_type':'{{$main_menu->menu_type}}'}">{{ menu_name($main_menu->menu_id,$main_menu->menu_type) }}</option>
                                    @endforeach
                                </select>
                               @error('parent_menu') <p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="submenu_items">
                                <div class="row">
                                    @forelse ($allitems as $item)
 
                                    @if($item['menu_type']== 'Category')
                                    @if(menu_toggle($item['id'],'Category',1) == false)
                                      @if(menu_exists($item['id'],'Category',1)==false)
                                          <div class="col-md-2">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'Category'}" id="flexCheckDefault" name="menuvalue[]">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                  {{ $item['name'] ?? $item['title'] }}
                                                  </label>
                                              </div>
                                          </div>
                                          @else
                                          <div class="col-md-2">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'Category'}" id="flexCheckDefault" name="menuvalue[]" checked disabled>
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                  {{ $item['name'] ?? $item['title'] }}
                                                  </label>
                                              </div>
                                          </div>
                                          @endif
                                          @endif
                                      @elseif($item['menu_type']== 'Page')
                                          @if(menu_toggle($item['id'],'Page',1) == false)
                                          @if(menu_exists($item['id'],'Page',1)==false)
                                              <div class="col-md-2">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'Page'}" id="flexCheckDefault" name="menuvalue[]">
                                                      <label class="form-check-label" for="flexCheckDefault">
                                                      {{ $item['name'] ?? $item['title'] }}
                                                      </label>
                                                  </div>
                                              </div>
                                              @else
                                              <div class="col-md-2">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'Page'}" id="flexCheckDefault" name="menuvalue[]" checked disabled>
                                                      <label class="form-check-label" for="flexCheckDefault">
                                                      {{ $item['name'] ?? $item['title'] }}
                                                      </label>
                                                  </div>
                                              </div>
                                              @endif
                                              @endif
                                      @elseif($item['menu_type']== 'AwardCategory')
                                      @if(menu_toggle($item['id'],'AwardCategory',1) == false)
                                          @if(menu_exists($item['id'],'AwardCategory',1)==false)
                                          <div class="col-md-2">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'AwardCategory'}" id="flexCheckDefault" name="menuvalue[]">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                  {{ $item['name'] ?? $item['title'] }}
                                                  </label>
                                              </div>
                                          </div>
                                          @else 
                                          <div class="col-md-2">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="checkbox"  value="{'id':{{ $item['id'] }},'type':'AwardCategory'}" id="flexCheckDefault" name="menuvalue[]" checked disabled>
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                  {{ $item['name'] ?? $item['title'] }}
                                                  </label>
                                              </div>
                                          </div>
                                          @endif
                                      @endif
                                      @endif
                                    
                                      @empty
                                          <div class="col-md-12">
                                              No Items Found
                                          </div>
                                      @endforelse
                                </div>
                               
                            </div>
                        </div>
                       
                       <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-danger btn-sm my-2" type="submit">Create</button>
                        </div>
                       </div>
                       
                    </div>
                </form>
            </div>
         </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">

            <div class="panel-heading">
                <h4 class="panel-title">Sub Menu List</h4>
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
                            <th class="text-nowrap">Menu Name</th>
                            <th class="text-nowrap">Main Menu Name</th>
                            <th class="text-nowrap">Created At</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @include('message.message')
                        @foreach(sub_menu_list() as $data)
                        <tr class="odd gradeX">
                            <td width="1%" class="fw-bold">{{ $i++ }}</td>
                            <td>{{ menu_name($data->menu_id,$data->menu_type) }} </td>
                            <td>
                                
                                <?php 
                                // print_r($data->parent_menu) ;
                               ?>
                                {{ menu_name($data->parent_menu->menu_id,$data->parent_menu->menu_type) ?? 'N/A' }}</td>
                            <td>{{ $data->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                            <td> 
                                @if($data->status == 'draft')
                                <span class="badge bg-danger">Draft</span>
                                @else
                                <span class="badge bg-success">publish</span>
                                @endif    
                            </td>
                            <td>
                                
                                {{-- <a href="{{ route('page.edit',$data->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> --}}
                                <a href="{{ route('menu.delete.sub',$data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash"></i></a>

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