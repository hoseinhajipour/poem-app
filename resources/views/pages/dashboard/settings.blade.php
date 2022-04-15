<div class="container" dir="rtl">
    <div class="row">
        <div class="col-12">
            <a href="{{route('MyQuizz')}}" data-turbolinks="false" class="btn3d btn btn-primary form-control">
                <span>سوال خودت رو بساز</span>
                <i class="fas fa-question"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <button class="btn3d btn btn-primary form-control ">
                <span>تنظیمات</span>
                <i class="fas fa-cog"></i>
            </button>
        </div>
        <div class="col-6">
            <button class="btn3d btn btn-primary form-control ">
                <span>پشتیبانی</span>
                <i class="fas fa-life-ring"></i>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <a href="{{route('editProfile')}}"
               data-turbolinks="false"
               class="btn3d btn btn-primary form-control ">
                <span>ویرایش پروفایل</span>
                <i class="fas fa-user"></i>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button class="btn3d btn btn-primary form-control"
                    data-bs-toggle="modal" data-bs-target="#logoutAlert">
                <span>خروج از حساب کاربری</span>
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </div>
    </div>


    <div class="modal fade" id="logoutAlert" tabindex="-1" data-bs-backdrop="false"
         aria-labelledby="logoutAlert" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>مطمنی می خوای خارج بشی؟!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">نه</button>
                    <button type="button"
                            wire:click="logout()"
                            class="btn btn-primary" data-bs-dismiss="modal">آره
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
</div>

