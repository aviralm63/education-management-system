@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productTag.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-tags.update", [$productTag->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.productTag.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $productTag->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productTag.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categories_id">{{ trans('cruds.productTag.fields.categories') }}</label>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories_id" id="categories_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('categories_id') ? old('categories_id') : $productTag->categories->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productTag.fields.categories_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection