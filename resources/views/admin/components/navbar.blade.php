<!-- <nav class="mb-3 d-flex justify-content-lg-between p-2 rounded" style="background-color: #AB886D;">
    <div class="d-flex flex-column">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active"><a href="#">{{ $name }}</a></li>
            {{-- <li class="breadcrumb-item active" aria-current="page">Library</li> --}}
        </ol>
        <span>{{ $name }}</span>
    </div>
    <div class="d-flex align-items-center gap-3">
        <div class="icon-notif">
            <span class="material-icons">
                notifications
            </span>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <img src="{{asset('asset/Logo.jpeg')}}" class="rounded-circle" style="width: 50px;" alt="">
            <div class="d-flex flex-column">
                <p class="m-0" style="font-weight: 700; font-size:14px;"></p>
                <p class="m-0" style="font-size:12px"></p>
            </div>
        </div>
    </div>
</nav> -->

<nav class="mb-3 d-flex justify-content-lg-between bg-gradient p-3 rounded shadow">
    <div class="d-flex flex-column">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active"><a href="#" class="text-decoration-none" style="color: #493628">{{ $name }}</a></li>
        </ol>
        <span class="h5" style="color: #493628">{{ $name }}</span>
    </div>
    <div class="d-flex align-items-center gap-3">
        <div class="icon-notif">
            <span class="material-icons" style="cursor: pointer; color: #493628;">
                notifications
            </span>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <img src="{{asset('asset/Logo.jpeg')}}" class="rounded-circle border border-2 border-light" style="width: 50px;" alt="">
            <div class="d-flex flex-column">
                <p class="m-0 fw-bold" style="font-size:14px;"></p>
                <p class="m-0" style="font-size:12px"></p>
            </div>
        </div>
    </div>
</nav>