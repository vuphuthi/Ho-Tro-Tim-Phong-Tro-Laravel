<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
<form class="form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên bài viết</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $article->name ?? '') }}"
               aria-describedby="emailHelp" placeholder="Tên bài viết">
    </div>
    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" id="" cols="4" rows="2" class="form-control">{{ old('name', $article->description ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Nội dung</label>
        <textarea name="content" id="editor" cols="4" rows="2" class="form-control">{{ old('content', $article->content ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Avatar</label>
        <input type="file" name="avatar">
    </div>

    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>
<script>
    ClassicEditor.create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
