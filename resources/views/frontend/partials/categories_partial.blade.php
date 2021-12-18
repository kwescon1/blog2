@inject('index', 'App\Http\Controllers\JustCategoryController')
<h3 class="heading">Categories</h3>

<div class="sidebar-box">
    <ul class="categories">
        @foreach ($index->cats() as $cat)
            <li><a href="{{ route('category', $cat->name) }}">{{ ucfirst(strtolower($cat->name)) }}</a></li> </a>
            </li>
        @endforeach
    </ul>
</div>
