<table class="table">
    <tr>
        <td><b>Release date</b></td>
        <td>{{ $version->release_date }} <span class="glyphicon glyph-{{ ($version->confirmed_release_date) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span></td>
    </tr>
    <tr>
        <td><b>Released</b></td>
        <td><span class="glyphicon glyph-{{ ($version->isReleased()) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span> </td>
    </tr>
</table>