<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center; 
        }
        input[type="text"], input[type="password"] {
            width: 75%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 50%;
            background-color: #0032f8;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input type="text" name="email" placeholder="Write your email here" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <input type="submit" name="login" value="Login">
        </form>
        
        @if($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: rgb(255, 0, 0)">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
        <p> <a href="{{ route('password.request') }}"> Forget password ? </a> </p>
    </div>
</body>
</html>