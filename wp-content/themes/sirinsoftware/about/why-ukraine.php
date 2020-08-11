<?php
/**
 * Check user region
 * Europe - show other content
 */
if( $curl = curl_init() ) {
    $ip = $_SERVER["REMOTE_ADDR"];
    curl_setopt($curl, CURLOPT_URL, 'http://api.sypexgeo.net/json/'.$ip);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    $out = curl_exec($curl);
    $matches = array();
    curl_close($curl);
    $out = json_decode($out);
    $region = explode('/',$out->region->timezone)[0];
    if($region === 'Europe') {
        $show_europe = true;
    } else {
        $show_europe = false;
    }
}
?>


<div id="about_expertise" class="about-content why-ukraine-page">
	<h2 class="first-header"><?php the_title();?></h2>
    <div class="line"></div>
    <div class="container">
        <div class="row">
            <div class="one column">
                <p class="why-ukraine-page-header-description">
                    Ukraine is one of the top players in the IT developers market. More and more companies are considering Ukraine as their primary destination for outsourcing the development of their software products or even opening their R&D labs or development offices there.
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="half column">
                <div class="item building">
                    <div class="item-image">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/building.png' ?>" alt="">
                    </div>
                    <h3 class="item-header">variety of IT industry</h3>
                    <div class="item-description">1000+ IT service companies including product copmanies and R&D centers. </div>
                </div>
            </div>
            <div class="half column">
                <div class="item awarage">
                    <div class="item-image">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/awarage.png' ?>" alt="">
                    </div>
                    <h3 class="item-header">Proved competence</h3>
                    <div class="item-description">Ukraine is 3rd in the world by the number of certified technical specialists.</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="half column">
                <?php if($show_europe) { ?>
                    <div class="item europe">
                        <div class="item-image">
                            <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/europe.png' ?>" alt="">
                        </div>
                        <h3 class="item-header">clear destination</h3>
                        <div class="item-description">Citizens of EU countries do not need a visa to enter Ukraine. Ukrainians can travel to the EU for 90 days without a prior visa. Traveling to Ukraine by plane takes 2-3 hours .</div>
                    </div>
                <?php } else { ?>
                    <div class="item watcher">
                        <div class="item-image">
                            <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/watcher.png' ?>" alt="">
                        </div>
                        <h3 class="item-header">time overlapping</h3>
                        <div class="item-description">7 hours ahead of the US, which means Ukrainian teams work while customers sleep. Overlapping working hours for calls/meetings
                            between US clients and Ukrainian developers.</div>
                    </div>
                <?php } ?>
            </div>
            <div class="half column">
                <div class="item planet">
                    <div class="item-image">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/planet.png' ?>" alt="">
                    </div>
                    <h3 class="item-header">international destination</h3>
                    <div class="item-description"> 100+ multinational R&D centers. Including Apple, Aricent, Microsoft, Boeing, Deutsche Bank, Siemens, Samsung, IBM, Ericsson, Magento, and Oracle. 230,000 IT professionals</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="half column">
                <div class="item student">
                    <div class="item-image">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/student.png' ?>" alt="">
                    </div>
                    <h3 class="item-header">educational system</h3>
                    <div class="item-description">Ukraine’s 402 universities graduate nearly 40,000 graduates per year — more than Japan, the Netherlands, Sweden, Norway, or Belgium.</div>
                </div>
            </div>
            <div class="half column">
                <div class="item peoples">
                    <div class="item-image">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/people.png' ?>" alt="">
                    </div>
                    <h3 class="item-header">easy communication</h3>
                    <div class="item-description">About 40% of the IT specialists and developers speak fluent English, and 38.5% are at an upper intermediate English level.</div>
                </div>
            </div>
        </div>



        <h2 class="second-header">
            UKRAINE IN INTERNATIONAL RANKINGS
        </h2>
        <div class="line"></div>

        <div class="box">
            <div class="box-header cup">
                <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/cup.png' ?>" alt="">
                <div class="place">1 st</div>
            </div>
            <div class="box-items">
<!--                        <div class="vertical"></div>-->
                <div class="box-item">
                    <div class="vertical"></div>
                   <div class="horizont"></div>
                   <div class="image gsa">
                       <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/1-t-gsa.png' ?>" alt="">
                   </div>
                   <div class="description">
                       <h3>Global soursing assosiation</h3>
                       <p>Offshoring destination</p>
                   </div>
                </div>
                <div class="box-item">
                    <div class="vertical"></div>
                    <div class="horizont"></div>
                    <div class="image ceeoa">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/1-t-ceeoa.png' ?>" alt="">
                    </div>
                    <div class="description">
                        <h3>Central and Eastern European Outsourcing Association</h3>
                        <p>In CEE by outsourcing volume</p>
                    </div>
                </div>
                <div class="box-item">
                    <div class="vertical"></div>
                    <div class="horizont"></div>
                    <div class="image journal">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/1-t-journal.png' ?>" alt="">
                    </div>
                    <div class="description">
                        <h3>outsourcing journal</h3>
                        <p>Outsourcing market in Eastern Europe</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header cup">
                <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/cup.png' ?>" alt="">
                <div class="place">4 th</div>
            </div>
            <div class="box-items">
                <div class="vertical"></div>
                <div class="box-item">
                    <div class="vertical"></div>
                    <div class="horizont"></div>
                    <div class="image colliers">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/4-t-colliers.png' ?>" alt="">
                    </div>
                    <div class="description">
                        <h3>Colliers International</h3>
                        <p>In the world by the number of engineers </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header top">
                <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/top-30-icon.png' ?>" alt="">
                <div class="place">Top 30</div>
            </div>
            <div class="box-items">
                <div class="vertical"></div>
                <div class="box-item">
                    <div class="vertical"></div>
                    <div class="horizont"></div>
                    <div class="image gartner">
                        <img src="<?php echo get_template_directory_uri() . '/img/why-ukraine/top-30-gartner.png' ?>" alt="">
                    </div>
                    <div class="description">
                        <h3>Colliers International</h3>
                        <p>In the world by the number of engineers </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>