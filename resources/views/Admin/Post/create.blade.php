@extends('Layout.Admin.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Thêm bài viết mới</h6>
                    </div>
                    <div class="card-body">
                        {{-- Lỗi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.dashboard.posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="slug">Đường dẫn</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                                <label for="">Ảnh bìa</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <textarea class="form-control" name="content" id="" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-5">
                                <label for="">Danh mục</label>
                                <select class="form-control" name="category_id" id="">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hastag</label>
                                <input type="text" name="hagtag" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
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
                        var titleInput = document.getElementById('title');
                        var slugInput = document.getElementById('slug');

                        titleInput.addEventListener('input', function() {
                            var title = titleInput.value;
                            slugInput.value = createSlug(title);
                        });
                    });
                </script>
            @endsection
