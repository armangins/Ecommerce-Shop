@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form enctype="multipart/form-data" autocomplete="off" action="{{url('cms/products')}}" method="POST">
        @csrf
        <div class="col-6">
            @if ($errors)
            <div class="form-group">
                <label for="formGroupExampleInput2">Product title:</label>
                <input name="title" type="text" class="form-control original-text" id="formGroupExampleInput2"
                    placeholder="Another input">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">URL:</label>
                <input name="url" type="text" class="form-control target-text" id="formGroupExampleInput2" placeholder="Another input">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Price:</label>
                <input name="price" type="text" class="form-control " id="formGroupExampleInput2" placeholder="Another input">
            </div>
            <div class="  form-group">
                <label for="categorie_id">Category links:</label>
                <select class="mx-auto form-control" name="categorie_id" id="categorie_id">
                    <option name="categorie_id" class="text-center" value="Choose menu link please">Select category...</option>
                    @foreach ($categories as $category)
                    <option name="categorie_id" @if(old('categorie_id')==$category['id']) selected="selected" @endif value="{{$category['id']}}">{{$category['ctitle']}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Article:</label>
                <textarea value='' class="form-control" name="article" id="article"></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <input name="submit" type="submit" class=" btn btn-primary form-control" id="formGroupExampleInput2"
                    placeholder="Another input">
            </div>
        </div>
        @endif
    </form>
    @if ($errors->any())
    <div style="color:red" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    </div>
</main>
@endsection
