@extends('layouts.web.index')
@section('content')
<div id="content"> 
    <!-- Linking -->
    <div class="linking">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Authentication</li>
        </ol>
      </div>
    </div>
    
    <!-- Blog -->
    <section class="login-sec padding-top-30 padding-bottom-100">
      <div class="container">
        <div class="row">
          <div class="col-md-6"> 
            <!-- Login Your Account -->
            <h5>Login Your Account</h5>
            
            <!-- FORM -->
            <form action="{{ route('login') }}" method="POST">
            @csrf
              <ul class="row">
                <li class="col-sm-12">
                  <label>Username
                    <input type="text" class="form-control" name="username" placeholder="">
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Password
                    <input type="password" class="form-control" name="password" placeholder="">
                  </label>
                </li>
                {{-- <li class="col-sm-6">
                  <div class="checkbox checkbox-primary">
                    <input id="cate1" class="styled" type="checkbox" >
                    <label for="cate1"> Keep me logged in </label>
                  </div>
                </li> --}}
                {{-- <li class="col-sm-6"> <a href="#." class="forget">Forgot your password?</a> </li> --}}
                <li class="col-sm-12 text-left">
                  <button type="submit" class="btn-round">Login</button>
                </li>
              </ul>
            </form>
          </div>
          
          <!-- Don’t have an Account? Register now -->
          <div class="col-md-6">
            <h5>Don’t have an Account? Register now</h5>
            
            <!-- FORM -->
            <form>
              <ul class="row">
                <li class="col-sm-12">
                  <label>Username
                    <input type="text" class="form-control" name="name" placeholder="">
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Email
                    <input type="password" class="form-control" name="pass" placeholder="">
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Password
                    <input type="password" class="form-control" name="pass" placeholder="">
                  </label>
                </li>
                <li class="col-sm-12 text-left">
                  <button type="submit" class="btn-round">Register</button>
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Clients img -->
    <section class="light-gry-bg clients-img">
      <div class="container">
        <ul>
          <li><img src="images/c-img-1.png" alt="" ></li>
          <li><img src="images/c-img-2.png" alt="" ></li>
          <li><img src="images/c-img-3.png" alt="" ></li>
          <li><img src="images/c-img-4.png" alt="" ></li>
          <li><img src="images/c-img-5.png" alt="" ></li>
        </ul>
      </div>
    </section>
    
    <!-- Newslatter -->
    <section class="newslatter">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Subscribe our Newsletter <span>Get <strong>25% Off</strong> first purchase!</span></h3>
          </div>
          <div class="col-md-6">
            <form>
              <input type="email" placeholder="Your email address here...">
              <button type="submit">Subscribe!</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@section('web.script')
<script type="text/javascript">

</script>
@endsection