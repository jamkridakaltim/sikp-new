<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background: #0f172a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #3b82f6;
            color: white;
            border: none;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="box">
    <h3>Login SIKP</h3>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST">
        @csrf
        <input name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button>Login</button>
    </form>
</div>

</body>
</html>
