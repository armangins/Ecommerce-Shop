@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form autocomplete="off" action="{{url('cms/content/'.$item['id'])}}" action="" method="POST">
        @csrf{{ method_field('PUT') }}
        <input type="hidden" name="item_id" value="{{$item['id']}}">
        <div class="row">
            <div class="col-8">
                @if ($errors)
                <div class="form-group">
                    <label for="formGroupExampleInput">Title:</label>
                    <input name="title" value="{{$item['title']}}" type="text" class="form-control original-text" id="formGroupExampleInput">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Article:</label>
                    <textarea value='' class="form-control" name="article" id="article">{{$item['article']}}</textarea>
                </div>
                <div class="  form-group">
                    <label for="menu-id">Menu links:</label>
                    <select class="mx-auto form-control" name="menu_id" id="menu-id">
                        @foreach ($menu as $nav)
                        <option @if($item['menu_id']==$nav['id']) selected="selected" @endif value="{{$nav['id']}}">{{$nav['link']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input value="Save" name="submit" type="submit" class=" btn btn-primary form-control" id="formGroupExampleInput2"
                        placeholder="Another input">
                </div>
            </div>
            <div class="col-4 mt-5">
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
            @endif
        </div>
    </form>
</main>
@endsection
