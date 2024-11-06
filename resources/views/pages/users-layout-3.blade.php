@extends('../layout/' . $layout)

@section('subhead')
    <title>Users Layout - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Users Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2">Add New User</button>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <x-icon class="w-4 h-4" name="plus"/>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <x-icon name="users" class="w-4 h-4 mr-2"/> Add Group
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <x-icon name="message-circle" class="w-4 h-4 mr-2"/> Send Message
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <x-icon class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" name="search"/>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        @foreach (array_slice($fakers, 0, 9) as $faker)
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
                <div class="box">
                    <div class="flex items-start px-5 pt-5">
                        <div class="w-full flex flex-col lg:flex-row items-center">
                            <div class="w-16 h-16 image-fit">
                                <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $faker['photos'][0]) }}">
                            </div>
                            <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">{{ $faker['users'][0]['name'] }}</a>
                                <div class="text-slate-500 text-xs mt-0.5">{{ $faker['jobs'][0] }}</div>
                            </div>
                        </div>
                        <div class="absolute right-0 top-0 mr-5 mt-3 dropdown">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                <x-icon name="more-horizontal" class="w-5 h-5 text-slate-500"/>
                            </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-content">
                                    <a href="" class="dropdown-item">
                                        <x-icon name="user-cog" class="w-4 h-4 mr-2"/> Edit
                                    </a>
                                    <a href="" class="dropdown-item">
                                        <x-icon name="trash" class="w-4 h-4 mr-2"/> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center lg:text-left p-5">
                        <div>{{ $faker['news'][0]['short_content'] }}</div>
                        <div class="flex items-center justify-center lg:justify-start text-slate-500 mt-5">
                            <x-icon name="mail" class="w-3 h-3 mr-2"/> {{ $faker['users'][0]['email'] }}
                        </div>
                        <div class="flex items-center justify-center lg:justify-start text-slate-500 mt-1">
                            <x-icon name="instagram" class="w-3 h-3 mr-2"/> {{ $faker['users'][0]['name'] }}
                        </div>
                    </div>
                    <div class="text-center lg:text-right p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                        <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                        <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <x-icon class="w-4 h-4" name="chevrons-left"/>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <x-icon class="w-4 h-4" name="chevron-left"/>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <x-icon class="w-4 h-4" name="chevron-right"/>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <x-icon class="w-4 h-4" name="chevrons-right"/>
                        </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
@endsection
