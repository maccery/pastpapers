@if(count($answers) == 0)
    <p>There are no answers yet</p>
@else
    <table class="table">
        @foreach ($answers as $answer)
            <tr>
                <td>
                    @include('answer.vote', ['answer' => $answer])
                </td>
                <td class="answer">
                    <h4>- written by <a href="{{ route('view_user', $answer->author->id) }}">{{ $answer->author->name }}</a>,
                        @if($answer->author->isTopUser())
                            {{ $answer->author->isTopUser() }} <img data-toggle="tooltip" title="Verified users are answerers from reputable background sources, such as {{ $answer->author->isTopUser() }}" height="20" src="{{ secure_asset_production('images/verified.png') }}">
                        @endif
                        <span class="label label-default">Level {{ $answer->author->level[0] }}/{{ $answer->author->level[1] }}</span>
                    <small>{{ $answer->created_at->diffForHumans() }}</small></h4>
                    <?php $paragraphs = explode(PHP_EOL, $answer->description); ?>
                    @foreach($paragraphs as $paragraph)
                        <p>{% $paragraph %}</p>
                    @endforeach
                    <p>@include('segment.tags', ['tags' => $answer->tags])</p>
                </td>
            </tr>
        @endforeach
    </table>
@endif