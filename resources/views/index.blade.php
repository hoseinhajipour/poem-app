@section('title', 'Index')

<div class="d-grid col-lg-4 mx-auto">
    <div class="card">
        <div class="card-body">
            <div align="center">
                <img src="{{ Voyager::image(setting('site.logo')) }}"
                     class="shadow rounded"
                     width="256"/>
            </div>
            <a href="{{route('login')}}" class="btn3d btn btn-primary form-control">ورود به حساب کاربری</a>
            <a href="{{route('register')}}" class="btn3d btn btn-success form-control">ایجاد حساب کاربری</a>
        </div>
    </div>
</div>
