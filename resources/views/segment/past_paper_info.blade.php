<table class="table">
    <tr>
        <td><b>Past paper confirmed</b></td>
        <td><span class="glyphicon glyph-{{ ($past_paper->confirmed_real) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span></td>
    </tr>
    <tr>
        <td><b>Release date</b></td>
        <td>{{ $past_paper->release_date }} <span class="glyphicon glyph-{{ ($past_paper->confirmed_release_date) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span></td>
    </tr>
    <tr>
        <td><b>Released</b></td>
        <td><span class="glyphicon glyph-{{ ($past_paper->isReleased()) ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span> </td>
    </tr>
</table>
