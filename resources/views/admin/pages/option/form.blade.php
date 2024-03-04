<form class="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $option_item->name ?? '') }}" placeholder="Nhập tên...">
    </div>

    <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select class="form-control" name="status">
            <option value="">--Trạng thái--</option>
            @if(isset($option_item->status))
                <option value="{{ $option_item->status }}" selected>
                    {{ $option_item->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                </option>
                <option value="{{ $option_item->status != 1 ? 1 : 0 }}">
                    {{ $option_item->status != 1 ? 'Hiển thị' : 'Ẩn' }}
                </option>
            @else
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            @endif
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="content" id="" class="form-control" cols="30" rows="3" placeholder="Nhập tên...">{{ old('content', $option_item->content ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>
