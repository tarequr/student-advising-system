<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Reset Password</title>
  <link rel="stylesheet" href="{{ asset('backEnd/assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('backEnd/assets/img/favicon.ico') }}" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>{{ __('Forgot Password') }}</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                  <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('Send Password Reset Link') }}
                    </button>
                    <P style="float: right">Do you want to back ? <a href="{{ route('login') }}">click here</a></P>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{{ asset('backEnd/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('backEnd/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('backEnd/assets/js/custom.js') }}"></script>
</body>

</html>
