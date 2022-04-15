{{-- Sidebar Admin --}}
<div>
    <h1 class="visually-hidden">Sidebars examples</h1>

    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
        <a href="/"
           class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"/>
            </svg>
            <span class="fs-4">Admin Panel</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link text-white" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"/>
                    </svg>
                    Hôtels ({{ $hotels->count() }})
                </a>
            </li>
            <li>
                <a href="{{ route('admin.adminManager.listSuites') }}" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"/>
                    </svg>
                    Suites ({{ $suites->count() }})
                </a>
            </li>
            <li>
                <a href="{{ route('admin.adminManager.listManagers') }}" class="nav-link active text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"/>
                    </svg>
                    Managers ({{ $managers->count() }})
                </a>
            </li>
            <li>
                <a href="{{ route('admin.adminContact.index') }}" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"/>
                    </svg>
                    Messages <span class="message">({{ $contacts->count() }})</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.adminManager.listUsers') }}" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"/>
                    </svg>
                    Clients ({{ $users->count() }})
                </a>
            </li>
        </ul>
        {{--                <div class="dropdown">--}}
        {{--                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"--}}
        {{--                       id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">--}}
        {{--                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">--}}
        {{--                        <strong>mdo</strong>--}}
        {{--                    </a>--}}
        {{--                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">--}}
        {{--                        <li><a class="dropdown-item" href="#">New project...</a></li>--}}
        {{--                        <li><a class="dropdown-item" href="#">Settings</a></li>--}}
        {{--                        <li><a class="dropdown-item" href="#">Profile</a></li>--}}
        {{--                        <li>--}}
        {{--                            <hr class="dropdown-divider">--}}
        {{--                        </li>--}}
        {{--                        <li><a class="dropdown-item" href="#">Sign out</a></li>--}}
        {{--                    </ul>--}}
        {{--                </div>--}}
    </div>
</div>
{{-- End of Sidebar Admin --}}
