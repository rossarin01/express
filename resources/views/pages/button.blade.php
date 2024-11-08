@extends('../layout/' . $layout)

@section('subhead')
    <title>Button - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Buttons</h2>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-6">
            <!-- BEGIN: Basic Button -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Basic Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-1">Show example code</label>
                        <input id="show-example-1" data-target="#basic-button" class="show-code form-check-input mr-0 ml-3"
                            type="checkbox">
                    </div>
                </div>
                <div id="basic-button" class="p-5">
                    <div class="preview">
                        <button class="btn btn-primary w-24 mr-1 mb-2">Primary</button>
                        <button class="btn btn-secondary w-24 mr-1 mb-2">Secondary</button>
                        <button class="btn btn-success w-24 mr-1 mb-2">Success</button>
                        <button class="btn btn-warning w-24 mr-1 mb-2">Warning</button>
                        <button class="btn btn-pending w-24 mr-1 mb-2">Pending</button>
                        <button class="btn btn-danger w-24 mr-1 mb-2">Danger</button>
                        <button class="btn btn-dark w-24 mr-1 mb-2">Dark</button>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-basic-button" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-basic-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <button class="btn btn-primary w-24 mr-1 mb-2">Primary</button>
                                                                                                                                                    <button class="btn btn-secondary w-24 mr-1 mb-2">Secondary</button>
                                                                                                                                                    <button class="btn btn-success w-24 mr-1 mb-2">Success</button>
                                                                                                                                                    <button class="btn btn-warning w-24 mr-1 mb-2">Warning</button>
                                                                                                                                                    <button class="btn btn-pending w-24 mr-1 mb-2">Pending</button>
                                                                                                                                                    <button class="btn btn-danger w-24 mr-1 mb-2">Danger</button>
                                                                                                                                                    <button class="btn btn-dark w-24 mr-1 mb-2">Dark</button>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Basic Button -->
            <!-- BEGIN: Button Size -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Button Sizes</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-2">Show example code</label>
                        <input id="show-example-2" data-target="#button-size" class="show-code form-check-input mr-0 ml-3"
                            type="checkbox">
                    </div>
                </div>
                <div id="button-size" class="p-5">
                    <div class="preview">
                        <div>
                            <button class="btn btn-sm btn-primary w-24 mr-1 mb-2">Small</button>
                            <button class="btn btn-primary w-24 mr-1 mb-2">Medium</button>
                            <button class="btn btn-lg btn-primary w-24 mr-1 mb-2">Large</button>
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-sm btn-secondary w-24 mr-1 mb-2">Small</button>
                            <button class="btn btn-secondary w-24 mr-1 mb-2">Medium</button>
                            <button class="btn btn-lg btn-secondary w-24 mr-1 mb-2">Large</button>
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-button-size" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre class="source-preview" id="copy-button-size">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <div>
                                                                                                                                                        <button class="btn btn-sm btn-primary w-24 mr-1 mb-2">Small</button>
                                                                                                                                                        <button class="btn btn-primary w-24 mr-1 mb-2">Medium</button>
                                                                                                                                                        <button class="btn btn-lg btn-primary w-24 mr-1 mb-2">Large</button>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="mt-5">
                                                                                                                                                        <button class="btn btn-sm btn-secondary w-24 mr-1 mb-2">Small</button>
                                                                                                                                                        <button class="btn btn-secondary w-24 mr-1 mb-2">Medium</button>
                                                                                                                                                        <button class="btn btn-lg btn-secondary w-24 mr-1 mb-2">Large</button>
                                                                                                                                                    </div>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Button Size -->
            <!-- BEGIN: Button Link -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Working with Links</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-3">Show example code</label>
                        <input id="show-example-3" data-target="#link-button" class="show-code form-check-input mr-0 ml-3"
                            type="checkbox">
                    </div>
                </div>
                <div id="link-button" class="p-5">
                    <div class="preview">
                        <a href="" class="btn btn-primary w-24 inline-block mr-1 mb-2">Link</a>
                        <a href="" class="btn btn-secondary w-24 inline-block mr-1 mb-2">Button</a>
                        <a href="" class="btn btn-success w-24 inline-block mr-1 mb-2">Input</a>
                        <a href="" class="btn btn-warning w-24 inline-block mr-1 mb-2">Submit</a>
                        <a href="" class="btn btn-pending w-24 inline-block mr-1 mb-2">Pending</a>
                        <a href="" class="btn btn-danger w-24 inline-block mr-1 mb-2">Reset</a>
                        <a href="" class="btn btn-dark w-24 inline-block mr-1 mb-2">Metal</a>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-link-button" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-link-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <a href="" class="btn btn-primary w-24 inline-block mr-1 mb-2">Link</a>
                                                                                                                                                    <a href="" class="btn btn-secondary w-24 inline-block mr-1 mb-2">Button</a>
                                                                                                                                                    <a href="" class="btn btn-success w-24 inline-block mr-1 mb-2">Input</a>
                                                                                                                                                    <a href="" class="btn btn-warning w-24 inline-block mr-1 mb-2">Submit</a>
                                                                                                                                                    <a href="" class="btn btn-pending w-24 inline-block mr-1 mb-2">Pending</a>
                                                                                                                                                    <a href="" class="btn btn-danger w-24 inline-block mr-1 mb-2">Reset</a>
                                                                                                                                                    <a href="" class="btn btn-dark w-24 inline-block mr-1 mb-2">Metal</a>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Button Link -->
            <!-- BEGIN: Elevated Button -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Elevated Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-4">Show example code</label>
                        <input id="show-example-4" data-target="#elevated-button"
                            class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="elevated-button" class="p-5">
                    <div class="preview">
                        <div>
                            <button class="btn btn-elevated-primary w-24 mr-1 mb-2">Primary</button>
                            <button class="btn btn-elevated-secondary w-24 mr-1 mb-2">Secondary</button>
                            <button class="btn btn-elevated-success w-24 mr-1 mb-2">Success</button>
                            <button class="btn btn-elevated-warning w-24 mr-1 mb-2">Warning</button>
                            <button class="btn btn-elevated-pending w-24 mr-1 mb-2">Pending</button>
                            <button class="btn btn-elevated-danger w-24 mr-1 mb-2">Danger</button>
                            <button class="btn btn-elevated-dark w-24 mr-1 mb-2">Dark</button>
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-elevated-rounded-primary w-24 mr-1 mb-2">Primary</button>
                            <button class="btn btn-elevated-rounded-secondary w-24 mr-1 mb-2">Secondary</button>
                            <button class="btn btn-elevated-rounded-success w-24 mr-1 mb-2">Success</button>
                            <button class="btn btn-elevated-rounded-warning w-24 mr-1 mb-2">Warning</button>
                            <button class="btn btn-elevated-rounded-pending w-24 mr-1 mb-2">Pending</button>
                            <button class="btn btn-elevated-rounded-danger w-24 mr-1 mb-2">Danger</button>
                            <button class="btn btn-elevated-rounded-dark w-24 mr-1 mb-2">Dark</button>
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-elevated-button" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-elevated-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <div>
                                                                                                                                                        <button class="btn btn-elevated-primary w-24 mr-1 mb-2">Primary</button>
                                                                                                                                                        <button class="btn btn-elevated-secondary w-24 mr-1 mb-2">Secondary</button>
                                                                                                                                                        <button class="btn btn-elevated-success w-24 mr-1 mb-2">Success</button>
                                                                                                                                                        <button class="btn btn-elevated-warning w-24 mr-1 mb-2">Warning</button>
                                                                                                                                                        <button class="btn btn-elevated-pending w-24 mr-1 mb-2">Pending</button>
                                                                                                                                                        <button class="btn btn-elevated-danger w-24 mr-1 mb-2">Danger</button>
                                                                                                                                                        <button class="btn btn-elevated-dark w-24 mr-1 mb-2">Dark</button>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="mt-5">
                                                                                                                                                        <button class="btn btn-elevated-rounded-primary w-24 mr-1 mb-2">Primary</button>
                                                                                                                                                        <button class="btn btn-elevated-rounded-secondary w-24 mr-1 mb-2">Secondary</button>
                                                                                                                                                        <button class="btn btn-elevated-rounded-success w-24 mr-1 mb-2">Success</button>
                                                                                                                                                        <button class="btn btn-elevated-rounded-warning w-24 mr-1 mb-2">Warning</button>
                                                                                                                                                        <button class="btn btn-elevated-rounded-pending w-24 mr-1 mb-2">Pending</button>
                                                                                                                                                        <button class="btn btn-elevated-rounded-danger w-24 mr-1 mb-2">Danger</button>
                                                                                                                                                        <button class="btn btn-elevated-rounded-dark w-24 mr-1 mb-2">Dark</button>
                                                                                                                                                    </div>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Elevated Button -->
            <!-- BEGIN: Social Media Button -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Social Media Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-5">Show example code</label>
                        <input id="show-example-5" data-target="#social-media-button"
                            class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="social-media-button" class="p-5">
                    <div class="preview">
                        <div class="flex flex-wrap">
                            <button class="btn btn-facebook w-32 mr-2 mb-2">
                                <x-icon name="facebook" class="w-4 h-4 mr-2" /> Facebook
                            </button>
                            <button class="btn btn-twitter w-32 mr-2 mb-2">
                                <x-icon name="twitter" class="w-4 h-4 mr-2" /> Twitter
                            </button>
                            <button class="btn btn-instagram w-32 mr-2 mb-2">
                                <x-icon name="instagram" class="w-4 h-4 mr-2" /> Instagram
                            </button>
                            <button class="btn btn-linkedin w-32 mr-2 mb-2">
                                <x-icon name="linkedin" class="w-4 h-4 mr-2" /> Linkedin
                            </button>
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-social-media-button"
                            class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-social-media-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <button class="btn btn-facebook w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="facebook" class="w-4 h-4 mr-2"/> Facebook
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-twitter w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="twitter" class="w-4 h-4 mr-2"/> Twitter
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-instagram w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="instagram" class="w-4 h-4 mr-2"/> Instagram
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-linkedin w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="linkedin" class="w-4 h-4 mr-2"/> Linkedin
                                                                                                                                                    </button>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Social Media Button -->
        </div>
        <div class="col-span-12 lg:col-span-6">
            <!-- BEGIN: Outline Button -->
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Outline Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-6">Show example code</label>
                        <input id="show-example-6" data-target="#outline-button"
                            class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="outline-button" class="p-5">
                    <div class="preview">
                        <button class="btn btn-outline-primary w-24 inline-block mr-1 mb-2">Primary</button>
                        <button class="btn btn-outline-secondary w-24 inline-block mr-1 mb-2">Secondary</button>
                        <button class="btn btn-outline-success w-24 inline-block mr-1 mb-2">Success</button>
                        <button class="btn btn-outline-warning w-24 inline-block mr-1 mb-2">Warning</button>
                        <button class="btn btn-outline-pending w-24 inline-block mr-1 mb-2">Pending</button>
                        <button class="btn btn-outline-danger w-24 inline-block mr-1 mb-2">Danger</button>
                        <button class="btn btn-outline-dark w-24 inline-block mr-1 mb-2">Dark</button>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-outline-button" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-outline-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <button class="btn btn-outline-primary w-24 inline-block mr-1 mb-2">Primary</button>
                                                                                                                                                    <button class="btn btn-outline-secondary w-24 inline-block mr-1 mb-2">Secondary</button>
                                                                                                                                                    <button class="btn btn-outline-success w-24 inline-block mr-1 mb-2">Success</button>
                                                                                                                                                    <button class="btn btn-outline-warning w-24 inline-block mr-1 mb-2">Warning</button>
                                                                                                                                                    <button class="btn btn-outline-pending w-24 inline-block mr-1 mb-2">Pending</button>
                                                                                                                                                    <button class="btn btn-outline-danger w-24 inline-block mr-1 mb-2">Danger</button>
                                                                                                                                                    <button class="btn btn-outline-dark w-24 inline-block mr-1 mb-2">Dark</button>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Outline Button -->
            <!-- BEGIN: Loading Button -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Loading State Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-7">Show example code</label>
                        <input id="show-example-7" data-target="#loading-button"
                            class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="loading-button" class="p-5">
                    <div class="preview">
                        <button class="btn btn-primary mr-1 mb-2">
                            Saving <i data-loading-icon="oval" data-color="white" class="w-4 h-4 ml-2" ></i>
                        </button>
                        <button class="btn btn-success mr-1 mb-2">
                            Adding <i data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2" ></i>
                        </button>
                        <button class="btn btn-warning mr-1 mb-2">
                            Loading <i data-loading-icon="three-dots" data-color="1a202c" class="w-4 h-4 ml-2" ></i>
                        </button>
                        <button class="btn btn-danger mr-1 mb-2">
                            Deleting <i data-loading-icon="puff" data-color="white" class="w-4 h-4 ml-2" ></i>
                        </button>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-loading-button" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-loading-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                            <button class="btn btn-primary mr-1 mb-2">
                                                Saving <i data-loading-icon="oval" data-color="white" class="w-4 h-4 ml-2" ></i>
                                            </button>
                                            <button class="btn btn-success mr-1 mb-2">
                                                Adding <i data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2" ></i>
                                            </button>
                                            <button class="btn btn-warning mr-1 mb-2">
                                                Loading <i data-loading-icon="three-dots" data-color="1a202c" class="w-4 h-4 ml-2" ></i>
                                            </button>
                                            <button class="btn btn-danger mr-1 mb-2">
                                                Deleting <i data-loading-icon="puff" data-color="white" class="w-4 h-4 ml-2" ></i>
                                            </button>
                                        ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Loading Button -->
            <!-- BEGIN: Rounded Button -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Rounded Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-8">Show example code</label>
                        <input id="show-example-8" data-target="#rounded-button"
                            class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="rounded-button" class="p-5">
                    <div class="preview">
                        <button class="btn btn-rounded-primary w-24 mr-1 mb-2">Primary</button>
                        <button class="btn btn-rounded-secondary w-24 mr-1 mb-2">Secondary</button>
                        <button class="btn btn-rounded-success w-24 mr-1 mb-2">Success</button>
                        <button class="btn btn-rounded-warning w-24 mr-1 mb-2">Warning</button>
                        <button class="btn btn-rounded-pending w-24 mr-1 mb-2">Pending</button>
                        <button class="btn btn-rounded-danger w-24 mr-1 mb-2">Danger</button>
                        <button class="btn btn-rounded-dark w-24 mr-1 mb-2">Dark</button>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-rounded-button" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-rounded-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <button class="btn btn-rounded-primary w-24 mr-1 mb-2">Primary</button>
                                                                                                                                                    <button class="btn btn-rounded-secondary w-24 mr-1 mb-2">Secondary</button>
                                                                                                                                                    <button class="btn btn-rounded-success w-24 mr-1 mb-2">Success</button>
                                                                                                                                                    <button class="btn btn-rounded-warning w-24 mr-1 mb-2">Warning</button>
                                                                                                                                                    <button class="btn btn-rounded-pending w-24 mr-1 mb-2">Pending</button>
                                                                                                                                                    <button class="btn btn-rounded-danger w-24 mr-1 mb-2">Danger</button>
                                                                                                                                                    <button class="btn btn-rounded-dark w-24 mr-1 mb-2">Dark</button>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Rounded Button -->
            <!-- BEGIN: Soft Color Button -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Soft Color Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-9">Show example code</label>
                        <input id="show-example-9" data-target="#softcolor-button"
                            class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="softcolor-button" class="p-5">
                    <div class="preview">
                        <button class="btn btn-rounded btn-primary-soft w-24 mr-1 mb-2">Primary</button>
                        <button class="btn btn-rounded btn-secondary-soft w-24 mr-1 mb-2">Secondary</button>
                        <button class="btn btn-rounded btn-success-soft w-24 mr-1 mb-2">Success</button>
                        <button class="btn btn-rounded btn-warning-soft w-24 mr-1 mb-2">Warning</button>
                        <button class="btn btn-rounded btn-pending-soft w-24 mr-1 mb-2">Pending</button>
                        <button class="btn btn-rounded btn-danger-soft w-24 mr-1 mb-2">Danger</button>
                        <button class="btn btn-rounded btn-dark-soft w-24 mr-1 mb-2">Dark</button>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-softcolor-button"
                            class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-softcolor-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <button class="btn btn-rounded btn-primary-soft w-24 mr-1 mb-2">Primary</button>
                                                                                                                                                    <button class="btn btn-rounded btn-secondary-soft w-24 mr-1 mb-2">Secondary</button>
                                                                                                                                                    <button class="btn btn-rounded btn-success-soft w-24 mr-1 mb-2">Success</button>
                                                                                                                                                    <button class="btn btn-rounded btn-warning-soft w-24 mr-1 mb-2">Warning</button>
                                                                                                                                                    <button class="btn btn-rounded btn-pending-soft w-24 mr-1 mb-2">Pending</button>
                                                                                                                                                    <button class="btn btn-rounded btn-danger-soft w-24 mr-1 mb-2">Danger</button>
                                                                                                                                                    <button class="btn btn-rounded btn-dark-soft w-24 mr-1 mb-2">Dark</button>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Soft Color Button -->
            <!-- BEGIN: Icon Button -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Icon Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-10">Show example code</label>
                        <input id="show-example-10" data-target="#icon-button"
                            class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="icon-button" class="p-5">
                    <div class="preview">
                        <div class="flex flex-wrap">
                            <button class="btn btn-primary w-32 mr-2 mb-2">
                                <x-icon name="activity" class="w-4 h-4 mr-2" /> Activity
                            </button>
                            <button class="btn btn-secondary w-32 mr-2 mb-2">
                                <x-icon name="hard-drive" class="w-4 h-4 mr-2" /> Hard Drive
                            </button>
                            <button class="btn btn-success w-32 mr-2 mb-2">
                                <x-icon name="calendar" class="w-4 h-4 mr-2" /> Calendar
                            </button>
                            <button class="btn btn-warning w-32 mr-2 mb-2">
                                <x-icon name="share-2" class="w-4 h-4 mr-2" /> Share
                            </button>
                            <button class="btn btn-pending w-32 mr-2 mb-2">
                                <x-icon name="download" class="w-4 h-4 mr-2" /> Pending
                            </button>
                            <button class="btn btn-danger w-32 mr-2 mb-2">
                                <x-icon name="trash" class="w-4 h-4 mr-2" /> Trash
                            </button>
                            <button class="btn btn-dark w-32 mr-2 mb-2">
                                <x-icon name="image" class="w-4 h-4 mr-2" /> Image
                            </button>
                        </div>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-icon-button" class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-icon-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <button class="btn btn-primary w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="activity" class="w-4 h-4 mr-2"/> Activity
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-secondary w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="hard-drive" class="w-4 h-4 mr-2"/> Hard Drive
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-success w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="calendar" class="w-4 h-4 mr-2"/> Calendar
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-warning w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="share-2" class="w-4 h-4 mr-2"/> Share
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-pending w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="download" class="w-4 h-4 mr-2"/> Pending
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-danger w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="trash" class="w-4 h-4 mr-2"/> Trash
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-dark w-32 mr-2 mb-2">
                                                                                                                                                        <x-icon name="image" class="w-4 h-4 mr-2"/> Image
                                                                                                                                                    </button>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Icon Button -->
            <!-- BEGIN: Icon Only Button -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Icon Only Buttons</h2>
                    <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                        <label class="form-check-label ml-0" for="show-example-11">Show example code</label>
                        <input id="show-example-11" data-target="#icon-only-button"
                            class="show-code form-check-input mr-0 ml-3" type="checkbox">
                    </div>
                </div>
                <div id="icon-only-button" class="p-5">
                    <div class="preview">
                        <button class="btn btn-primary mr-1 mb-2">
                            <x-icon name="activity" class="w-5 h-5" />
                        </button>
                        <button class="btn btn-secondary mr-1 mb-2">
                            <x-icon name="hard-drive" class="w-5 h-5" />
                        </button>
                        <button class="btn btn-success mr-1 mb-2">
                            <x-icon name="calendar" class="w-5 h-5" />
                        </button>
                        <button class="btn btn-warning mr-1 mb-2">
                            <x-icon name="share-2" class="w-5 h-5" />
                        </button>
                        <button class="btn btn-pending mr-1 mb-2">
                            <x-icon name="download" class="w-5 h-5" />
                        </button>
                        <button class="btn btn-danger mr-1 mb-2">
                            <x-icon name="trash" class="w-5 h-5" />
                        </button>
                        <button class="btn btn-dark mr-1 mb-2">
                            <x-icon name="image" class="w-5 h-5" />
                        </button>
                    </div>
                    <div class="source-code hidden">
                        <button data-target="#copy-icon-only-button"
                            class="copy-code btn py-1 px-2 btn-outline-secondary">
                            <x-icon name="file" class="w-4 h-4 mr-2" /> Copy example code
                        </button>
                        <div class="overflow-y-auto mt-3 rounded-md">
                            <pre id="copy-icon-only-button" class="source-preview">
                                <code class="html">
                                    {{ str_replace(
                                        '>',
                                        'HTMLCloseTag',
                                        str_replace(
                                            '<',
                                            'HTMLOpenTag',
                                            '
                                                                                                                                                    <button class="btn btn-primary mr-1 mb-2">
                                                                                                                                                        <x-icon name="activity" class="w-5 h-5"/>
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-secondary mr-1 mb-2">
                                                                                                                                                        <x-icon name="hard-drive" class="w-5 h-5"/>
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-success mr-1 mb-2">
                                                                                                                                                        <x-icon name="calendar" class="w-5 h-5"/>
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-warning mr-1 mb-2">
                                                                                                                                                        <x-icon name="share-2" class="w-5 h-5"/>
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-pending mr-1 mb-2">
                                                                                                                                                        <x-icon name="download" class="w-5 h-5"/>
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-danger mr-1 mb-2">
                                                                                                                                                        <x-icon name="trash" class="w-5 h-5"/>
                                                                                                                                                    </button>
                                                                                                                                                    <button class="btn btn-dark mr-1 mb-2">
                                                                                                                                                        <x-icon name="image" class="w-5 h-5"/>
                                                                                                                                                    </button>
                                                                                                                                                ',
                                        ),
                                    ) }}
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Icon Only Button -->
        </div>
    </div>
@endsection
