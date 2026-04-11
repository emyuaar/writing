@extends('layouts.admin')

@section('content')
<div class="page-header">
    <h1 class="page-title">Manage Menu: {{ $menu->name }}</h1>
    <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Back to List</a>
</div>

<div style="display: grid; grid-template-columns: 2fr 1.2fr; gap: 2rem;">
    <div class="card">
        <h3 style="margin-bottom: 1.5rem;">Menu Structure</h3>
        @if($menu->items->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Link</th>
                        <th>Order</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu->items->where('parent_id', null)->sortBy('sort_order') as $item)
                        <tr>
                            <td><strong>{{ $item->label }}</strong></td>
                            <td><code>{{ $item->link }}</code></td>
                            <td>{{ $item->sort_order }}</td>
                            <td style="text-align: right;">
                                <form action="{{ route('admin.menus.items.destroy', $item) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Remove item?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                        {{-- Sub-items could be handled here --}}
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center; color: #666; padding: 2rem;">This menu has no items yet.</p>
        @endif
    </div>

    <div class="card">
        <h3 style="margin-bottom: 1.5rem;">Add Menu Item</h3>
        <form action="{{ route('admin.menus.items.store', $menu) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Link Label</label>
                <input type="text" name="label" class="form-control" placeholder="e.g. Services" required>
            </div>
            <div class="form-group">
                <label>URL / Slug</label>
                <input type="text" name="link" class="form-control" placeholder="e.g. /services or http://..." required>
            </div>
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="0">
            </div>
            <div class="form-group">
                <label>Parent Item (For nesting)</label>
                <select name="parent_id" class="form-control">
                    <option value="">None (Top Level)</option>
                    @foreach($menu->items->where('parent_id', null) as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Menu</button>
        </form>
    </div>
</div>
@endsection
