<form class="form" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên </label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $admin->name ?? '') }}"
               aria-describedby="emailHelp" placeholder="Name ...">
    </div>
    <div class="mb-3">
        <label class="form-label">Email </label>
        <input type="email" class="form-control" name="email" value="{{ old('email', $admin->email ?? '') }}"
               aria-describedby="emailHelp" placeholder="Email ...">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone </label>
        <input type="number" class="form-control" name="phone" value="{{ old('phone', $admin->phone ?? '') }}"
               aria-describedby="emailHelp" placeholder="Phone ...">
    </div>
    <div class="mb-3">
        <label class="form-label">Password </label>
        <input type="password" class="form-control" name="password" value=""
               aria-describedby="emailHelp" placeholder="******">
    </div>

    <div class="row" style="margin-bottom: 10px;">
        @foreach($roles as $item)
            <div class="col-sm-3" style="margin-bottom: 15px;">
                <input type="checkbox" id="vehicle{{ $item->id }}" {{ in_array($item->id, $roleActive ?? []) ? "checked" : "" }}  name="roles[]" value="{{ $item->id }}">
                <label for="vehicle{{ $item->id }}"> {{ $item->name }}</label><br>
            </div>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>
