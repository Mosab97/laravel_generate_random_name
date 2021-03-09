<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<div class="container">

    <form class="form" method="get" style="margin-top: 150px" action="{{route('generate')}}">
        <!--begin::Title-->
{{--        @CSRF--}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <input
                        class="form-control h-auto py-5 px-0 border-x-0 border-top-0 rounded-0 border-bottom mb-2"
                        type="text" value="{{isset($word)? $word : 'pizza'}}"
                        placeholder="Enter Word" name="word"
                    />

                    @error('word')
                    <span class="text-danger opacity-70" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                    @enderror

                </div>
            </div>
            <div class="col-md-2">
{{--                <input type="number" class="form-control" name="number" value="{{isset($number)?$number : 1}}">--}}

                <div class="form-group d-flex flex-wrap text-center mx-auto">
                    <button type="submit"
                            class="btn btn-primary btn-pill font-weight-bolder px-8 py-4 my-3 mx-auto">{{ __('Generate') }}
                    </button>
                </div>
            </div>
        </div>


    </form>

    @isset($words)
        <h3>The number of words : {{count($words)}}</h3>
        <table class="table table-bordered">

            <tbody>

            @php($count = 0)
            @php($i = 1)


            @foreach($words as $word)
                @if($i == 1)
                    <tr>
                        @endif
                        <td width="25%">{{$word}}</td>
                        @if($i == 4)
                    </tr>
                    @php($i= 1)
                @else
                    @php($i += 1)
                @endif

                @php($count += 1)

            @endforeach


            </tbody>
        </table>
    @endisset

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
