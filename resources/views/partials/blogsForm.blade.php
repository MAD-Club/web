{{ csrf_field() }}
<div class="form-group">
    <label for="title">Title</label>
    <input name="title" class="form-control" type="text" value="{{ $title ?? '' }}">
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" class="form-control" spellcheck="true" wrap="hard" rows="10">{{ $body ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="file">Image</label>
    <input type="file" class="form-control-file" name="file" accept="image/*">
</div>
<input type="submit" class="btn btn-success" value="{{ $buttonName }}">
