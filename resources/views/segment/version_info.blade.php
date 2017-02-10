<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <td><b>Version confirmed</b></td>
                    <td><span class="glyphicon glyph-{{ ($version->confirmed_real) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span></td>
                </tr>
                <tr>
                    <td><b>Release date</b></td>
                    <td>{{ $version->release_date }} <span class="glyphicon glyph-{{ ($version->confirmed_release_date) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span></td>
                </tr>
                <tr>
                    <td><b>Released</b></td>
                    <td><span class="glyphicon glyph-{{ ($version->isReleased()) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span> </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            @if(!$version->confirmed_real or !$version->confirmed_release_date)
            <b>Help improve our data</b>
            @endif

            @if(!$version->confirmed_real)
                <p>Does this version exist?</p>
                @include('review.version_vote', ['voting_type' => 'version', 'version' => $version])
            @endif

            @if(!$version->confirmed_release_date)
            <p><a href="{{ route('suggest_dates', ['version' => $version]) }}">Suggest a release date</a></p>
            @endif
        </div>
    </div>
</div>