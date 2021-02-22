@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form  autocomplete="off" action="{{url('cms/categories/'.$item['id'])}}" enctype="multipart/form-data" action="" method="POST">
        @csrf
<input type="hidden" name="item_id" value="{{$item['id']}}">
        {{ method_field('PUT') }}
        <div class="col-6">
            @if ($errors)
            <div class="form-group">
                <label for="formGroupExampleInput2">New category:</label>
                <input value="{{$item['ctitle']}}" name="title" type="text" class="form-control original-text" id="formGroupExampleInput2"
                    placeholder="Another input">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Link URL:</label>
                <input name="url" type="text" value="{{$item['curl']}}"  class="form-control target-text" id="formGroupExampleInput2" placeholder="Another input">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Article:</label>
                <textarea value="{{$item['carticle']}}" class="form-control" name="article" id="article"></textarea>
            </div>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01"> Change Image </span>
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
