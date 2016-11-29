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
            <p>Does this version exist?</p>
            @include('review.version_vote', ['version' => $version])
        </div>
    </div>
</div>