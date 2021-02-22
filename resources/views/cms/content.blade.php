@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  border-bottom">
        <h1 class="h2">Content</h1>
        <hr>
    </div>
    <div class="row">
        <div class="col-8 mx-auto mt-5">
            <table class="table table-striped table">
                <thead class="" style="background-color:#38ada9">
                    <tr>
                        <th class="text-center" scope="col">Article title</th>
                        <th class="text-center" scope="col">Last update</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $text)
                    <tr>
                        <td class="text-center">{{$text['title']}}</td>
                        <td class="text-center">
                            {{date('d/m/Y', strtotime($text['updated_at']))}}
                        </td>
                        <td class="text-center"><a href="{{url('cms/content/'.$text['id'].'/edit')}}"><i class="fas fa-marker"></i>Edit</a> |
                        <a href="{{url('cms/content/'.$text['id'])}}"><i class="far fa-trash-alt"> </i>Delete </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="mt-3"><a class=" btn btn-primary" href="{{url('cms/content/create')}}"> <i class="fas fa-plus"></i> Add Content </a> </p>
        </div>
    </div>
  

</main>
@endsection
