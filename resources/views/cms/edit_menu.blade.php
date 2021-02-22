@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h3> Edit the menu links </h3>
    <hr>
<form autocomplete="off" action="{{url('cms/menu/'.$item['id'])}}" action="" method="POST">
        @csrf
<input type="hidden" name="item_id" value="{{$item['id']}}">
        {{ method_field('PUT') }}
        <div class="col-6">
            @if ($errors)
            <div class="form-group">
                <label for="formGroupExampleInput">Link name:</label>
                <input name="link" value="{{$item['link']}}" type="text" class="form-control original-text" id="formGroupExampleInput"
                    placeholder="Enter link name">
                <span class="text-danger"> {{$errors->first('link')}}</span>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Link URL:</label>
                <input name="url" value="{{$item['url']}}" type="text" class="form-control target-text" id="formGroupExampleInput2"
                    placeholder="Another input">
                <span class="text-danger"> {{$errors->first('url')}}</span>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Page title:</label>
                <input name="title" value="{{$item['title']}}" type="text" class="form-control" id="formGroupExampleInput2"
                    placeholder="Another input">
                <span class="text-danger"> {{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <input value="Save" name="submit" type="submit" class=" btn btn-success form-control" id="formGroupExampleInput2"
                            placeholder="Another input">
                    </div>
                    <div class="col-6">
                        <p><a class="btn btn-danger" href="{{url('cms/menu')}}">Go back</a></p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </form>
</main>
@endsection
