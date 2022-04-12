<div class="container">
    <a href="{{ route('NewQuizz') }}"
       class="btn3d btn btn-success form-control">ثبت سوال جدید</a>

    <div class="row">
        @foreach($quzzies as $quiz)
            <div class="col-12">
                <a href="/quiz/{{$quiz->id}}" class="btn3d btn btn-default form-control">
                    <p>{{$quiz->description}}</p>
                    <span>{{$quiz->status}}</span>
                </a>
            </div>
        @endforeach
    </div>
</div>
