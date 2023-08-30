<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
  
  body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
  }
  .formmm {
      max-width: 50%;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  }
  input[type="text"], input[type="password"], input[type="email"], input[type="date"] {
      width: 75%%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 3px;
  }
    #alert-danger{
        color:red 
    }
  select {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 3px;
  }
  input[type="submit"] {
      width: 75%;
      background-color: #4c5baf;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0032f8;
        }

        @media (max-width: 600px) {
        .formmm {
        max-width: 100%;
        }
        input[type="text"], input[type="password"], input[type="email"], input[type="date"], select {
            width: 75%%; 
        }
        }


        @media (max-width: 400px) {
            input[type="submit"] {
                font-size: 14px;
            }
            .popup-success {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #00cc00; /* Green color */
    color: white;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

        }

</style>
</head>
<body>
    @if(session('success'))
    <div class="popup-success">
        {{ session('success') }}
    </div>
@endif
    <div class="formmm">
        <h2>User Registration</h2>
   
            <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" id="re-password" placeholder="Reenter your password" required>
            <input type="checkbox" id="showPassword"> Show Password<br>
            <div id="password-strength"></div>
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <input type="date" name="birthdate" required>
            <input type="text" name="address" placeholder="Address" required>
            <input name="email"type="email" placeholder="Email" required>

            <div id="email-error" style="color: red;"></div>

            <input type="text" name="mobile" placeholder="Mobile" required>
            <input type="submit" name="register" value="Register">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
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

        </form>
    

    


        
    </div>
    <script>
        const passwordField = document.getElementById("password");
        const rePasswordField = document.getElementById("re-password");
        const showPasswordCheckbox = document.getElementById("showPassword");
        const passwordStrengthIndicator = document.getElementById("password-strength");
        const emailError = document.getElementById("email-error");

        showPasswordCheckbox.addEventListener("change", function() {
            if (showPasswordCheckbox.checked) {
                passwordField.type = "text";
                rePasswordField.type = "text";
            } else {
                passwordField.type = "password";
                rePasswordField.type = "password";
            }
        });

        passwordField.addEventListener("input", function() {
            const password = passwordField.value;
            const strength = calculatePasswordStrength(password);
            updatePasswordStrengthIndicator(strength);
        });

        function calculatePasswordStrength(password) {
            const length = password.length;
            if (length < 4) {
                return "Weak";
            } else if (length < 8) {
                return "Medium";
            } else {
                
                const hasUpperCase = /[A-Z]/.test(password);
                const hasLowerCase = /[a-z]/.test(password);
                const hasDigits = /\d/.test(password);
                const hasSpecialChars = /[\W_]/.test(password); // Special characters

                if (hasUpperCase && hasLowerCase && hasDigits && hasSpecialChars) {
                    return "Strong";
                } else {
                    return "Medium";
                }
            }
        }

        function updatePasswordStrengthIndicator(strength) {
            passwordStrengthIndicator.textContent = "Password Strength: " + strength;
            if (strength === "Weak") {
                passwordStrengthIndicator.style.color = "red";
            } else if (strength === "Medium") {
                passwordStrengthIndicator.style.color = "orange";
            } else if (strength === "Strong") {
                passwordStrengthIndicator.style.color = "green";
            }
        }
        setTimeout(function() {
        document.querySelector('.popup-success').style.display = 'none';
    }, 5000); // 5000 milliseconds (5 seconds)
        function showEmailError(message) {
            emailError.textContent = message;
        }

</script>
</body>
</html>
