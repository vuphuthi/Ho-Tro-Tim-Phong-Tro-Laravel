<form class="form" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $category->name ?? '') }}" placeholder="Tên danh mục ...">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea id="description" name="description" cols="4" rows="2" class="form-control">{{ old('description', $category->description ?? '') }}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1" {{ ($category->status ?? 0) == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="flexRadioDefault1">Hiển thị</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0" {{ ($category->status ?? 0) == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="flexRadioDefault2">Ẩn</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>