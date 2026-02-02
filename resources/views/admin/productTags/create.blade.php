@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.product.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categories_id">{{ trans('cruds.product.fields.categories') }}</label>
                <select onchange="SubCategory(this.value);" class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories_id" id="categories_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('categories_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.categories_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_categories_id">{{ trans('cruds.product.fields.sub_categories') }}</label>
                
                <select class="form-control select2 {{ $errors->has('sub_categories') ? 'is-invalid' : '' }}" name="sub_categories_id" id="sub_categories_id" required>
                    <!-- @foreach($sub_categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('sub_categories_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach -->
                </select>
                @if($errors->has('sub_categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.sub_categories_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function SubCategory(cat_id){
        $.ajax({
                    url: '/myform',
                    type: "GET",
                    data: {cat_id:cat_id},
                    success:function(data) {
                        console.log(data);
                        $('select[name="sub_categories_id"]').empty();
                        // $i=0;
                        $.each(data, function(key, value) {
                            $('select[name="sub_categories_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            // $i++;
                        });
                    },
                    error:function(data){
                        alert('error:');
                    }
                
                });
    }
</script>

@endsection