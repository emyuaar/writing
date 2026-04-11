@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Add New FAQ</h1>
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<div class="card">
    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Question</label>
            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question') }}" required>
            @error('question') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Answer</label>
            <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" rows="5" required>{{ old('answer') }}</textarea>
            @error('answer') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="e.g. Services, Pricing">
            </div>

            <div class="form-group">
                <label>Visibility</label>
                <select name="is_visible" class="form-control">
                    <option value="1">Visible</option>
                    <option value="0">Hidden</option>
                </select>
            </div>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Create FAQ</button>
        </div>
    </form>
</div>
@endsection
