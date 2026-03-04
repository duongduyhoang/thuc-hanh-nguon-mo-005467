<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Tên danh mục
            $table->text('description')->nullable(); // Mô tả
            $table->string('image')->nullable(); // Ảnh (cho phép null)

            // parent_id để tạo cấp cha-con, dùng unsignedBigInteger để khớp với kiểu của id
            $table->unsignedBigInteger('parent_id')->nullable();

            // Trạng thái hoạt động (mặc định là 1 - active)
            $table->boolean('is_active')->default(1);

            // Trạng thái xóa mềm (mặc định là 0 - chưa xóa)
            $table->boolean('is_delete')->default(0);

            $table->timestamps(); // Tạo ra created_at và updated_at

            // (Tùy chọn) Thêm khóa ngoại để đảm bảo tính toàn vẹn dữ liệu
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
