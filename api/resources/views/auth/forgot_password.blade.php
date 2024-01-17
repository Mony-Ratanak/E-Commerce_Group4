<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
  }
  /* body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #000;
  } */
  section{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 25rem;
    margin-right: 20rem;
    margin-top: 5rem;
  }
  .login-box{
    margin-top: 3rem;
    position: relative;
    width: 400px;
    height: 450px;
    background: rgba(255, 255, 255, .2);
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;

  }
  h2{
    font-size: 2rem;
    color: blueviolet;
    text-align: center;
  }
  h5{
    margin-top: 10px;
    font-size: 1rem;
    color: blueviolet;
    text-align: center;
  }
  .input-box{
    position: relative;
    width: 310px;
    margin: 30px 0;
    border-bottom: 2px solid #fff;
  }
  .input-box label{
    position: absolute;
    top: 50%;
    left: 1px;
    transform: translateY(-50%);
    font-size: 1rem;
    color: #000;
  }
  .input-box input:focus~label,
  .input-box input:valid ~ label{
    top: -5px;
  }
  .input-box input{
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1rem;
    color: #000;
  }
  .input-box .icon{
    position:absolute;
    right: 8px;
    color: #000;
    font-size: 1.2rem;
    line-height: 57px;
  }
  .remember-forget{
    margin: -15px 0 15px;
    font-size: .9em;
    color: #000;
    display: flex;
    justify-content: space-between;
  }
  .remember-forget label input{
    margin-right: 3px;
  }
  .remember-forget a{
    color: #000;
    text-decoration: none;
  }
  .remember-forget a:hover{
    text-decoration: underline;
  }
  .submit{
    display: flex;
    justify-content: center;
  }
  button{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 160px;
    height: 40px;
    background: blueviolet;
    border: none;
    border-radius: 40px;
    cursor: pointer;
    font-size: 1rem;
    color: #000;
    font-weight: 500;
  }
  button:hover{
    background: #aea2d3;
  }
  .register-link{
    font-size: .9em;
    color: #000;
    text-align: center;
    margin: 25px 0 10px;
  }
  .register-link p a{
    color: #000;
    text-decoration: none;
    font-weight: 600;
  }
  .register-link p a:hover{
    text-decoration: underline;
  }
  .logo{
    /* position: absolute; */
    /* margin-right: 20rem; */
  }
  .logo img{
    width: 700px;
    /* margin-right: 20rem; */
    background-size: cover;
    background-position: center;
  }
  .test_suc{
    position: absolute;
    margin-top: -100px;
    margin-left: -2.3rem;
  }
</style>
<body style="background: #e3b7b7;">
  <section>
    <div class="login-box" >
      <form action="{{ route('forgot-password') }}" method="post">
      @if(Session::has('success'))
        <div class="alert alert-success test_suc" >{{Session::get('success')}}</div> 
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div> 
        @endif
          @csrf
        <h2>Change password</h2>
         <div class="input-box">
            <span class="icon"><ion-icon name= "mail"></ion-icon> </span>
            <input type="email" require placeholder="Enter your email" name="email" value="{{old('email')}}">
            <label for="email">Email</label>
            <span class="text-danger">@error('email') {{ $message }} @enderror </span>

         </div>
         <div class="input-box">
            <span class="icon"><ion-icon name= "lock-closed"></ion-icon> </span>
            <input type="password" require placeholder="Enter your new password" name="new_password">
            <label for="password">New password</label>
            <span class="text-danger">@error('password') {{ $message }} @enderror </span>
         </div>
         <div class="input-box">
            <span class="icon"><ion-icon name= "lock-closed"></ion-icon> </span>
            <input type="password" require placeholder="Comfirm your password" name="confirm_password">
            <label for="password">Comfirm Password</label>
            <span class="text-danger">@error('password') {{ $message }} @enderror </span>
         </div>

         <div class="submit">
          <button type="submit">Reset</button>
         </div>
          
         <div class="register-link">
            <p>Already change your password
            <a href="login">Go Back</a></p>
         </div>
         
      </form>
   </div>
   <div class="logo"><img src="{{ asset('photo/icon1.png') }}" alt=""></div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>