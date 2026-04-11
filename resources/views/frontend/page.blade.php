@extends('layouts.app')

@section('content')
    <div class="page-sections">
        @foreach($page->sections as $section)
            @php
                $partialPath = 'frontend.sections.' . $section->type;
            @endphp
            
            @if(view()->exists($partialPath))
                @include($partialPath, ['section' => $section])
            @else
                @if(auth()->check() && auth()->user()->is_admin)
                    <div class="bg-red-50 border-2 border-dashed border-red-200 p-8 text-center my-8 mx-auto max-w-7xl rounded-xl">
                        <p class="text-red-600 font-bold">MISSING SECTION PARTIAL: <span class="bg-red-100 px-2 py-1 rounded">{{ $section->type }}</span></p>
                        <p class="text-sm text-red-500">Please create <code>resources/views/frontend/sections/{{ $section->type }}.blade.php</code></p>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
@endsection
