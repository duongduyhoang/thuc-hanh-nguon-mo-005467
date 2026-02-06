@extends('Layout.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('Css/UserManagement/AllUser.css') }}">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="user-list-container">
    <div class="header-actions">
        <div class="header-left">
            <h2>Danh sách người dùng</h2>
            <p class="subtitle">Quản lý và phân quyền thành viên hệ thống</p>
        </div>
        <div class="header-right">
            <div class="search-box">
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Tìm kiếm...">
            </div>
            <a href="{{ route('getAdd') }}" class="btn-add">
                <i class='bx bx-plus'></i> Thêm người dùng
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Người dùng</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Ngày tham gia</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $data)
                <tr>
                    <td><span class="id-badge">#{{ $data->id }}</span></td>
                    <td class="user-info">
                        <div class="avatar">
                            {{ strtoupper(substr($data->username, 0, 1)) }}
                        </div>
                        <div class="user-details">
                            <span class="username">{{ $data->username }}</span>
                        </div>
                    </td>
                    <td><span class="text-muted">{{ $data->email }}</span></td>
                    <td><span class="status active">Hoạt động</span></td>
                    <td><span class="text-muted">{{ $data->created_at ? $data->created_at->format('d/m/Y') : '---' }}</span></td>
                    <td>
                        <div class="action-group">
                            <a href="{{ route('getOneUser',['id' => $data->id]) }}"  class="btn-icon edit" title="Sửa"><i class='bx bx-edit-alt'></i></a>
                            <form action="{{route('deleteUser', ['id' => $data->id])}}" method="post" onsubmit="return confirm('Xóa người dùng này?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-icon delete" title="Xóa"><i class='bx bx-trash'></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection