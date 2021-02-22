@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h1>Add menu here</h1>
    <form autocomplete="off" action="{{url('cms/menu')}}" method="POST">
        @csrf
        <div class="col-6 mt-5">
            @if ($errors)
            <div class="form-group">
                <label for="formGroupExampleInput">Link name:</label>
                <input name="link" value="{{old('link')}}" type="text" class="form-control original-text" id="formGroupExampleInput"
                    placeholder="Enter link name">
                <span class="text-danger"> {{$errors->first('link')}}</span>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Link URL:</label>
                <input name="url" type="text" class="form-control target-text" id="formGroupExampleInput2" placeholder="Another input">
                <span class="text-danger"> {{$errors->first('url')}}</span>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Page title:</label>
                <input name="title" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                <span class="text-danger"> {{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <input name="submit" type="submit" class=" btn btn-primary form-control" id="formGroupExampleInput2"
                    placeholder="Another input">
            </div>
        </div>
        @endif
    </form>
</main>
@endsection
