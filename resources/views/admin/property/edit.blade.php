@extends('admin.master')
@section('title', 'property-edit')
@section('page_title', 'Property edit')
@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Property Edit</h4>
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
                <form action="{{ route('admin.property.update',$data->id) }}" method="POST" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Property Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $data->name }}">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Description</label>
                                        <textarea name="description" id="" cols="30" rows="10" class="summernote form-control">{{ $data->description }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 property_meta_section">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Property Meta</label>
                                    </div>
                                    <table class="table table-bordered property_meta">
                                        <thead>
                                            <th>SN</th>
                                            <th>Meta Key</th>
                                            <th>Meta Value</th>
                                            <th><button type="button" class="btn btn-warning btn-add">+</button></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="sn">1</td>
                                                <td>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="property_meta_key[]" placeholder="eg: length">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="property_meta_value[]" placeholder="eg: 30ft">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-danger btn-remove">-</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12 property_meta_data_section">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Meta Data</label>
                                    </div>
                                    <table class="table table-bordered property_meta_data">
                                        <thead>
                                            <th>SN</th>
                                            <th>Meta Key</th>
                                            <th>Meta Value</th>
                                            <th><button type="button" class="btn btn-warning btn-add">+</button></th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="sn">1</td>
                                                <td>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="meta_data_key[]" placeholder="eg: water">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="meta_data_value[]" placeholder="eg: available">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-danger btn-remove">-</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="{{ $data->get_image() }}" alt="" width="50%">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label"> Feature Image</label>
                                        <input type="file" name="image" id="" class="form-control" accept="image/*">
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @if($data->additional_image !=NULL)
                                    <div class="row my-3">
                                        @foreach($data->additional_image as $additional)
                                        <div class="col-md-3">
                                            <div class="image-items">
                                                <a href="">X</a>
                                                <img src="{{ url($additional) }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label"> Additional Image</label>
                                        <input type="file" name="additional_image[]" id="" class="form-control" accept="image/*" multiple>
                                        @error('additional_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @if($data->get_gallery()->isNotEmpty())
                                    <div class="row my-3">
                                        @foreach($data->get_gallery() as $gallery)
                                        <div class="col-md-3">
                                            <div class="image-items">
                                                <a href="">X</a>
                                                <img src="{{ url($gallery->path) }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label"> Gallery Image</label>
                                        <input type="file" name="gallery_image[]" id="" class="form-control" accept="image/*" multiple>
                                        @error('additional_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label"> Price</label>
                                        <input type="text" name="price" id="" class="form-control" value="{{ $data->price }}">
                                        @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="card p-2 my-2">
                                        <div class="form-group">
                                            <label for="" class="col-form-label form-label">Select Category</label>
                                            @error('property_category')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                       
                                        @foreach(property_category() as $pcat)
                                        @if( $data->property_category !=NULL && in_array($pcat->id,$data->property_category))
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="property_category[]" value="{{$pcat->id}}" id="checkbox_{{$pcat->slug ?? $pcat->id}}" checked>
                                            <label class="form-check-label" for="checkbox_{{$pcat->slug ?? $pcat->id}}">
                                               {{ $pcat->name }}
                                            </label>
                                        </div>
                                        @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="property_category[]" value="{{$pcat->id}}" id="checkbox_{{$pcat->slug ?? $pcat->id}}">
                                            <label class="form-check-label" for="checkbox_{{$pcat->slug ?? $pcat->id}}">
                                               {{ $pcat->name }}
                                            </label>
                                        </div>
                                        @endif
                                        @endforeach
                                       
                                   </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Location Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="location" class="form-control"
                                            value="{{ $data->location }}">
                                        @error('location')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Map Ifreme Url <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="map_ifreme" class="form-control"
                                            value="{{ $data->map_ifreme }}">
                                        @error('map_ifreme')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Video Url <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="video_url" class="form-control"
                                            value="{{ $data->video_url }}">
                                        @error('video_url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Available Status <span
                                                class="text-danger">*</span></label>
                                       <select name="available_status" id="" class="form-select">
                                        <option value="available" selected>Available</option>
                                        <option value="sold">Sold</option>
                                        <option value="not_available">Not Available</option>
                                       </select>
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Property Type <span
                                                class="text-danger">*</span></label>
                                       <select name="property_type" id="" class="form-select">
                                        <option value="">Select One</option>
                                        <option value="apartment">Appartment</option>
                                        <option value="house">House</option>
                                        <option value="land">Land</option>
                                        <option value="room">Room</option>
                                       </select>
                                        @error('property_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Property For <span
                                                class="text-danger">*</span></label>
                                       <select name="property_for" id="" class="form-select">
                                        <option value="">Select One</option>
                                        <option value="rent">Rent</option>
                                        <option value="shell">Shell</option>
                                       </select>
                                        @error('property_for')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Provience Name <span
                                                class="text-danger">*</span></label>
                                       <select name="provience_id" id="provience" class="form-select">
                                        <option value="">Select One</option>
                                        @foreach(provience() as $provience)
                                        @if($provience->id == $data->provience_id )
                                        <option value="{{ $provience->id }}" selected>{{ $provience->province_name ?? 'N/A' }}</option>
                                        @else
                                        <option value="{{ $provience->id }}">{{ $provience->province_name }}</option>
                                        @endif
                                        @endforeach
                                       </select>
                                        @error('provience_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">District Name <span
                                                class="text-danger">*</span></label>
                                       <select name="district_id" id="district" class="form-select">
                                        <option value="{{ $data->district_id }}">{{ get_district($data->district_id)->district_name ?? 'N/A' }}</option>
                                       </select>
                                        @error('district_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Local Name <span
                                                class="text-danger">*</span></label>
                                       <select name="local_id" id="local" class="form-select">
                                        <option value="{{ $data->local_id }}">{{ get_local($data->local_id)->municipal_name ?? 'N/A' }}</option>
                                       </select>
                                        @error('local_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label form-label">Ward No <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="ward_no" class="form-control"
                                            value="{{ $data->ward_no }}">
                                        @error('ward_no')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group my-2">
                                <button name="status" value="publish" class="btn btn-danger btn-sm"
                                    type="submit">Publish</button>
                                <button name="status" value="draft" class="btn btn-info btn-sm"
                                    type="submit">draft</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script>
    js_colum_colne('property_meta','btn-add','btn-remove','sn');
    js_colum_colne('property_meta_data','btn-add','btn-remove','sn');

    $(document).ready(function(){
        $('#provience').on('change',function(){
            var pid = $(this).val();
            $.ajax({
                type: "GET",
                url : "?pid="+pid,
                success:function(res){
                    $('#district').empty().append("<option>Select One</option>");;
                    if(res.success == true){
                        $.each(res.data, function(value,items){
                            // console.log(items);
                            
                            var item = "<option value='"+items.id+"'>" +items.district_name+ "</option>"
                            $('#district').append(item);
                        });
                    }
                },
                error: function(error){
                    $('#district').empty();
                    console.error(error);
                },
            });
        });    

        // district base get local lavel

        $('#district').on('change',function(){
            var did = $(this).val();
            $.ajax({
                type: "GET",
                url : "?did="+did,
                success:function(res){
                    $('#local').empty().append("<option>Select One</option>");;
                    if(res.success == true){
                        $.each(res.data, function(value,items){
                            // console.log(items);
                            
                            var item = "<option value='"+items.id+"'>" +items.municipal_name+ "</option>"
                            $('#local').append(item);
                        });
                    }
                },
                error: function(error){
                    $('#district').empty();
                    console.error(error);
                },
            });
        });
    });
</script>
@endpush