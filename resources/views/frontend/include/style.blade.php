<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/ar-style.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
{{-- <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}

{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
{{-- Select 2 --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #ffffff;
        background: #2196f3;
        padding: 3px 7px;
        border-radius: 3px;
    }

    .bootstrap-tagsinput {
        width: 100%;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border-radius: 4px;
        height: 39px;
    }

    @keyframes growProgressBar {

        0%,
        33% {
            --pgPercentage: 0;
        }

        100% {
            --pgPercentage: var(--value);
        }
    }



    div[role="progressbar"] {
        --size: 60px;
        --fg: #293C3E;
        --bg: #FDFDFD;
        --pgPercentage: var(--value);
        animation: growProgressBar 3s 1 forwards;
        width: var(--size);
        height: var(--size);
        border-radius: 50%;
        display: grid;
        place-items: center;
        background:
            radial-gradient(closest-side, white 86%, transparent 0 99.9%, white 0),
            conic-gradient(var(--fg) calc(var(--pgPercentage) * 1%), var(--bg) 0);
        font-family: Helvetica, Arial, sans-serif;
        font-size: calc(var(--size) / 5);
        color: var(--fg);
    }

    div[role="progressbar"]::before {
        counter-reset: percentage var(--value);
        content: counter(percentage) '%';
    }

    :root {
        --pgPercentage: 0;
    }

    :root {
        --pgPercentage: <number>;
    }

    .element {
        --pgPercentage: 50;
    }

    h2.m-0 {
        font-size: 24px;
        font-weight: 500;
    }
</style>
