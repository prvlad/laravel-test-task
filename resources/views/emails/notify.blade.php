<!doctype html>
<html lang="en">
<head>
    <title>Your account has been deleted</title>
</head>
<body>
    <h2>User ({{ $data['email'] }}) has been deleted</h2>
    <span>Deleted at - {{ $data['deleted_at'] }}</span>
</body>
</html>
