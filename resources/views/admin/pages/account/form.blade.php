<form class="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $admin->name ?? '') }}" placeholder="Nhập tên...">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email', $admin->email ?? '') }}" placeholder="Nhập email...">
    </div>
    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="tel" class="form-control" name="phone" value="{{ old('phone', $admin->phone ?? '') }}" placeholder="Nhập số điện thoại...">
    </div>
    <div class="mb-3">
        <label class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu...">
    </div>
    <div class="mb-3">
        <label class="form-label">Avatar</label>
        <input type="file" name="avatar">
    </div>
    <div class="mb-3">
        @if (isset($admin->avatar))
        <img style="width: 100px; height: auto;" src="{{ pare_url_file($admin->avatar ?? "") }}" alt="Avatar">
        @endif
    </div>

    <div class="row mb-3">
        <label class="form-label">Roles</label>
        <div class="col-sm-12">
            @foreach($roles as $item)
            <div class="form-check form-check-inline">
                <input type="checkbox" id="role{{ $item->id }}" {{ in_array($item->id, $roleActive ?? []) ? "checked" : "" }} name="roles[]" value="{{ $item->id }}" class="form-check-input">
                <label for="role{{ $item->id }}" class="form-check-label">{{ $item->name }}</label>
            </div>
            @endforeach
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>