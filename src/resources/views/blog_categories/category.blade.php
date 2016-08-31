@extends('admin::layouts.admin')

@section('admin-content')

	<h1>Category Info</h1>

	<form action="blog/categories/save/{{ $category->id or 'new'}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}

			@if ($errors->first('title'))
			    <div class="alert alert-error no-hide">
			        <span class="help-block">
			            <strong>{{ $errors->first('title') }}</strong>
			        </span>
			    </div>
			@endif 

		<label>Title</label>
		<input type="text" name="title" value="{{ $category->title or old('title') }}">

			@if ($errors->first('subtitle'))
			    <div class="alert alert-error no-hide">
			        <span class="help-block">
			            <strong>{{ $errors->first('subtitle') }}</strong>
			        </span>
			    </div>
			@endif 

		<label>Subtitle</label>
		<input type="text" name="subtitle" value="{{$category->subtitle or old('subtitle')}}">

			@if ($errors->first('uri'))
			    <div class="alert alert-error no-hide">
			        <span class="help-block">
			            <strong>{{ $errors->first('uri') }}</strong>
			        </span>
			    </div>
			@endif 		

		<label>URI</label>
		<input type="text" name="uri" value="{{$category->uri or old('uri')}}" disabled>

		<label>Excerpt</label>
		<textarea name="excerpt" class="htmlEditorTools" rows="5">{{$category->excerpt or old('excerpt')}}</textarea>

			@if ($errors->first('description'))
			    <div class="alert alert-error no-hide">
			        <span class="help-block">
			            <strong>{{ $errors->first('description') }}</strong>
			        </span>
			    </div>
			@endif 

		<label>Description</label>
		<textarea name="description" class="htmlEditor" rows="15" data-page-name="category" data-page-id="{{$category->id}}" id="editor-{{ str_replace('.', '', $category->id) }}">{{$category->description or old('description')}}</textarea>

		<label>Thumbnail</label>
		<div class="file-input-wrap cf">
			@if(!empty($category->thumb)) 
				<div class="small-image-preview" style="background-image: url(uploads/{{$category->thumb}})"></div>
				<input type="checkbox" name="delete_thumb">Delete this file?
			@else
				<div class="fileUpload">
					<span>Choose file</span>
					<input type="file" name="thumb"/>
				</div>
			@endif
		</div>

		<label>Menu Order</label>
		<select name="menu_order">
			@foreach ($blogs as $key => $value)
				<option value="{{$key}}" @if($key==$category->menu_order) selected @endif>{{$key}}</option>
			@endforeach

			@if (empty($category->id))
				<option value="0" selected>0</option>
			@endif
		</select>

		<label>SEO Title</label>
		<input type="text" name="seo_title" value="{{$category->seo_title or old('seo_title')}}">

		<label>SEO Description</label>
		<input type="text" name="seo_description" value="{{$category->seo_description or old('seo_description')}}">

		<label>SEO Keywords</label>
		<input type="text" name="seo_keywords" value="{{$category->seo_keywords or old('seo_keywords')}}">

		<input type="submit" value="Save">

		@if ($category->id)
			<a class="button remove-item" href="blog/categories/delete/{{$category->id}}">Delete</a>
		@endif
	</form>
<script>
	
	$('input[name="title"]').keyup(function() {
		$('input[name="uri"]').val($(this).val().replace(' ', '-'));
	})
</script>
@stop