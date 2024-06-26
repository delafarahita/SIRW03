@extends('layouts.app')

@section('content')

    <style>
        .margin-1{
            margin: 5px;
        }

        .count-number {
            animation: count-animation 0.5s ease-out forwards;
        }

        @keyframes count-animation {
            from {
                transform: translateY(-50%);
            }
            to {
                transform: translateY(0);
            }
        }
        .container-kegiatan {
        max-height: 200px; /* Set your desired max height */
        overflow-y: auto;
        border: 1px solid #ccc; /* Optional: for visual separation */
        padding: 10px;
    }

    .kegiatan-item {
        margin-bottom: 10px; /* Optional: for spacing between items */
    }

    .iframe-card {
        background-color: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
    }

    .iframe-container {
        width: 100%;
        overflow-x: auto; /* Enables horizontal scrolling if needed */
    }
        .bg-white {
            background-color: white;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; */
        }
        .fw-bolder {
            font-weight: bolder;
        }
    </style>
    <h1 class="fw-bolder">Sistem Informasi Rukun Warga 03</h1>
    {{-- <div class="card-body">
        {{-- <h3>Login Sebagai :
            {{-- <?php echo Auth::user()->id_level == 1 ? 'RW' : 'RT'; ?></h3> --}}
        {{-- </div> --}}
        <div class="row mx-2 my-3">
            <div class="col-lg bg-white rounded-2 margin-1 shadow-sm">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <p class="fs-3 fw-bolder p-2 my-3">Total Penduduk</p>
                    </div>
                    <div class="col text-center mt-3">
                        <svg width="124px" height="124px" viewBox="0 0 24 24" class="" style="width:80px; height:80px" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="8" r="2.5" stroke="#1F2937" stroke-linecap="round"></circle> <path d="M13.7679 6.5C13.9657 6.15743 14.2607 5.88121 14.6154 5.70625C14.9702 5.5313 15.3689 5.46548 15.7611 5.51711C16.1532 5.56874 16.5213 5.73551 16.8187 5.99632C17.1161 6.25713 17.3295 6.60028 17.4319 6.98236C17.5342 7.36445 17.521 7.76831 17.3939 8.14288C17.2667 8.51745 17.0313 8.8459 16.7175 9.08671C16.4037 9.32751 16.0255 9.46985 15.6308 9.49572C15.2361 9.52159 14.8426 9.42983 14.5 9.23205" stroke="#1F2937"></path> <path d="M10.2321 6.5C10.0343 6.15743 9.73935 5.88121 9.38458 5.70625C9.02981 5.5313 8.63113 5.46548 8.23895 5.51711C7.84677 5.56874 7.47871 5.73551 7.18131 5.99632C6.88391 6.25713 6.67053 6.60028 6.56815 6.98236C6.46577 7.36445 6.47899 7.76831 6.60614 8.14288C6.73329 8.51745 6.96866 8.8459 7.28248 9.08671C7.5963 9.32751 7.97448 9.46985 8.36919 9.49572C8.76391 9.52159 9.15743 9.42983 9.5 9.23205" stroke="#1F2937"></path> <path d="M12 12.5C16.0802 12.5 17.1335 15.8022 17.4054 17.507C17.4924 18.0524 17.0523 18.5 16.5 18.5H7.5C6.94771 18.5 6.50763 18.0524 6.59461 17.507C6.86649 15.8022 7.91976 12.5 12 12.5Z" stroke="#1F2937" stroke-linecap="round"></path> <path d="M19.2965 15.4162L18.8115 15.5377L19.2965 15.4162ZM13.0871 12.5859L12.7179 12.2488L12.0974 12.9283L13.0051 13.0791L13.0871 12.5859ZM17.1813 16.5L16.701 16.639L16.8055 17H17.1813V16.5ZM15.5 12C16.5277 12 17.2495 12.5027 17.7783 13.2069C18.3177 13.9253 18.6344 14.8306 18.8115 15.5377L19.7816 15.2948C19.5904 14.5315 19.2329 13.4787 18.578 12.6065C17.9126 11.7203 16.9202 11 15.5 11V12ZM13.4563 12.923C13.9567 12.375 14.6107 12 15.5 12V11C14.2828 11 13.3736 11.5306 12.7179 12.2488L13.4563 12.923ZM13.0051 13.0791C15.3056 13.4614 16.279 15.1801 16.701 16.639L17.6616 16.361C17.1905 14.7326 16.019 12.5663 13.1691 12.0927L13.0051 13.0791ZM18.395 16H17.1813V17H18.395V16ZM18.8115 15.5377C18.8653 15.7526 18.7075 16 18.395 16V17C19.2657 17 20.0152 16.2277 19.7816 15.2948L18.8115 15.5377Z" fill="#1F2937"></path> <path d="M10.9129 12.5859L10.9949 13.0791L11.9026 12.9283L11.2821 12.2488L10.9129 12.5859ZM4.70343 15.4162L5.18845 15.5377L4.70343 15.4162ZM6.81868 16.5V17H7.19453L7.29898 16.639L6.81868 16.5ZM8.49999 12C9.38931 12 10.0433 12.375 10.5436 12.923L11.2821 12.2488C10.6264 11.5306 9.71723 11 8.49999 11V12ZM5.18845 15.5377C5.36554 14.8306 5.68228 13.9253 6.22167 13.2069C6.75048 12.5027 7.47226 12 8.49999 12V11C7.0798 11 6.08743 11.7203 5.42199 12.6065C4.76713 13.4787 4.40955 14.5315 4.21841 15.2948L5.18845 15.5377ZM5.60498 16C5.29247 16 5.13465 15.7526 5.18845 15.5377L4.21841 15.2948C3.98477 16.2277 4.73424 17 5.60498 17V16ZM6.81868 16H5.60498V17H6.81868V16ZM7.29898 16.639C7.72104 15.1801 8.69435 13.4614 10.9949 13.0791L10.8309 12.0927C7.98101 12.5663 6.8095 14.7326 6.33838 16.361L7.29898 16.639Z" fill="#1F2937"></path> </g></svg>
                        <p class="fs-2 fw-bolder count-number" data-target="{{$totalPenduduk}}">0</p>
                    </div>
                </div>
            </div>
            <div class="col-lg bg-white rounded-2 margin-1 shadow-sm">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <p class="fs-3 fw-bolder p-2 my-3">Total RT</p>
                    </div>
                    <div class="col text-center mt-3">
                        <svg width="124px" height="124px" viewBox="0 0 24 24" class="" style="width:80px; height:80px" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="8" r="2.5" stroke="#1F2937" stroke-linecap="round"></circle> <path d="M13.7679 6.5C13.9657 6.15743 14.2607 5.88121 14.6154 5.70625C14.9702 5.5313 15.3689 5.46548 15.7611 5.51711C16.1532 5.56874 16.5213 5.73551 16.8187 5.99632C17.1161 6.25713 17.3295 6.60028 17.4319 6.98236C17.5342 7.36445 17.521 7.76831 17.3939 8.14288C17.2667 8.51745 17.0313 8.8459 16.7175 9.08671C16.4037 9.32751 16.0255 9.46985 15.6308 9.49572C15.2361 9.52159 14.8426 9.42983 14.5 9.23205" stroke="#1F2937"></path> <path d="M10.2321 6.5C10.0343 6.15743 9.73935 5.88121 9.38458 5.70625C9.02981 5.5313 8.63113 5.46548 8.23895 5.51711C7.84677 5.56874 7.47871 5.73551 7.18131 5.99632C6.88391 6.25713 6.67053 6.60028 6.56815 6.98236C6.46577 7.36445 6.47899 7.76831 6.60614 8.14288C6.73329 8.51745 6.96866 8.8459 7.28248 9.08671C7.5963 9.32751 7.97448 9.46985 8.36919 9.49572C8.76391 9.52159 9.15743 9.42983 9.5 9.23205" stroke="#1F2937"></path> <path d="M12 12.5C16.0802 12.5 17.1335 15.8022 17.4054 17.507C17.4924 18.0524 17.0523 18.5 16.5 18.5H7.5C6.94771 18.5 6.50763 18.0524 6.59461 17.507C6.86649 15.8022 7.91976 12.5 12 12.5Z" stroke="#1F2937" stroke-linecap="round"></path> <path d="M19.2965 15.4162L18.8115 15.5377L19.2965 15.4162ZM13.0871 12.5859L12.7179 12.2488L12.0974 12.9283L13.0051 13.0791L13.0871 12.5859ZM17.1813 16.5L16.701 16.639L16.8055 17H17.1813V16.5ZM15.5 12C16.5277 12 17.2495 12.5027 17.7783 13.2069C18.3177 13.9253 18.6344 14.8306 18.8115 15.5377L19.7816 15.2948C19.5904 14.5315 19.2329 13.4787 18.578 12.6065C17.9126 11.7203 16.9202 11 15.5 11V12ZM13.4563 12.923C13.9567 12.375 14.6107 12 15.5 12V11C14.2828 11 13.3736 11.5306 12.7179 12.2488L13.4563 12.923ZM13.0051 13.0791C15.3056 13.4614 16.279 15.1801 16.701 16.639L17.6616 16.361C17.1905 14.7326 16.019 12.5663 13.1691 12.0927L13.0051 13.0791ZM18.395 16H17.1813V17H18.395V16ZM18.8115 15.5377C18.8653 15.7526 18.7075 16 18.395 16V17C19.2657 17 20.0152 16.2277 19.7816 15.2948L18.8115 15.5377Z" fill="#1F2937"></path> <path d="M10.9129 12.5859L10.9949 13.0791L11.9026 12.9283L11.2821 12.2488L10.9129 12.5859ZM4.70343 15.4162L5.18845 15.5377L4.70343 15.4162ZM6.81868 16.5V17H7.19453L7.29898 16.639L6.81868 16.5ZM8.49999 12C9.38931 12 10.0433 12.375 10.5436 12.923L11.2821 12.2488C10.6264 11.5306 9.71723 11 8.49999 11V12ZM5.18845 15.5377C5.36554 14.8306 5.68228 13.9253 6.22167 13.2069C6.75048 12.5027 7.47226 12 8.49999 12V11C7.0798 11 6.08743 11.7203 5.42199 12.6065C4.76713 13.4787 4.40955 14.5315 4.21841 15.2948L5.18845 15.5377ZM5.60498 16C5.29247 16 5.13465 15.7526 5.18845 15.5377L4.21841 15.2948C3.98477 16.2277 4.73424 17 5.60498 17V16ZM6.81868 16H5.60498V17H6.81868V16ZM7.29898 16.639C7.72104 15.1801 8.69435 13.4614 10.9949 13.0791L10.8309 12.0927C7.98101 12.5663 6.8095 14.7326 6.33838 16.361L7.29898 16.639Z" fill="#1F2937"></path> </g></svg>
                        <p class="fs-2 fw-bolder count-number" data-target="{{$totalRT}}">0</p>
                    </div>
                </div>
            </div>
            <div class="col-lg bg-white rounded-2 margin-1 shadow-sm">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <p class="fs-3 fw-bolder p-2 my-3">Total UMKM</p>
                    </div>
                    <div class="col text-center mt-3">
                        <svg viewBox="0 0 24 24" fill="none" style="width:80px; height:80px" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5 3C3.89543 3 3 3.89543 3 5V6.83772L1.49006 11.3675C1.10052 12.5362 1.8474 13.7393 3 13.963V20C3 21.1046 3.89543 22 5 22H9H10H14H15H19C20.1046 22 21 21.1046 21 20V13.963C22.1526 13.7393 22.8995 12.5362 22.5099 11.3675L21 6.83772V5C21 3.89543 20.1046 3 19 3H5ZM15 20H19V14H17.5H12H6.5H5V20H9V17C9 15.3431 10.3431 14 12 14C13.6569 14 15 15.3431 15 17V20ZM11 20H13V17C13 16.4477 12.5523 16 12 16C11.4477 16 11 16.4477 11 17V20ZM3.38743 12L4.72076 8H6.31954L5.65287 12H4H3.38743ZM7.68046 12L8.34713 8H11V12H7.68046ZM13 12V8H15.6529L16.3195 12H13ZM18.3471 12L17.6805 8H19.2792L20.6126 12H20H18.3471ZM19 5V6H16.5H12H7.5H5V5H19Z" fill="#1F2937"></path> </g></svg>
                        {{-- <svg width="124px" height="124px" viewBox="0 0 24 24" class="" style="width:80px; height:80px" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="8" r="2.5" stroke="#1F2937" stroke-linecap="round"></circle> <path d="M13.7679 6.5C13.9657 6.15743 14.2607 5.88121 14.6154 5.70625C14.9702 5.5313 15.3689 5.46548 15.7611 5.51711C16.1532 5.56874 16.5213 5.73551 16.8187 5.99632C17.1161 6.25713 17.3295 6.60028 17.4319 6.98236C17.5342 7.36445 17.521 7.76831 17.3939 8.14288C17.2667 8.51745 17.0313 8.8459 16.7175 9.08671C16.4037 9.32751 16.0255 9.46985 15.6308 9.49572C15.2361 9.52159 14.8426 9.42983 14.5 9.23205" stroke="#1F2937"></path> <path d="M10.2321 6.5C10.0343 6.15743 9.73935 5.88121 9.38458 5.70625C9.02981 5.5313 8.63113 5.46548 8.23895 5.51711C7.84677 5.56874 7.47871 5.73551 7.18131 5.99632C6.88391 6.25713 6.67053 6.60028 6.56815 6.98236C6.46577 7.36445 6.47899 7.76831 6.60614 8.14288C6.73329 8.51745 6.96866 8.8459 7.28248 9.08671C7.5963 9.32751 7.97448 9.46985 8.36919 9.49572C8.76391 9.52159 9.15743 9.42983 9.5 9.23205" stroke="#1F2937"></path> <path d="M12 12.5C16.0802 12.5 17.1335 15.8022 17.4054 17.507C17.4924 18.0524 17.0523 18.5 16.5 18.5H7.5C6.94771 18.5 6.50763 18.0524 6.59461 17.507C6.86649 15.8022 7.91976 12.5 12 12.5Z" stroke="#1F2937" stroke-linecap="round"></path> <path d="M19.2965 15.4162L18.8115 15.5377L19.2965 15.4162ZM13.0871 12.5859L12.7179 12.2488L12.0974 12.9283L13.0051 13.0791L13.0871 12.5859ZM17.1813 16.5L16.701 16.639L16.8055 17H17.1813V16.5ZM15.5 12C16.5277 12 17.2495 12.5027 17.7783 13.2069C18.3177 13.9253 18.6344 14.8306 18.8115 15.5377L19.7816 15.2948C19.5904 14.5315 19.2329 13.4787 18.578 12.6065C17.9126 11.7203 16.9202 11 15.5 11V12ZM13.4563 12.923C13.9567 12.375 14.6107 12 15.5 12V11C14.2828 11 13.3736 11.5306 12.7179 12.2488L13.4563 12.923ZM13.0051 13.0791C15.3056 13.4614 16.279 15.1801 16.701 16.639L17.6616 16.361C17.1905 14.7326 16.019 12.5663 13.1691 12.0927L13.0051 13.0791ZM18.395 16H17.1813V17H18.395V16ZM18.8115 15.5377C18.8653 15.7526 18.7075 16 18.395 16V17C19.2657 17 20.0152 16.2277 19.7816 15.2948L18.8115 15.5377Z" fill="#1F2937"></path> <path d="M10.9129 12.5859L10.9949 13.0791L11.9026 12.9283L11.2821 12.2488L10.9129 12.5859ZM4.70343 15.4162L5.18845 15.5377L4.70343 15.4162ZM6.81868 16.5V17H7.19453L7.29898 16.639L6.81868 16.5ZM8.49999 12C9.38931 12 10.0433 12.375 10.5436 12.923L11.2821 12.2488C10.6264 11.5306 9.71723 11 8.49999 11V12ZM5.18845 15.5377C5.36554 14.8306 5.68228 13.9253 6.22167 13.2069C6.75048 12.5027 7.47226 12 8.49999 12V11C7.0798 11 6.08743 11.7203 5.42199 12.6065C4.76713 13.4787 4.40955 14.5315 4.21841 15.2948L5.18845 15.5377ZM5.60498 16C5.29247 16 5.13465 15.7526 5.18845 15.5377L4.21841 15.2948C3.98477 16.2277 4.73424 17 5.60498 17V16ZM6.81868 16H5.60498V17H6.81868V16ZM7.29898 16.639C7.72104 15.1801 8.69435 13.4614 10.9949 13.0791L10.8309 12.0927C7.98101 12.5663 6.8095 14.7326 6.33838 16.361L7.29898 16.639Z" fill="#1F2937"></path> </g></svg> --}}
                        <p class="fs-2 fw-bolder count-number" data-target="{{$totalUmkm}}">0</p>
                    </div>
                </div>
            </div>
            <div class="col-lg bg-white rounded-2 margin-1 shadow-sm">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <p class="fs-3 fw-bolder p-2 my-3">Total Keluarga</p>
                    </div>
                    <div class="col text-center mt-3">
                        <svg fill="#1F2937" version="1.1" id="Layer_1" style="width:80px; height:80px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M255.998,179.2c-28.228,0-51.2,22.972-51.2,51.2s22.972,51.2,51.2,51.2s51.2-22.972,51.2-51.2 S284.227,179.2,255.998,179.2z M255.998,256c-14.14,0-25.6-11.46-25.6-25.6c0-14.14,11.46-25.6,25.6-25.6 c14.14,0,25.6,11.46,25.6,25.6C281.598,244.54,270.138,256,255.998,256z"></path> </g> </g> <g> <g> <path d="M510.164,400.094l-47.718-119.296l22.63-67.9c2.603-7.808,1.297-16.393-3.516-23.066 c-4.804-6.673-12.535-10.633-20.762-10.633h-102.4c-8.226,0-15.957,3.959-20.77,10.633c-4.813,6.673-6.118,15.258-3.516,23.066 l22.63,67.9l-34.065,85.171l-16.247-64.981c-2.85-11.392-13.082-19.388-24.832-19.388h-25.6h-25.6 c-11.75,0-21.982,7.996-24.832,19.388l-4.898,19.575l-21.879-120.346c-2.21-12.169-12.817-21.018-25.19-21.018h-102.4 c-12.373,0-22.972,8.849-25.182,21.026l-25.6,140.8c-1.357,7.467,0.666,15.155,5.53,20.983c4.864,5.828,12.066,9.19,19.652,9.19 h16.358l9.327,117.231C52.342,501.734,63.444,512,76.798,512h51.2c13.355,0,24.465-10.266,25.523-23.569L162.84,371.2h16.358 c3.26,0,6.366-0.896,9.327-2.074l-8.567,34.27c-1.911,7.646-0.196,15.753,4.659,21.965c4.855,6.204,12.297,9.839,20.181,9.839 v51.2c0,14.14,11.46,25.6,25.6,25.6h51.2c14.14,0,25.6-11.46,25.6-25.6v-51.2c4.54,0,8.747-1.485,12.587-3.695 c3.9,2.321,8.337,3.695,13.013,3.695h25.6v51.2c0,14.14,11.46,25.6,25.6,25.6h51.2c14.14,0,25.6-11.46,25.6-25.6v-51.2h25.6 c8.499,0,16.435-4.215,21.197-11.247C512.357,416.922,513.321,407.979,510.164,400.094z M139.194,345.6l-11.196,140.8h-51.2 L65.603,345.6H25.598l25.6-140.8h102.4l25.6,140.8H139.194z M281.598,409.6v76.8h-51.2v-76.8h-25.6l25.6-102.4h51.2l25.6,102.4 H281.598z M435.198,409.6v76.8h-51.2v-76.8h-51.2l51.2-128l-25.6-76.8h102.4l-25.6,76.8l51.2,128H435.198z"></path> </g> </g> <g> <g> <path d="M409.598,0c-42.351,0-76.8,34.449-76.8,76.8c0,42.351,34.449,76.8,76.8,76.8s76.8-34.449,76.8-76.8 C486.398,34.449,451.949,0,409.598,0z M409.598,128c-28.279,0-51.2-22.921-51.2-51.2s22.921-51.2,51.2-51.2 c28.279,0,51.2,22.921,51.2,51.2S437.878,128,409.598,128z"></path> </g> </g> <g> <g> <rect x="76.798" y="76.8" width="0.001" height="0.001"></rect> </g> </g> <g> <g> <path d="M102.398,0c-42.342,0-76.8,34.449-76.8,76.8c0,42.351,34.458,76.8,76.8,76.8c42.351,0,76.8-34.449,76.8-76.8 C179.198,34.449,144.749,0,102.398,0z M102.398,128c-28.279,0-51.2-22.921-51.2-51.2s22.921-51.2,51.2-51.2s51.2,22.921,51.2,51.2 S130.678,128,102.398,128z"></path> </g> </g> </g></svg>
                        {{-- <svg width="124px" height="124px" viewBox="0 0 24 24" class="" style="width:80px; height:80px" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="8" r="2.5" stroke="#1F2937" stroke-linecap="round"></circle> <path d="M13.7679 6.5C13.9657 6.15743 14.2607 5.88121 14.6154 5.70625C14.9702 5.5313 15.3689 5.46548 15.7611 5.51711C16.1532 5.56874 16.5213 5.73551 16.8187 5.99632C17.1161 6.25713 17.3295 6.60028 17.4319 6.98236C17.5342 7.36445 17.521 7.76831 17.3939 8.14288C17.2667 8.51745 17.0313 8.8459 16.7175 9.08671C16.4037 9.32751 16.0255 9.46985 15.6308 9.49572C15.2361 9.52159 14.8426 9.42983 14.5 9.23205" stroke="#1F2937"></path> <path d="M10.2321 6.5C10.0343 6.15743 9.73935 5.88121 9.38458 5.70625C9.02981 5.5313 8.63113 5.46548 8.23895 5.51711C7.84677 5.56874 7.47871 5.73551 7.18131 5.99632C6.88391 6.25713 6.67053 6.60028 6.56815 6.98236C6.46577 7.36445 6.47899 7.76831 6.60614 8.14288C6.73329 8.51745 6.96866 8.8459 7.28248 9.08671C7.5963 9.32751 7.97448 9.46985 8.36919 9.49572C8.76391 9.52159 9.15743 9.42983 9.5 9.23205" stroke="#1F2937"></path> <path d="M12 12.5C16.0802 12.5 17.1335 15.8022 17.4054 17.507C17.4924 18.0524 17.0523 18.5 16.5 18.5H7.5C6.94771 18.5 6.50763 18.0524 6.59461 17.507C6.86649 15.8022 7.91976 12.5 12 12.5Z" stroke="#1F2937" stroke-linecap="round"></path> <path d="M19.2965 15.4162L18.8115 15.5377L19.2965 15.4162ZM13.0871 12.5859L12.7179 12.2488L12.0974 12.9283L13.0051 13.0791L13.0871 12.5859ZM17.1813 16.5L16.701 16.639L16.8055 17H17.1813V16.5ZM15.5 12C16.5277 12 17.2495 12.5027 17.7783 13.2069C18.3177 13.9253 18.6344 14.8306 18.8115 15.5377L19.7816 15.2948C19.5904 14.5315 19.2329 13.4787 18.578 12.6065C17.9126 11.7203 16.9202 11 15.5 11V12ZM13.4563 12.923C13.9567 12.375 14.6107 12 15.5 12V11C14.2828 11 13.3736 11.5306 12.7179 12.2488L13.4563 12.923ZM13.0051 13.0791C15.3056 13.4614 16.279 15.1801 16.701 16.639L17.6616 16.361C17.1905 14.7326 16.019 12.5663 13.1691 12.0927L13.0051 13.0791ZM18.395 16H17.1813V17H18.395V16ZM18.8115 15.5377C18.8653 15.7526 18.7075 16 18.395 16V17C19.2657 17 20.0152 16.2277 19.7816 15.2948L18.8115 15.5377Z" fill="#1F2937"></path> <path d="M10.9129 12.5859L10.9949 13.0791L11.9026 12.9283L11.2821 12.2488L10.9129 12.5859ZM4.70343 15.4162L5.18845 15.5377L4.70343 15.4162ZM6.81868 16.5V17H7.19453L7.29898 16.639L6.81868 16.5ZM8.49999 12C9.38931 12 10.0433 12.375 10.5436 12.923L11.2821 12.2488C10.6264 11.5306 9.71723 11 8.49999 11V12ZM5.18845 15.5377C5.36554 14.8306 5.68228 13.9253 6.22167 13.2069C6.75048 12.5027 7.47226 12 8.49999 12V11C7.0798 11 6.08743 11.7203 5.42199 12.6065C4.76713 13.4787 4.40955 14.5315 4.21841 15.2948L5.18845 15.5377ZM5.60498 16C5.29247 16 5.13465 15.7526 5.18845 15.5377L4.21841 15.2948C3.98477 16.2277 4.73424 17 5.60498 17V16ZM6.81868 16H5.60498V17H6.81868V16ZM7.29898 16.639C7.72104 15.1801 8.69435 13.4614 10.9949 13.0791L10.8309 12.0927C7.98101 12.5663 6.8095 14.7326 6.33838 16.361L7.29898 16.639Z" fill="#1F2937"></path> </g></svg> --}}
                        <p class="fs-2 fw-bolder count-number" data-target="{{$totalKeluarga}}">0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-2">
            <div class="col-lg-9 my-lg-0 my-2">
                <canvas id="myChart"></canvas>
            </div>
            <div class="overflow-auto col-lg-3 bg-white rounded-2 shadow-sm" style="max-height: 457px">
                <p class="fs-5 text-center fw-bold p-2">Jumlah Penduduk berdasarkan</p>
                <div class="col rounded-2 my-2 p-2 shadow-sm ">
                    <p class="fw-bolder my-2">Laki-laki : {{$totalLaki}}</p>
                </div>
                <div class="col rounded-2 my-2 p-2 shadow-sm">
                    <p class="fw-bolder my-2">Perempuan : {{$totalPerempuan}}</p>
                    {{-- <p>Perempuan</p> --}}
                </div>
                <div class="col rounded-2 my-2 p-2 shadow-sm">
                    <p class="fw-bolder my-2">Balita : {{$totalBalita}}</p>
                </div>
                <div class="col rounded-2 my-2 p-2 shadow-sm">
                    <p class="fw-bolder my-2">Kanak-kanak : {{$totalKanak}}</p>
                </div>
                <div class="col rounded-2 my-2 p-2 shadow-sm">
                    <p class="fw-bolder my-2">Remaja : {{$totalRemaja}}</p>
                </div>
                <div class="col rounded-2 my-2 p-2 shadow-sm">
                    <p class="fw-bolder my-2">Dewasa : {{$totalDewasa}}</p>
                </div>
                <div class="col rounded-2 my-2 p-2 shadow-sm">
                    <p class="fw-bolder my-2">Lansia : {{$totalLansia}}</p>
                </div>
                {{-- <div class="col rounded-2 my-2 p-2 shadow-sm">
                    <p>RT 07</p>
                </div> --}}
            </div>
        </div>

        <div class="iframe-card">
            <p class="fs-5 text-center fw-bold p-2">Jumlah Penduduk Menurut Jenis Kelamin (Looker Studio)</p>
            <div class="iframe-container">
                <iframe width="100%" height="100%"
                    src="https://lookerstudio.google.com/embed/reporting/6c48cf5d-a032-4416-8149-828aae71cd4a/page/tiJ2D"
                    frameborder="0" style="border:0" allowfullscreen
                    sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
            </div>
        </div>

        <div class="row bg-white shadow-sm mx-2 my-2 rounded-2">
            <div class="col">
                <p class="fs-5 text-center fw-bold p-2">Kegiatan akan datang</p>
                <div class="container-kegiatan my-2">
                    @foreach ($kegiatan as $item)
                        <div class="kegiatan-item">
                            <div class="bg-white rounded-2 text-wrap container me-1 p-1">
                                <p class="fw-bolder">{{ $item->nama }}</p>
                                <p>{{ $item->tanggal }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.addEventListener('load', function() {
        const countNumbers = document.querySelectorAll('.count-number');

        countNumbers.forEach(countNumber => {
            const target = parseInt(countNumber.getAttribute('data-target'));

            let currentNumber = 0;
            const counter = setInterval(() => {
            if (currentNumber < target) {
                currentNumber++;
                countNumber.textContent = currentNumber;
            } else {
                clearInterval(counter);
            }
            }, 50); // Sesuaikan kecepatan animasi dengan mengubah nilai ini (dalam milidetik)
        });
        });
    </script>
    <script>
        const ctx = document.getElementById('myChart');

        var chartData = <?php echo json_encode($chartData); ?>;

            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
      </script>
@endsection
