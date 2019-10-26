{{ csrf_field() }}
<div class="form-group">
    <label for="title">Title</label>
    <input name="title" class="form-control" type="text" value="{{ $title ?? '' }}">
</div>
<div class="form-group">
    <label for="location">Location</label>
    <input name="location" class="form-control" type="text" value="{{ $location ?? '' }}">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="start_date">Start Date</label>
        <input name="start_date" class="form-control" type="date" value="{{ $start_date ?? '' }}">
    </div>
    <div class="form-group col-md-6">
        <label for="start_time">Start Time</label>
        <input name="start_time" class="form-control" type="time" value="{{ $start_time ?? '' }}">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="end_date">End Date</label>
        <input name="end_date" class="form-control" type="date" value="{{ $end_date ?? '' }}">
    </div>
    <div class="form-group col-md-6">
        <label for="end_time">End Time</label>
        <input name="end_time" class="form-control" type="time" value="{{ $end_time ?? '' }}">
    </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" spellcheck="true" wrap="hard" rows="10">{{ $description ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="file">Image</label>
    <input type="file" class="form-control-file" name="file" accept="image/*">
</div>
<input type="submit" class="btn btn-success" value="{{ $buttonName }}">
