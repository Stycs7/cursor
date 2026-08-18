<?php
/**
 * Placeholder photography (Unsplash) used until media is uploaded in WP Admin.
 *
 * @package ShearwaterVF
 */

function shearwater_vf_images() {
    return array(
        'falls'      => 'https://images.unsplash.com/photo-1614027164847-a0b4cba92997?auto=format&fit=crop&w=2000&q=80',
        'raft'       => 'https://images.unsplash.com/photo-1530866495561-5072a89b13d4?auto=format&fit=crop&w=1600&q=80',
        'heli'       => 'https://images.unsplash.com/photo-1473496169904-658ba7c44d8a?auto=format&fit=crop&w=1600&q=80',
        'cruise'     => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80',
        'bridge'     => 'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=1600&q=80',
        'safari'     => 'https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=1600&q=80',
        'elephant'   => 'https://images.unsplash.com/photo-1557050543-4d5f4e07ef46?auto=format&fit=crop&w=1600&q=80',
        'hike'       => 'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=1600&q=80',
        'theatre'    => 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=1600&q=80',
        'lodge'      => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=1600&q=80',
        'pool'       => 'https://images.unsplash.com/photo-1540541338287-41700207dee6?auto=format&fit=crop&w=1200&q=80',
        'room'       => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1200&q=80',
        'dining'     => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1200&q=80',
        'sunset'     => 'https://images.unsplash.com/photo-1503656142023-618e7ec04f14?auto=format&fit=crop&w=2000&q=80',
    );
}

function shearwater_vf_image($key) {
    $images = shearwater_vf_images();
    return $images[$key] ?? $images['falls'];
}
