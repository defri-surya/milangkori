<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ GoogleTranslate::trans('Rating', session()->get('language') ?? 'id') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    <style>
        body {
            background-color: #f7f6f6;
        }

        .card {
            width: 350px;
            border: none;
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 12px;
        }

        .circle-image img {
            border: 6px solid #fff;
            border-radius: 100%;
            padding: 0px;
            top: -28px;
            position: relative;
            width: 70px;
            height: 70px;
            border-radius: 100%;
            z-index: 1;
            background: #e7d184;
            cursor: pointer;
        }

        .name {
            margin-top: -21px;
            font-size: 18px;
        }

        .fw-500 {
            font-weight: 500 !important;
        }

        .start {

            color: green;
        }

        .stop {
            color: red;
        }

        .rate {
            border-bottom-right-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }

        .buttons {
            top: 36px;
            position: relative;
        }

        .rating-submit {
            border-radius: 15px;
            color: #fff;
            height: 49px;
        }

        .rating-submit:hover {
            color: #fff;
        }
    </style>
</head>

<body>
    <form action="{{ route('rattingStore') }}" method="POST">
        @csrf
        @foreach ($dataTrans as $index => $value)
            <div class="container d-flex justify-content-center mt-5">
                <div class="card text-center">
                    <div class="circle-image">
                        <img src="{{ asset($value->paketWisata->foto1) }}" width="50">
                    </div>
                    <span class="name mb-1 fw-500">{{ $value->paketWisata->nama_paket_wisata }}</span>
                    <input type="hidden" name="order_code" value="{{ $value->nomor_urut }}">
                    <div class="rate bg-success py-3 text-white mt-3">
                        <h6 class="mb-0">
                            {{ GoogleTranslate::trans('Rate this tour package', session()->get('language') ?? 'id') }}
                        </h6>
                        <div class="rating">
                            <input type="radio" name="rating[{{ $index }}][]" value="5"
                                id="5_{{ $index }}">
                            <label for="5_{{ $index }}">☆</label>
                            <input type="radio" name="rating[{{ $index }}][]" value="4"
                                id="4_{{ $index }}">
                            <label for="4_{{ $index }}">☆</label>
                            <input type="radio" name="rating[{{ $index }}][]" value="3"
                                id="3_{{ $index }}">
                            <label for="3_{{ $index }}">☆</label>
                            <input type="radio" name="rating[{{ $index }}][]" value="2"
                                id="2_{{ $index }}">
                            <label for="2_{{ $index }}">☆</label>
                            <input type="radio" name="rating[{{ $index }}][]" value="1"
                                id="1_{{ $index }}">
                            <label for="1_{{ $index }}">☆</label>
                        </div>
                        <div class="rating">
                            <textarea name="comment[{{ $index }}][]" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container d-flex justify-content-center">
            <div class="text-white">
                <div class="buttons px-4">
                    <button
                        class="btn btn-warning btn-block rating-submit">{{ GoogleTranslate::trans('Submit', session()->get('language') ?? 'id') }}</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
