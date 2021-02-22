@extends('cms.cms_master')
@section('main_cms')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  border-bottom">
        <h1 class="h2">Orders List</h1>
        <hr>
    </div>
    <div class="row">
        <div class="col-9 mx-auto mt-5">
            <table class="table table-striped table">
                <thead class="" style="background-color:#38ada9">
                    <tr>
                        <th class="text-center" scope="col">User</th>
                        <th class="text-center" scope="col">Total Price</th>
                        <th class="" scope="col">Order details</th>
                        <th class="" scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td class="text-center">{{$order->name}}</td>
                        <td class="text-center">${{$order->total}}.00</td>
                        <td class="">
                            <ol>
                                @foreach (unserialize($order->data) as $item)
                            <li> Product:{{$item['name']}},price : ${{$item['price']}}.00,Quantity: {{$item['quantity']}}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td class="">
                            {{date('d/m/Y', strtotime($order->created_at))}}
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <p class="mt-3"><a class=" btn btn-primary" href="{{url('cms/menu/create')}}"> <i class="fas fa-plus"></i> add new menu </a> </p> --}}
        </div>
    </div>
   

</main>
@endsection
