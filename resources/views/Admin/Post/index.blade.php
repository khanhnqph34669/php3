@extends('Layout.Admin.main')
@section('title', 'Posts')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h6>Posts Table</h6>
                        <a href="{{ route('admin.dashboard.posts.create') }}" class="btn btn-primary">Thêm bài viết mới</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0 table-container">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 resizable">
                                            ID</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 resizable">
                                            Tiêu đề</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 resizable">
                                            Danh mục</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 resizable">
                                            Lượt view</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 resizable">
                                            Tác giả</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 resizable">
                                            Ngày tạo & Ngày Update</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 resizable">
                                            Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    @foreach ($posts as $order)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $order->id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $order->title }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $order->category }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 ">{{ $order->views }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $order->author }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $order->created_at }}</p>
                                                <p class="text-sm font-weight-bold mb-0">{{ $order->updated_at }}</p>
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('admin.dashboard.posts.edit', $order->id) }}"
                                                    class="btn btn-link text-warning">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('admin.dashboard.posts.delete',$order->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                  <button class="btn btn-link text-danger">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                                </form>
                                                <a href="" class="btn btn-link text-success">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-container">
                            {{ $posts->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
        .table-container {
            overflow-x: auto;
        }

        .table th,
        .table td {
            position: relative;
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e3e6f0;
        }

        .table th {
            position: relative;
            cursor: col-resize;
            /* Chỉ thị cho người dùng biết rằng họ có thể kéo để thay đổi kích thước */
        }

        .table th.resizable {
            background: #f1f1f1;
            /* Một nền nhẹ để dễ thấy phần cột có thể kéo */
        }

        .table th.resizable::after {
            content: "";
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 5px;
            cursor: col-resize;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.querySelector('.table');
            let startX, startWidth, th;

            table.addEventListener('mousedown', function(e) {
                if (e.target.classList.contains('resizable')) {
                    th = e.target;
                    startX = e.pageX;
                    startWidth = th.offsetWidth;

                    function onMouseMove(e) {
                        const newWidth = startWidth + (e.pageX - startX);
                        th.style.width = `${newWidth}px`;
                    }

                    function onMouseUp() {
                        document.removeEventListener('mousemove', onMouseMove);
                        document.removeEventListener('mouseup', onMouseUp);
                        th = null;
                    }

                    document.addEventListener('mousemove', onMouseMove);
                    document.addEventListener('mouseup', onMouseUp);
                }
            });
        });
    </script>
@endsection
