<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password Token</title>
</head>
<body>
    <div style="border:1px solid #708090;display:flex;flex-direction:column;align-items:center;gap:10px;width:100%;overflow:hidden;">
        <div style="padding:15px;border-bottom:1px solid #708090;text-align:center;width:100%;">
            <h3 style="opacity:0.6;">Reset Your Password</h3>
        </div>
        <div style="padding:15px;display:flex;flex-direction:column;gap:15px;">

Hi {{ $name }} , <br>

We received a request to reset the password for your account. See code below: <br>

<div style="padding:10px 15px;border:1px solid #708090;width:fit-content;margin-left:auto;margin-right:auto;">{{ $otp }}</div> <br>

If you did not request this, you can safely ignore this email—your password will remain unchanged. <br>

For your security, this code will expire in 30 minutes. <br>

If you need help, feel free to contact our support team. <br>
        </div>
    </div>

</body>
</html>