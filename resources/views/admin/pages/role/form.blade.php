@extends('admin.layouts.master_admin')

@section('content')
<div class="mt-5">
    <!-- <h2 style="display: flex; justify-content: space-between; align-items: center;">
        <span>Thêm mới</span>
    </h2> -->

    <form class="form" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $role->name ?? '') }}" placeholder="Name ...">
        </div>

        <div class="row" style="margin-bottom: 10px;">
            @foreach($permissions as $item)
            <div class="col-sm-3" style="margin-bottom: 15px;">
                <input type="checkbox" id="vehicle{{ $item->id }}" {{ in_array($item->id, $permissionActive) ? "checked" : "" }} name="permissions[]" value="{{ $item->id }}">
                <label for="vehicle{{ $item->id }}"> {{ $item->name }}</label><br>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
    </form>
</div>
@stop