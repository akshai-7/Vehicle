<body>
    <p>Hello {{ $mailData['name'] }},</p>
    <p>This is to inform you that a vehicle has been assigned to you. Please collect the vehicle from Doncaster and
        ensure its
        proper usage.</p>
    <p>Vehicle Number: {{ $mailData['number_plate'] }}</p>

    <p>Best regards,</p>
    <p>M&D Foundations</p>
</body>
