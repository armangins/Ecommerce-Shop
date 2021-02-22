@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <form autocomplete="off" action="{{url('cms/menu/'.$item_id)}}" method="POST">
        @csrf
        {{ method_field('DELETE') }}
        <h3>Are you sure you want to delete this menu ?</h3>
        <div class="row p-2">
                <input class="btn btn-success " type="submit" value="Delete ">
                <a class="btn btn-danger ml-2" href="{{url('cms/menu')}}">Cancel</a>
        </div>
    </form>
</main>
@endsection
