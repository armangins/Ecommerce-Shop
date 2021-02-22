@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form  autocomplete="off" action="{{url('cms/products/'.$item['id'])}}" enctype="multipart/form-data" action="" method="POST">
        @csrf
<input type="hidden" name="item_id" value="{{$item['id']}}">
        {{ method_field('PUT') }}
        <div class="row">
        <div class="col-5">
            @if ($errors)
            <div class="form-group">
                <label for="formGroupExampleInput2">Product title:</label>
                <input value="{{$item['ptitle']}}"  name="title" type="text" class="form-control original-text" id="formGroupExampleInput2"
                    placeholder="Another input">   
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">URL:</label>
            <input value="{{$item['purl']}}" name="url" type="text" class="form-control target-text" id="formGroupExampleInput2" placeholder="Another input">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Price:</label>
                <input value="{{$item['price']}}" name="price" type="text" class="form-control " id="formGroupExampleInput2" placeholder="Another input">
            </div>
            <div class="  form-group">
                <label for="category-id">Category links:</label>
                <select class="mx-auto form-control" name="categorie_id" id="category-id">
                   
                    @foreach ($categories as $category)
                <option @if($item['categorie_id']==$category['id']) selected="selected"  @endif value="{{$category['id']}}">{{$category['ctitle']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Article:</label>
            <textarea value='' class="form-control" name="article" id="article">{{$item['particle']}}</textarea>
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
    <div class="col-7 mt-5">
    <img src="{{asset('Images/products/'.$item['pimage'])}}" alt="">  
    </div>
</div>
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
