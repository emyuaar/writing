@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add Testimonial</h1>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<div class="card">
    <form action="{{ route('admin.testimonials.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label>Role</label>
                <input type="text" name="role" class="form-control" value="{{ old('role') }}" placeholder="e.g. PhD Student">
            </div>
        </div>

        <div class="form-group">
            <label>Institution</label>
            <input type="text" name="institution" class="form-control" value="{{ old('institution') }}" placeholder="e.g. University of Manchester">
        </div>

        <div class="form-group">
            <label>Quote</label>
            <textarea name="quote" class="form-control" rows="5" required>{{ old('quote') }}</textarea>
        </div>

        <div class="form-group">
            <label>Visibility</label>
            <select name="is_visible" class="form-control">
                <option value="1">Visible</option>
                <option value="0">Hidden</option>
            </select>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Create Testimonial</button>
        </div>
    </form>
</div>
@endsection
