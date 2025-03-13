@foreach($menuItems as $menuItem)
    <li class="dd-item" data-id="{{ $menuItem->id }}">
        <div class="dd-handle">
            <div class="menu-item-title">
                {{ $menuItem->title }}
                @if($menuItem->page_id)
                    <span class="badge bg-soft-info text-info menu-item-badge">
                        Page: {{ $menuItem->page->title ?? 'Unknown' }}
                    </span>
                @elseif($menuItem->url)
                    <span class="badge bg-soft-primary text-primary menu-item-badge">
                        URL: {{ Str::limit($menuItem->url, 30) }}
                    </span>
                @endif
                @if($menuItem->section_id)
                    <span class="badge bg-soft-warning text-warning menu-item-badge">
                        Section: #{{ $menuItem->section_id }}
                    </span>
                @endif
                @if(!$menuItem->is_active)
                    <span class="badge bg-soft-danger text-danger menu-item-badge">Inactive</span>
                @endif
            </div>
            <div class="menu-item-actions">
                <a href="{{ route('admin.menu-items.edit', ['menu' => $menu->id, 'menuItem' => $menuItem->id]) }}" class="btn btn-sm btn-soft-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <button type="button" class="btn btn-sm btn-soft-danger delete-menu-item" data-id="{{ $menuItem->id }}" data-title="{{ $menuItem->title }}">
                    <i class="fas fa-trash"></i>
                </button>
                <form id="delete-menu-item-{{ $menuItem->id }}" action="{{ route('admin.menu-items.destroy', ['menu' => $menu->id, 'menuItem' => $menuItem->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        @if($menuItem->children && $menuItem->children->count() > 0)
            <ol class="dd-list">
                @include('admin.menus.partials.menu-item', ['menuItems' => $menuItem->children, 'menu' => $menu])
            </ol>
        @endif
    </li>
@endforeach
