@extends('master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h5 class="h3 mb-0 text-gray-800 text-capitalize">{{__('msg.Profile')}}</h5>
                </div>

                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <form action="{{url('profile/update',['id'=>$user->id])}}" method="post">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                        <!-- /.container-message -->

                            <input type="hidden" name="id" value="{{$user->name}}">
                            <button type="submit" class="btn btn-success">{{__('msg.Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

