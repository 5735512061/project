@extends('admin/template')
<form action="postImport" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="products">
	<input type="submit" value="Import"></input>
</form>
<a href="{{url('/products')}}">back</a>