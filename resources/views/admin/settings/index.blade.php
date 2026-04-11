@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Site Settings</h1>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    
    @foreach($settings as $group => $items)
    <div class="card">
        <h3 style="margin-bottom: 1.5rem; text-transform: capitalize;">{{ $group }} Settings</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            @foreach($items as $setting)
            <div class="form-group">
                <label>{{ str_replace('_', ' ', ucfirst($setting->key)) }}</label>
                <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}">
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary" style="padding: 1rem 3rem;">Save Settings</button>
</form>
@endsection
