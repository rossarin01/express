@extends('../layout/' . $layout)

@section('subhead')
    <title>File Manager - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">File Manager</h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="" class="flex items-center px-3 py-2 rounded-md bg-primary text-white font-medium">
                        <x-icon class="w-4 h-4 mr-2" name="image"/> Images
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <x-icon class="w-4 h-4 mr-2" name="video"/> Videos
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <x-icon class="w-4 h-4 mr-2" name="file"/> Documents
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <x-icon class="w-4 h-4 mr-2" name="users"/> Shared
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <x-icon class="w-4 h-4 mr-2" name="trash"/> Trash
                    </a>
                </div>
                <div class="border-t border-slate-200 dark:border-darkmode-400 mt-4 pt-4">
                    <a href="" class="flex items-center px-3 py-2 rounded-md">
                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div> Custom Work
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-success rounded-full mr-3"></div> Important Meetings
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-warning rounded-full mr-3"></div> Work
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div> Design
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-danger rounded-full mr-3"></div> Next Week
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <x-icon class="w-4 h-4 mr-2" name="plus"/> Add New Label
                    </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 2xl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <x-icon class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-slate-500" name="search"/>
                    <input type="text" class="form-control w-full sm:w-64 box px-10" placeholder="Search files">
                    <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-tw-placement="bottom-start">
                        <x-icon class="dropdown-toggle w-4 h-4 cursor-pointer text-slate-500" role="button" aria-expanded="false" data-tw-toggle="dropdown" name="chevron-down"/>
                        <div class="inbox-filter__dropdown-menu dropdown-menu pt-2">
                            <div class="dropdown-content">
                                <div class="grid grid-cols-12 gap-4 gap-y-3 p-3">
                                    <div class="col-span-6">
                                        <label for="input-filter-1" class="form-label text-xs">File Name</label>
                                        <input id="input-filter-1" type="text" class="form-control flex-1" placeholder="Type the file name">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="input-filter-2" class="form-label text-xs">Shared With</label>
                                        <input id="input-filter-2" type="text" class="form-control flex-1" placeholder="example@gmail.com">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="input-filter-3" class="form-label text-xs">Created At</label>
                                        <input id="input-filter-3" type="text" class="form-control flex-1" placeholder="Important Meeting">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="input-filter-4" class="form-label text-xs">Size</label>
                                        <select id="input-filter-4" class="form-select flex-1">
                                            <option>10</option>
                                            <option>25</option>
                                            <option>35</option>
                                            <option>50</option>
                                        </select>
                                    </div>
                                    <div class="col-span-12 flex items-center mt-3">
                                        <button class="btn btn-secondary w-32 ml-auto">Create Filter</button>
                                        <button class="btn btn-primary w-32 ml-2">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-auto flex">
                    <button class="btn btn-primary shadow-md mr-2">Upload New Files</button>
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
                                        <x-icon name="file" class="w-4 h-4 mr-2"/> Share Files
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">
                                        <x-icon name="settings" class="w-4 h-4 mr-2"/> Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach ($fakers as $faker)
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                            <div class="absolute left-0 top-0 mt-3 ml-3">
                                <input class="form-check-input border border-slate-500" type="checkbox" {{ $faker['true_false'][0] ? '' : 'checked' }}>
                            </div>
                            @if ($faker['files'][0]['type'] == 'Empty Folder')
                                <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a>
                            @elseif ($faker['files'][0]['type'] == 'Folder')
                                <a href="" class="w-3/5 file__icon file__icon--directory mx-auto"></a>
                            @elseif ($faker['files'][0]['type'] == 'Image')
                                <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                                    <div class="file__icon--image__preview image-fit">
                                        <img alt="Midone - HTML Admin Template" src="{{ asset('dist/images/' . strtolower($faker['files'][0]['file_name'])) }}">
                                    </div>
                                </a>
                            @else
                                <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                                    <div class="file__icon__file-name">{{ $faker['files'][0]['type'] }}</div>
                                </a>
                            @endif
                            <a href="" class="block font-medium mt-4 text-center truncate">{{ $faker['files'][0]['file_name'] }}</a>
                            <div class="text-slate-500 text-xs text-center mt-0.5">{{ $faker['files'][0]['size'] }}</div>
                            <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                    <x-icon name="more-vertical" class="w-5 h-5 text-slate-500"/>
                                </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <x-icon name="users" class="w-4 h-4 mr-2"/> Share File
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <x-icon name="trash" class="w-4 h-4 mr-2"/> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
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
    </div>
@endsection
