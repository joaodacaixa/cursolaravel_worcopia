<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worcopia job Applications</title>
</head>
<body>
    <p>Ther is a new job application to your job listing!</p>

    <p><Strong>Job Title:</Strong>{{$job->title}}</p>
    <p><Strong>Application Details:</Strong>{{$job->title}}</p>
    <p><Strong>Full Name:</Strong>{{$application->full_name}}</p>
    <p><Strong>Phone:</Strong>{{$application->contact_phone}}</p>
    <p><Strong>Email:</Strong>{{$application->contact_email}}</p>
    <p><Strong>Location:</Strong>{{$application->location}}</p>
    <p><Strong>Message:</Strong>{{$application->message}}</p>

    <p>Login to your account to view the application!</p>
</body>
</html>