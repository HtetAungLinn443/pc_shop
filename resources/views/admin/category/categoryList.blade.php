@extends('admin.layout.index')

@section('title', 'Category List')

@section('content')
    <main class="category">
        <div class="category__container">
            <div class="category__title">
                <h3>Category List</h3>
                <form action="{{ route('admin#categoryList') }}" method="get">
                    <div class="category__input-group">

                        @csrf
                        <input type="search" name="searchMainData" id="" placeholder="Search Main Category"
                            value="{{ request('searchMainData') }}">
                        <button class="search-btn ">
                            <span class="material-symbols-sharp">
                                search
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="category__main">
                <h4>Main Cagtegory List</h4>
                <a href="{{ route('admin#addMainCategoryPage') }}" class="main-category-btn">Add Main Category <i
                        class="fa-solid fa-plus"></i></a>
            </div>
            <!-- Table -->
            @if ($main->total() != 0)
                <table class="category__table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Main Category</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($main as $m)
                            <tr>
                                <td>{{ $m->id }}</td>
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->updated_at->format('d-M-Y') }}</td>
                                <td class="catregory__btn">
                                    <a href="{{ route('admin#editMainCategoryPage', $m->id) }}" class="edit">
                                        <span class="material-symbols-sharp">
                                            draft_orders
                                        </span>
                                    </a>
                                    <a href="{{ route('admin#deleteMainCategory', $m->id) }}" class="delete">
                                        <span class="material-symbols-sharp">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mb-3">{{ $main->links() }}</div>
            @else
                <h1 class="text-center py-4 my-5 bg-warning rounded text-danger shadow">There is No Main Category</h1>
            @endif


            <div class="category__title">
                <h3>Category List</h3>
                <form action="{{ route('admin#categoryList') }}" method="get">
                    <div class="category__input-group">
                        <input type="search" name="searchSecData" id="" placeholder="Search Second Category"
                            value="{{ request('searchSecData') }}">
                        <button class="search-btn">
                            <span class="material-symbols-sharp">
                                search
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="category__second">
                <h4>Second Category List</h4>
                <a href="{{ route('admin#addSecCategoryPage') }}" class="second-category-btn">Add Second Category <i
                        class="fa-solid fa-plus"></i> </a>
            </div>
            @if ($second->total() != 0)
                <table class="category__table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Main Category</th>
                            <th>Second Category</th>
                            <th>Date</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($second as $sec)
                            <tr>
                                <td>{{ $sec->id }}</td>
                                <td>{{ $sec->main_name }}</td>
                                <td>{{ $sec->name }}</td>
                                <td>{{ $sec->updated_at->format('d-M-Y') }}</td>
                                <td class="catregory__btn">
                                    <a href="{{ route('admin#editSecCategoryPage', $sec->id) }}" class="edit">
                                        <span class="material-symbols-sharp">
                                            draft_orders
                                        </span>
                                    </a>
                                    <a href="{{ route('admin#deleteSecCategory', $sec->id) }}" class="delete">
                                        <span class="material-symbols-sharp">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mb-3">{{ $second->links() }}</div>
            @else
                @if (request('searchSecData') != null)
                    <div class="h2 text-center py-4 my-5 bg-warning rounded text-danger shadow">There is No
                        <span class="text-danger h1"> {{ request('searchSecData') }}</span> Category
                    </div>
                @else
                    <h1 class="text-center py-4 my-5 bg-warning rounded text-danger shadow">There is No Second Category</h1>
                @endif
            @endif
        </div>
    </main>

@endsection
