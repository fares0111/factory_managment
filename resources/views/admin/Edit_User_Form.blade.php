



@if(auth()->guard("super_admin")->check())

@include("super_admin.TaskBar")
@include("super_admin.SideBar")


@elseif(auth()->guard("admin")->check())

@include("admin.TaskBar")
@include("admin.sidebar")


@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000;
            margin-left: 300px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        .form-group input {
            width: 400px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;

        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .form-group .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-actions a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
        .form-actions a:hover {
            text-decoration: underline;
        }
        .form-actions button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-actions button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>تعديل عضو</h1>
        <form method="POST" action="{{ route('admin/update.user',$User->id) }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">{{ ('الاسم') }}</label>
                <input id="name" type="text" name="name" value="{{$User->name}}" required />
                <x-input-error :messages="$errors->get('name')" class="error-message" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ ('الايميل') }}</label>
                <input id="email" type="text" name="email" value="{{$User->email}}" required  />
                <x-input-error :messages="$errors->get('email')" class="error-message" />

                </div>

@if(auth()->guard("super_admin")->check())

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" value="{{$User->password}}" required/>
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>
                
    @endif

                <div class="form-actions">
                    <button type="submit">{{ ('تعديل') }}</button>
                </div>


        </form>
    </div>
</body>
</html>
