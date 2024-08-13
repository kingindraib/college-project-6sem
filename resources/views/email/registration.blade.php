<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>

<body>
    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
        <div style="margin:50px auto;width:70%;padding:20px 0">
            <div style="border-bottom:1px solid #eee">
                <a href="https://indrabasnet.com.np/" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">IB OTP VERIFY SERVICE</a>
            </div>
            <p style="font-size:1.1em">Hi, {{ $data['name'] }}</p>
            <p>Thank you for Registration on {{ $settings->site_title }}. Hope Enjoy with us</p>
            <h2
                style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
                Have A Great Day</h2>
            <p style="font-size:0.9em;">Regards,<br />{{ $settings->site_title }}</p>
            <hr style="border:none;border-top:1px solid #eee" />
            <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                <p>{{ $settings->site_title }}</p>
                <p>{{ $settings->address }}</p>
                <p>{{ $settings->phone }}</p>
                <br><br>
                <p><i>digital verifcation : Indra Basnet</i></p>
            </div>
        </div>
    </div>
</body>

</html>
