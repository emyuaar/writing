@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Navigation Menus</h1>
</div>

<div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 2rem;">
    <div class="card">
        <h3 style="margin-bottom: 1.5rem;">Existing Menus</h3>
        <table>
            <thead>
                <tr>
                    <th>Menu Name</th>
                    <th>Location Key</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td><strong>{{ $menu->name }}</strong></td>
                    <td><code>{{ $menu->location }}</code></td>
                    <td style="text-align: right;">
                        <a href="{{ route('admin.menus.show', $menu) }}" class="btn btn-secondary">Manage Items</a>
                        <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this menu?')">Del</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card">
        <h3 style="margin-bottom: 1.5rem;">Create New Menu</h3>
        <form action="{{ route('admin.menus.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Menu Name</label>
                <input type="text" name="name" class="form-control" placeholder="e.g. Main Header" required>
            </div>
            <div class="form-group">
                <label>Location Slug</label>
                <input type="text" name="location" class="form-control" placeholder="e.g. header, footer_links" required>
                <small>Unique identifier used in code templates.</small>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Create Menu</button>
        </form>
    </div>
</div>
@endsection
