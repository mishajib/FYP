<ul class="nav-menu nav navbar-nav">
    <li><a href="{{ route('frontend.posts') }}">Popular</a></li>
    @forelse($categories->where('is_approved', 1)->where('status', 1)->whereNull('parent_id') as $key => $category)
    <li class="cat-{{ ++$key }} dropdown">
        <a class="nav-link dropdown-toggle" href="{{ route('frontend.category.posts', $category->slug) }}">
            {{ $category->name }}
        </a>


        @if(count($category->children))
        <ul class="dropdown-menu">
            @forelse($category->children->where('status', 1)->where('is_approved', 1)->whereNotNull('parent_id') as
            $ckey => $child)
            @if($child->approved()->active())
            <li class="cat-{{ ++$ckey }}">
                <a href="{{ route('frontend.category.posts', $child->slug) }}">{{ $child->name }}</a>
            </li>
            @endif
            @empty
            <span class="text-danger">{{ __("No child category found!!!") }}</span>
            @endforelse
        </ul>
        @endif
    </li>
    @empty
    <li><span class="text-danger">{{ __('No data found!') }}</span></li>
    @endforelse

</ul>
