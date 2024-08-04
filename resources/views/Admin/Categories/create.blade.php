@extends('Layout.Admin.main')
@section('title', 'Add Category')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Thêm danh mục</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="{{ route('admin.dashboard.categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Đường dẫn danh mục</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Nhập đường dẫn danh mục">
                            @if ($errors->has('slug'))
                            <p class="text-danger">{{ $errors->first('slug') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Mô tả</label>
                            <textarea class="form-control" name="description" id="" rows="3"></textarea>
                            @if ($errors->has('description'))
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function createSlug(text) {
        return text
            .toString() // Chuyển đổi thành chuỗi
            .normalize('NFD') // Phân tách các ký tự có dấu
            .replace(/[\u0300-\u036f]/g, '') // Xóa dấu
            .replace(/đ/g, 'd') // Xử lý ký tự "đ" thành "d"
            .toLowerCase() // Chuyển tất cả thành chữ thường
            .trim() // Xóa khoảng trắng ở đầu và cuối
            .replace(/\s+/g, '-') // Thay thế khoảng trắng bằng dấu gạch nối
            .replace(/[^\w\-]+/g, '') // Xóa các ký tự không phải chữ cái, số, dấu gạch nối
            .replace(/\-\-+/g, '-') // Thay thế nhiều dấu gạch nối liên tiếp bằng một dấu gạch nối
            .replace(/^-+/, '') // Xóa dấu gạch nối ở đầu
            .replace(/-+$/, ''); // Xóa dấu gạch nối ở cuối
    }

    document.addEventListener('DOMContentLoaded', function() {
        var titleInput = document.getElementById('name');
        var slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function() {
            var title = titleInput.value;
            slugInput.value = createSlug(title);
        });
    });
</script>
@endsection