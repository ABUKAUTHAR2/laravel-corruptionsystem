<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
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
        #alert-danger {
            color: red;
        }
        select {
            width: 50%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
     button{
            width: 75%%;
            background-color: #4c5baf;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
       button:hover {
            background-color: #0032f8;
        }
        @media (max-width: 600px) {
            .formmm {
                max-width: 100%;
            }
            input[type="text"], input[type="password"], input[type="email"], input[type="date"], select {
                width: 50%;
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
        a{
            text-decoration: none;
            color: #f2f2f2
        }
    </style>
</head>
<body>
    <div class="formmm">
        <h2>Edit Profile</h2>
        <hr>
        <form action="{{ route('update-profile') }}" method="post">
            @csrf
            <label for="name">First Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="{{ $user->last_name }}" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Leave blank to keep current password">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation">
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Other</option>
            </select>
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" value="{{ $user->birthdate }}" required>
            <label for="address">Address:</label>
            <input type="text" name="address" value="{{ $user->address }}" required>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required><br>
            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" value="{{ $user->mobile }}" required>
            
            <button type="submit">Update Profile</button>
            
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
        
        @if(session('success'))
    <div class="popup-success" style="color: #009400">
        {{ session('success') }}
    </div>
@endif
    </div>
</body>
</html>
