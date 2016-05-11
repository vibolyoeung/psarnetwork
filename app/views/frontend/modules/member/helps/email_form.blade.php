<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <style type="text/css">
        body {
  background: #456;
  font-family: 'Open Sans', sans-serif;
}

.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #17c;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}
    </style>
  </head>
  <body>
    <div class="login">
        <div class="login-triangle"></div>
        <h2 class="login-header">
            Email
        </h2>
      <form action="{{URL::to('/member/help/forget')}}" method="post" id="LoginForm" class="login-container">
        @if(Session::has('hasError'))
            <p style="color: red;">Please provide your correct email!</p>
        @endif
        @if(Session::has('hasErrorSendMail'))
            <p style="color: red;">
                Email can not send!
            </p>
        @endif
        <p>
            {{
                Form::input(
                  'email',
                   'forgetEmail',
                   null,
                   [
                    'class' => 'form-control',
                    'required'=>'required',
                    'placeholder'=>'Email'
                   ]
                )
            }}
        </p>

        <p>
            <input 
                type="submit" 
                name="btnSubmitEmail" 
                value="Send" 
            />

        </p>
      </form>
    </div>
  </body>
</html>