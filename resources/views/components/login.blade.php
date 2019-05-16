<div class="nav-user">
    <span class="btn-close js-close-user">&times;</span>
    <div class="user-content">
        <div class="user-title row">
            <h4 class="col-md-6 col-sm-12 col-12" id="btn-in">Đăng nhập</h4>
            <h4 class="col-md-6 col-sm-12 col-12 nav-title-click" id="btn-up">Đăng ký</h4>
        </div>
        <form action=" {{ route('dangnhap') }} " id="js-in" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="user-small" id="small-in"></div>
            <div class="form-groud">
                <input type="email" placeholder="Your email" autocomplete="off" id="emailSI" name="emailSI" required>
            </div>
            <div class="form-groud">
                <input type="password" placeholder="Password" id="passSignIn" name="passSI" required>
            </div>
            <input type="submit" value="Đăng nhập" class="js-login">
            {{ csrf_field() }}
        </form>
        <form action="{{route('dangky')}}" id="js-up" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="user-small" id="small-up"></div>
            <div class="form-groud">
                <input type="text" placeholder="Your name" autocomplete="off" id="uname2" name="upName" required class="js-ajax-up">
            </div>
            <div class="form-groud">
                <input type="email" placeholder="Your email" autocomplete="off" id="uemail" name="upMail" required class="js-ajax-up js-email-up">
            </div>
            <div class="form-groud">
                <input type="password" placeholder="Password" id="password2" required name="upPass" class="js-pass-up">
            </div>
            <input type="submit" value="Đăng ký" class="js-dangky">
            {{ csrf_field() }}
        </form>
    </div>
</div>
