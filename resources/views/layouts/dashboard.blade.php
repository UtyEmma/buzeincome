<x-app-layout class="has-sidebar bg-lighter">
    <x-sidebar-layout />

    <div class="nk-wrap ">
        <x-header-layout />

        <div class="nk-content ">
            {{$slot}}
        </div>

        <div class="nk-footer">
            <div class="container-fluid">
                <div class="nk-footer-wrap">
                    <div class="nk-footer-copyright"> &copy; 2023 Brizzlent <a href="https://brizzlent.com" target="_blank">Brizzlent</a>
                    </div>
                    <div class="nk-footer-links">
                        <ul class="nav nav-sm">
                            <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>