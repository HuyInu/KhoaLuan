
<!DOCTYPE html>
<html lang="en">
<head>
        @include('chagePassword.changePasswordForm.head')
</head>
<body>
<div class="wrapper overlay-sidebar">
<div class="main-panel">
    <div class="content">
      <div class="col-md-3 ml-auto mr-auto">
        <h1> Đổi mật khẩu</h1>
        <form id="doiMatKhauForm">
          <input type="hidden" name="token"  value="{{$token}}">
          <!-- Email input -->
          <div class="form-group" id="email-form-group">
            <label class="form-label" for="Email">Địa chỉ Email:</label>
            <input type="email" id="Email" name="Email" class="form-control" value="{{$Email}}" />
          </div>
          <!-- Password input -->
          <div class="form-group" id="password-form-group">
            <label class="form-label" for="password">Mật khẩu mới:</label>
            <input type="password" id="password" name="password" class="form-control" />
          </div>
          <!-- Password repeat input -->
          <div class="form-group">
            <label class="form-label" for="passwordRepeat">Nhập lại mật khẩu:</label>
            <input type="password" id="passwordRepeat" name="passwordRepeat" class="form-control" />
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4 ">Đổi mật khẩu</button>
          @csrf
        </form>
      </div>
    </div>
</div>
</div>


</body>
<footer>
  @include('chagePassword.changePasswordForm.foot')
</footer>
</html>
