<form class="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên hiển thị</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name ?? '') }}"
               aria-describedby="emailHelp" placeholder="Tỉnh location">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" disabled  value="{{ old('email', $user->email ?? '') }}"
               aria-describedby="emailHelp" placeholder="Tỉnh location">
    </div>
    <div class="mb-3">
        <label class="form-label">SĐT</label>
        <input type="number" class="form-control" name="phone" value="{{ old('phone', $user->phone ?? '') }}"
               aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="mb-3">
        <label class="form-label">Link Facebook</label>
        <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $user->facebook ?? '') }}"
               aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="mb-3">
        <div class="form-group w-100">
            <label for="name">Hình ảnh</label>
            <input type="file" name="avatar">
        </div>
        @if (isset($user->avatar) && $user->avatar)
            <img src="{{ pare_url_file($user->avatar) }}" style="width: 100px;height: 100px;border-radius: 50%" alt="">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>
