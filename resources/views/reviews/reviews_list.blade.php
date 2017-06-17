<div class="infinite-scroll">
    @foreach($reviews as $review)
        <div class="row">
            <div class="col-sm-8">
                <div class="panel panel-review panel-default">
                    <div class="panel-heading panel-heading-fix panel-heading-review">
                        <span class="glyphicon glyphicon-user"></span><span class="text-muted" style="margin-right: 10px"><u><b>{{$review->user->username}}</b></u></span>
                        <span class="glyphicon glyphicon-time"></span><span class="text-muted"><u><b>{{$review->created_at}}</b></u></span>
                        <div class="text-center pull-right">
                            <label for="rating_star_2">{{$review->rating->rating}}</label>
                            <input id="rating_star_2" name="rating_star_show_2"
                                   value="{{$review->rating->rating}}" class="rating-star-show rating-loading" data-size="xs">
                        </div>

                    </div>
                    <div class="panel-body">
                        {{$review->review}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{ $reviews->links() }}

</div>