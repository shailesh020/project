<!DOCTYPE html>
<html>
<head>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9;">
        <div style="background-color: #4CAF50; color: white; padding: 20px; text-align: center;">
            <img src="{{ asset('logo.png') }}" alt="Company Logo" style="max-width: 100px; height: auto; margin-bottom: 20px;">
            <h1 style="margin: 0; font-size: 24px;">New Inquiry Received</h1>
        </div>
        <div style="padding: 20px; background-color: #fff; border: 1px solid #eee; margin-top: 20px;">
            <p style="margin: 0 0 10px;"><strong>First Name:</strong> {{ $contactUs->first_name }}</p>
            <p style="margin: 0 0 10px;"><strong>Last Name:</strong> {{ $contactUs->last_name }}</p>
            <p style="margin: 0 0 10px;"><strong>Email:</strong> {{ $contactUs->email }}</p>
            <p style="margin: 0 0 10px;"><strong>Phone Number:</strong> {{ $contactUs->phone_number }}</p>
            <p style="margin: 0 0 10px;"><strong>Company:</strong> {{ $contactUs->company }}</p>
            <p style="margin: 0 0 10px;"><strong>Website:</strong> {{ $contactUs->website }}</p>
            <p style="margin: 0 0 10px;"><strong>Description:</strong> {{ $contactUs->description }}</p>
            <p style="margin: 0 0 10px;"><strong>Service:</strong> {{ $contactUs->service }}</p>
        </div>
        <div style="background-color: #4CAF50; color: white; text-align: center; padding: 20px; margin-top: 20px;">
            <p style="margin: 0; font-size: 18px;">Thank you for reaching out to us!</p>
        </div>
        <div style="text-align: center; padding: 20px; font-size: 12px; color: #666;">
            <p style="margin: 0;">© {{date('Y')}} YoDo Digital  . All rights reserved.</p>
            <p style="margin: 0;">Email: reach@yododigital.com</p>
        </div>
    </div>
</body>
</html>
