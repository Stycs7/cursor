<?php
/**
 * Template Name: About
 *
 * @package ShearwaterVF
 */

get_header();
?>
<section class="page-hero">
    <div class="wrap">
        <p class="eyebrow">Since 1984</p>
        <h1>Pioneers, then hosts.</h1>
        <p class="lede">We began as a canoeing company on the upper Zambezi. Today Shearwater is one of the largest operators in Victoria Falls — still taught by the guests who keep coming back.</p>
    </div>
</section>
<section class="section" style="padding-top:0;">
    <div class="wrap split">
        <div>
            <p>Let us take you from arrival to departure: airport transfer, a room at Explorers Village, a table, and the day’s river, air, or bush. We operate across Victoria Falls, Livingstone, and Chobe.</p>
            <p>Every new boat, aircraft hour, and lodge wing has had the same brief — make the experience clearer, safer, and more itself.</p>
        </div>
        <div class="timeline">
            <?php
            $beats = array(
                '1984' => array('Pioneers', 'Canoe safaris on the upper Zambezi.'),
                '1985' => array('Trailblazing', 'First white-water rafting company in the Batoka Gorge.'),
                '1994' => array('Flying high', 'Zambezi helicopter company launched; investment in the bungee.'),
                '2002' => array('Cruising', 'A 24-seat cruise boat on the upper Zambezi.'),
                '2004' => array('Jetboating', 'Jetboat adventures on the rapids below the Falls.'),
                '2005' => array('Game drives', 'Day and night drives at the Stanley and Livingstone reserve.'),
                '2018' => array('Explorers Village', 'The lodge opens 400 metres from the Falls.'),
                '2023' => array('Spirit of Africa', 'Premiere of Simunye at Victoria Falls Theatre.'),
            );
            foreach ($beats as $year => $row) :
            ?>
                <div class="tl-item">
                    <b><?php echo esc_html($year); ?></b>
                    <h3><?php echo esc_html($row[0]); ?></h3>
                    <p><?php echo esc_html($row[1]); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
