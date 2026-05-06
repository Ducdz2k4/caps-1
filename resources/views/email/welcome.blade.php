<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký tài khoản thành công</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>Xin chào {{ $user->fullname }},</h2>
    
    <p>Chúc mừng bạn đã tạo tài khoản thành công tại hệ thống <strong>Course-Online</strong>.</p>
    
    <p>Dưới đây là thông tin tài khoản của bạn:</p>
    <ul>
        <li><strong>Email đăng nhập:</strong> {{ $user->email }}</li>
        <li><strong>Số điện thoại:</strong> {{ $user->phone }}</li>
    </ul>

    <p>Cảm ơn bạn đã đồng hành cùng chúng tôi. Chúc bạn có những giờ học tập hiệu quả!</p>
    
    <br>
    <p><i>Trân trọng,</i></p>
    <p><b>Ban Quản Trị Course-Online</b></p>
</body>
</html>