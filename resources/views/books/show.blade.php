@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 row">

                    <div class="book col-12" style="height: 400px">
                        <div class="card  text-center">
                            <img style="height:350px;width: 30%" class="card-img-top align-self-center" src="{{asset('storage/books/' . $book['image'])}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><span style="color: #4c0ab8; font-weight:bold">Book Name</span> : {{$book['name']}}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span style="color: red; font-weight:bold">Author</span> : {{$book['author']}}</li>
                                <li class="list-group-item"><span style="color: blue; font-weight:bold">Category</span> : <a href="">{{$book->category->name}}</a></li>
                                <li class="list-group-item"><span style="color: green; font-weight:bold">Publisher</span> : {{ucwords($book->publisher->name)}}</li>
                            </ul>


                            <br>

                            <li class="list-group-item"><span style="color: #00a87d; font-weight:bold">Download</span> : <a href="#">{{$book['bookpdf']}}</a></li>

                        </div><br>
                        <a href="{{url('/')}}"><button class=" text-center btn btn-success">All Books <-</button></a><br><br><br><br>
                        <h2>Comments : <span style="color: darkgreen">{{count($comments)}}</span></h2><br><br>

                        <div class="row">
                            @forelse($comments as $comment)
                                    <div class="col-md-12  border border-dark rounded p-4 m-4 ">
                                        <div class="media g-mb-30 media-comment">
                                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                                <div class="g-mb-15">
                                                    <h2 class="h2 mb-0">{{$comment->writer->name}}</h2>
                                                    <span class="g-color-gray-dark-v4 g-font-size-12">{{ $comment->created_at->diffForHumans()}}</span>
                                                </div>

                                                <p>{{$comment->comment}}</p>

                                            </div>

                                        </div>

                                    </div>





                                @empty
                                <p>No Comments Yet</p><br>
                        @endforelse

                            @auth
                                <form action="comments/store" method="post" class="form-group shadow-textarea">
                                    @csrf
                                    <input type="hidden" name="book" value="{{$book['id']}}">
                                    <br>
                                    <label for="exampleFormControlTextarea6">Leave A Comment</label>
                                    <textarea name="comment" class="form-control z-depth-1" id="exampleFormControlTextarea6" cols="120" rows="7" placeholder="Write Your Comment"></textarea><br>
                                    <input type="submit" class="btn btn-success btn-lg" value="Comment">
                                </form>
                            @endauth
                            @guest
                                   <a href="{{url('login')}}"> <div class="alert alert-success">Login To Comment</div></a>
                            @endguest
                        </div>
                    </div>


            </div>

        </div>


    </div>

@endsection
