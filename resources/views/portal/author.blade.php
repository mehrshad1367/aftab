@extends('master')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary btn-user m-2" style="align-items: center" data-toggle="modal" data-target="#NewPost">
                {{__('msg.Make A New Post Here...')}}
            </button>
        </div>
    </div>
</div>

    <section class="content">
        <img src="{{asset('portal/dist/img/credit/author.jpg')}}" class="img-lg" style="width: 55%;height: auto ;margin-right: 270px; " alt="Cinque Terre">

    </section>
<div class="modal" id="NewPost">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-primary">{{__('msg.CreatePost')}}</h5>
            </div>
            <div class="modal-body">
                <p class="alert-danger" id="blank_message"></p>
                <p class="alert-success" id="done_message"></p>
                <form id="post-register-form">
                    <div>
                        <input type="hidden" class="myid form-controler p-2 m-1" name="id" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>{{__('msg.Title')}}</label><br>
                        <input type="text" class="form-controler p-2 m-1" name="firstname" placeholder="{{__('msg.Title')}}" id="firstName">
                    </div>
                    <div class="form-group">
                        <label>{{__('msg.Category')}}</label><br>
                        <input type="text" class="form-controler p-2 m-1" name="Lastname" placeholder="{{__('msg.Category')}}" id="lastName">
                    </div>
                    <div class="form-group">
                        <label>{{__('msg.description')}}</label><br>
                        <textarea  class="form-control" rows="5" id="description" name="description" placeholder="{{__('msg.Description')}}"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_register" onclick="insert_record()">{{__('msg.Submit')}}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_cancel">{{__('msg.Cancel')}}</button>
            </div>
        </div>

    </div>
</div>

@endsection
