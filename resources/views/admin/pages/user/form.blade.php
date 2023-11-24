<form class="form" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên hiển thị</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name ?? '') }}" aria-describedby="emailHelp" placeholder="Tỉnh location">
    </div>
    <div class="mb-3">
        <label class="form-label">SĐT</label>
        <input type="number" class="form-control" name="phone" value="{{ old('phone', $user->phone ?? '') }}" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="mb-3">
        <label class="form-label">Link Facebook</label>
        <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $user->facebook ?? '') }}" aria-describedby="emailHelp" placeholder="">
    </div>
    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>