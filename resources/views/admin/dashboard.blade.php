<style>
    a {
        border: none !important;
        color: black !important;
    }

    .nav-link.active {
        background-color: #543ae3 !important;
        color: white !important;
        border-radius: 0 !important;
    }

    .categories {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .category {
        width: calc(100% / 4 - 1rem);
        text-align: center;
        box-shadow: 0 0 2px 2px rgb(221, 221, 221);
        padding: 1rem 2rem;
        border-radius: 10px;
        font-size: 20px;
        font-weight: 700;
        display: flex;
        gap: 10px;
        flex-direction: column;
    }

    .cta {
        background: rgb(87, 87, 87) !important;
        color: white;
        /* padding: 10px 20px; */
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30%;
        font-weight: 700;
        border-radius: 8px;
    }

    /* From Uiverse.io by alexruix */
    .card {
        width: calc(100% / 3 - 20px);
        height: max-content !important;
        padding: .8em;
        background: #f5f5f5;
        position: relative;
        overflow: visible;
        /* box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); */
    }

    .card-img {
        background-color: #ffcaa6;
        height: 40%;
        width: 100%;
        border-radius: .5rem;
        transition: .3s ease;
        aspect-ratio: 16/9;
    }

    .card-info {
        padding-top: 15px;
    }

    svg {
        width: 20px;
        height: 20px;
    }

    .card-footer {
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 0 !important;
        align-items: center;
        padding-top: 10px !important;
        border-top: 1px solid #ddd;
    }

    /*Text*/
    .text-title {
        font-weight: 900;
        font-size: 1.2em;
        line-height: 1.5;
    }

    .text-body {
        font-size: .9em;
        padding-bottom: 10px;
    }

    /*Button*/
    .card-button {
        border: 1px solid #252525;
        display: flex;
        padding: .3em;
        cursor: pointer;
        border-radius: 50px;
        transition: .3s ease-in-out;
    }

    /*Hover*/
    .card-img:hover {
        /* transform: translateY(-25%); */
        box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(180, 71, 71, 0.3) 0px 8px 16px -8px;
    }

    .card-button:hover {
        border: 1px solid #ffcaa6;
        background-color: #ffcaa6;
    }

    .courses {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 60px 0;
    }

    .card-footer {
        background: transparent !important;
    }

    .text-body {
        /* height: 0px; */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="d-flex " style="gap: 10px">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs bg-white flex-column" id="adminTabs" role="tablist"
            style="height: 100vh; position: sticky; top: 0; width: 20%">
            <li class="nav-item">
                <a class="nav-link py-4 {{ session('type') === 'editCourse' ? '' : 'active' }}" id="dashboard-tab"
                    data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-4" id="courses-tab" data-bs-toggle="tab" href="#courses" role="tab"
                    aria-controls="courses" aria-selected="false">
                    Courses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-4 {{ session('type') === 'editCourse' ? 'active' : '' }}" id="add-course-tab"
                    data-bs-toggle="tab" href="#add-course" role="tab" aria-controls="add-course"
                    aria-selected="false">
                    Add Course
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-4" id="add-category-tab" data-bs-toggle="tab" href="#add-category" role="tab"
                    aria-controls="add-category" aria-selected="false">
                    Add Category
                </a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content h-100" id="adminTabsContent" style="width: 80%;">
            <!-- Dashboard Tab -->
            <div class="tab-pane fade {{ session('type') === 'editCourse' ? '' : 'show active' }}" id="dashboard"
                role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="bg-white dark:bg-gray-800 p-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($categories)
                        <div class="categories">
                            @foreach ($categories as $category)
                                <div class="category">
                                    <h3>{{ $category->name }}</h3>
                                    @php
                                        $countForCategory = $count->firstWhere('category_id', $category->id);
                                    @endphp
                                    <div class="count">
                                        {{ $countForCategory ? $countForCategory->total_courses : 0 }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{-- <h3 class="text-gray-800 dark:text-gray-200">Welcome, {{ $user->name }}</h3> --}}
                    {{-- <p>Dashboard Content</p> --}}

                </div>
            </div>

            <!-- Courses Tab -->
            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                <div class="bg-white dark:bg-gray-800 d-flex flex-wrap p-4 " style="gap: 15px">
                    @if ($courses)
                        @foreach ($courses as $course)
                            <div class="card">
                                <img class="card-img" src={{ $course->image_path }}
                                    onclick="window.location.href='{{ route('course', ['course_id' => $course->id]) }}';" />
                                <div class="card-info">
                                    <p class="text-title"> {{ $course->title }} </p>
                                    <p class="text-body"> {{ $course->description }} </p>
                                </div>
                                <div class="card-footer">
                                    <span class="text-title">Rs. {{ $course->price }}</span>
                                    <div class="ctas">
                                        <a href="{{ route('edit_course', ['course_id' => $course->id]) }}"
                                            class="btn btn-primary text-white">Edit</a>
                                        <a href="{{ route('deleteCourse', ['course_id' => $course->id]) }}"
                                            class="btn btn-danger text-white">Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Add Course Tab -->
            <div class="tab-pane fade {{ session('type') === 'editCourse' ? 'show active' : '' }}" id="add-course"
                role="tabpanel" aria-labelledby="add-course-tab">
                <div class="bg-white dark:bg-gray-800 p-4">
                    <h2 class="text-gray-800 text-2xl pb-4 dark:text-gray-200">Add Course</h2>

                    @if (session('success'))
                        <div class="" role="alert">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif

                    <!-- Course Form -->
                    <form
                        action="{{ session('type') === 'editCourse' ? route('editCourse', ['course_id' => session('editCourse')['id']]) : route('addCourse') }}"
                        method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Course Name</label>
                            <input type="text" name="name" id="name" class="form-control" required
                                value="{{ old('name', session('type') === 'editCourse' ? session('editCourse')['title'] : '') }}">
                        </div>

                        @if ($categories)
                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (session('type') === 'editCourse' && session('editCourse')['category_id'] == $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', session('type') === 'editCourse' ? session('editCourse')['description'] : '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control"
                                value="{{ old('price', session('type') === 'editCourse' ? session('editCourse')['price'] : '') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="text" name="image" id="image" class="form-control"
                                value="{{ old('image', session('type') === 'editCourse' ? session('editCourse')['image_path'] : '') }}"
                                required>
                        </div>

                        <button type="submit"
                            class="btn btn-primary">{{ session('type') === 'editCourse' ? 'Update Course' : 'Add Course' }}</button>
                    </form>
                </div>
            </div>


            <!-- add category Tab -->
            <div class="tab-pane fade" id="add-category" role="tabpanel" aria-labelledby="add-category-tab">
                <div class="bg-white dark:bg-gray-800 p-4 ">
                    <h3 class="text-gray-800 dark:text-gray-200">Category</h3>
                    <form action="{{ route('addCategory') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Course</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
