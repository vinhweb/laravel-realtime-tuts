@extends('layouts.app')

@push('styles')
<style>
    @keyframes rotate {
        from{
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    .refresh{
        animation: rotate 1s linear infinite;
    }
</style>
@endpush


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Game') }}</div>

                <div class="card-body">
                    <div class="text-center">
                        <img id="circle" class="" src="{{asset('img/circle.png')}}" height="250" width="250" alt="" srcset="">
                        <p id="winner" class="display-1 d-none text-primary"></p>
                    </div>

                    <hr>

                    <div class="text-center">
                        <label for="bet" class="font-weight-bold h5">Cá cược</label>
                        <select id="bet" class="custom-select col-auto">
                            <option selected>Không chọn</option>
                            @foreach(range(1,12) as $number)
                                <option value="{{$number}}">{{$number}}</option>
                            @endforeach
                        </select>
                        <hr>

                        <p class="font-weight-bold h5">Thời gian còn lại</p>
                        <p id="timer" class="h5 text-danger">Chờ để bắt đầu</p>

                        <hr>

                        <div id="result" class="h1"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module">
    const circleElement = document.getElementById('circle')
    const timerElement = document.getElementById('timer')
    const winnerElement = document.getElementById('winner')
    const betElement = document.getElementById('bet')
    const resultElement = document.getElementById('result')

    Echo.channel('game')
        .listen('RemainingTimeChanged', (e) => {
            timerElement.innerText = e.time

            circleElement.classList.add('refresh')
            winnerElement.classList.add('d-none')


            resultElement.innerText = ""
            resultElement.classList.remove('text-success')
            resultElement.classList.remove('text-danger')
        })
        .listen('WinnerNumberGenerated', (e) => {
            const bet = betElement[betElement.selectedIndex].innerText

            circleElement.classList.remove('refresh')

            const winnerNumber = e.number
            winnerElement.innerText = winnerNumber;
            winnerElement.classList.remove('d-none')

            if(bet == winnerNumber){
                resultElement.innerText = "Bạn THẮNG"
                resultElement.classList.add('text-success')
            } else {
                resultElement.innerText = "Bạn THUA"
                resultElement.classList.add('text-danger')
            }
        })
</script>
@endpush