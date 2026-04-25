<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * Tên bảng tương ứng trong Database.
     * Dựa trên tài liệu database.docx của bạn.
     */
    protected $table = 'admin';

    /**
     * Khóa chính của bảng.
     */
    protected $primaryKey = 'ID';

    /**
     * Các trường cho phép lưu dữ liệu hàng loạt (Mass Assignment).
     */
    protected $fillable = [
        'Fullname', 
        'Email', 
        'Password', 
        'Phone', 
        'Role'
    ];

    /**
     * Các trường sẽ bị ẩn khi xuất dữ liệu ra dạng JSON (Bảo mật).
     */
    protected $hidden = [
        'Password', 
        'remember_token',
    ];

    /**
     * Ép kiểu dữ liệu cho các trường đặc biệt.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Ghi đè phương thức lấy mật khẩu mặc định của Laravel.
     * Vì trong Database của bạn sử dụng chữ 'P' viết hoa (Password).
     */
    public function getAuthPassword()
    {
        return $this->Password;
    }

    /**
     * Quan hệ: Một Admin có thể tạo nhiều Khóa học (Courses).
     * Dựa trên cột Admin_id trong bảng Course của tài liệu database.docx.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'Admin_id', 'ID');
    }

    /**
     * Quan hệ: Một Admin có thể quản lý nhiều Lớp học (Classrooms).
     */
    public function classrooms()
    {
        return $this->hasMany(Classroom::class, 'Admin_id', 'ID');
    }

    /**
     * Kiểm tra xem Admin có quyền Manager hay không.
     */
    public function isManager()
    {
        return $this->Role === 'Manager';
    }

    /**
     * Kiểm tra xem Admin có quyền Admin tổng hay không.
     */
    public function isAdmin()
    {
        return $this->Role === 'Admin';
    }
}