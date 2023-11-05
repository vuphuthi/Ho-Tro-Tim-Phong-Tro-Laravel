<form class="form" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên </label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $permission->name ?? '') }}"
               aria-describedby="emailHelp" placeholder="Name ...">
    </div>
    
    <div class="mb-3">
        <label class="form-label">Group</label>
        <select name="type" class="form-control" id="">
            @foreach($groups as $key =>  $item)
                <option value="{{ $key }}" {{ ($permission->type ?? 0) == $key ? "selected" : "" }}>{{ $item }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>
