

<?php



Breadcrumbs::for('browse', function ($trail, $sector) {
    $trail->push($sector, route('browse', $sector));
});


Breadcrumbs::for('groups', function ($trail, $sector) {
    $trail->push('groups', route('groups', $sector));
});