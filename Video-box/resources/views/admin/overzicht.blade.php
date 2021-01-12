@extends('./templates/admin-account')

@section('content')
<h1>Overzicht</h1>
  


    <table  class="table table-striped">
        @foreach($reviews as $review)
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Review Content</th>
                    <th scope="col">Publication</th>

                </tr>
            </thead>

            <tr>

                <td><a href="{{ route('review.details', ['id'=> $review->id]) }}">{{ $review->title }}</a></td>
                <td>{{ $review->description }} </td>
                <td>{{ $review->pub_date }} </td>




            </tr>

        @endforeach

        {{ $reviews->links() }}
    </table>