<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

<form class="form" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Tên bài viết</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $article->name ?? '') }}" placeholder="Tên bài viết">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea id="description" name="description" cols="4" rows="2" class="form-control">{{ old('description', $article->description ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="editor" class="form-label">Nội dung</label>
        <textarea id="editor" name="content" class="form-control">{{ old('content', $article->content ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="avatar" class="form-label">Avatar</label>
        <input type="file" id="avatar" name="avatar">
    </div>

    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    }
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>