<!DOCTYPE html>
<html>
<head>
    <title>{{ $template->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
<div>
    {!! $template->content !!}
</div>
</body>
</html>
