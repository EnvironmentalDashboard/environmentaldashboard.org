<!doctype html>
<html lang="en">

<head>
    <meta name="description" content="Environmental Dashboard. A technology & approach for organizations and whole communities that combines feedback, through real-time public displays of resource use and environmental conditions, with thoughts and actions of community to engage, motivate, empower & celebrate sustainable thought and action.">
    <?php include 'includes/html-head.php'; ?>
    <script type="module" crossorigin src="https://config.communityhub.cloud/embed-plugins/ecolympic/ecolympic-index.js?v=1.0"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="container resizable-element">
        <div class="ecolymipic-more-info-links">
            <a href="https://oberlin.communityhub.cloud/dh-public/ops-embed" target="_blank" title="View School Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/OPSIcon.svg" alt="View School Data" srcset="">
                    <span>View School Data</span>
                </div>
            </a>
            <a href="https://buildingos.com/s/oberlincity/storyboard31413736/?chapterId=77277" target="_blank" title="View Community Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/CofOberlinIcon.svg" alt="View Community Data" srcset="">
                    <span>View Community Data</span>
                </div>
            </a>
            <a href="https://buildingos.com/reports/dashboards/282f6022666d11e7a61b525400d1fc46" target="_blank" title="View Dorms Data">
                <div class="ecolymipic-link">
                    <img src="../images/ecolympics/OClogo.svg" alt="View Dorms Data" srcset="">
                    <span>View Dorms Data</span>
                </div>
            </a>
        </div>
        <div class="col-md-12 padding-left-0 order-sm-1 order-lg-2 text-center">
            <h1>OBERLIN ECOLYMPICS 2024</h1>
        </div>

        <div class="rank-data row">
            <div class="col-lg-6 col-md-12 padding-rignt-0 order-sm-2 order-lg-1">
                <div class="col-md-12 padding-rignt-0">
                    <div class="slide-show-container">
                        <ecolympic-tabs-plugin />
                    </div>
                    <!-- <iframe class="slide-show-iframe" src="http://oberlin.communityhub.local:9001/calendar/ecolympic" allowtransparency="true" scrolling="no" frameBorder=0 width="100%" height="470px"></iframe> -->
                </div>
                <div class="col-md-12 padding-rignt-0 my-2">
                    <div class="content-status">
                        <div class="d-block">
                            <em class="h6 text-black text-italic">
                                Follow on social media
                            </em>
                        </div>
                        <div class="text-center d-inline-flex justify-content-center align-items-center py-1 px-1 pb-3 social-btn-container">
                            <?php include 'includes/social-media-links.php'; ?>
                        </div>
                        <div class="standings-container">
                            <div class="d-block">
                                <strong class="h4 text-black">
                                    CURRENT STANDINGS
                                </strong>
                            </div>
                            <div class="d-block">
                                <strong class="h6 text-black">
                                    (2024 will be posted when competition begins)
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 padding-left-0 order-sm-1 order-lg-2">
                <div class="col-md-12 padding-left-0 about-ecolympic">
                    <P>
                        <strong><i>What is it?</i></strong> Ecolympics is the Oberlin community’s annual competition to conserve water and electricity use in buildings through behavior change while celebrating the environment. The 2024 community theme is “Later is too late: Efficiency, Electrification and Solarization”. A concurrent campaign will help all Oberlin residents identify smart choice for action.
                    </P>
                    <P>
                        <strong><i>Who is competing?</i></strong> Four concurrent competitions will take place among: Oberlin City Schools; Community Buildings (Oberlin Community Center, Oberlin Fire Station, the School District Office, and Oberlin Public Library); Oberlin College Dorms; and Oberlin College Buildings (Cox, Admissions, and Wilder). Occupants in each building will work to reduce electricity and water use by the largest percentage relative to a baseline period established immediately before the competition. Buildings with the highest percent reduction in each group for each resource win!
                    </P>
                    <P>
                        <strong><i>Standings and Strategy:</i></strong>  During the competition, standings shown below are updated in real-time (scroll down to see College dorms). The three buttons above link to strategy tools for winning! Click to see in-depth graphs of real-time electricity and water use in each participating building. Use what you learn from patterns to brainstorm on how occupants of your building can reduce water and electricity use!
                    </P>
                    <P>
                        <strong><i>Community Goals:</i></strong> While occupants of each building should work to win, a community-wide goal has been set to reduce electricity use by 10,000 kWh and water use by 10,000 gallons during the competition. The entire community wins if we meet or exceed these collective goals!
                    </P>
                </div>
            </div>
        </div>
        <div class="rank-data row mb-5">
            <div class="col-md-6 pr-0">
                <div class="col-md-12 pr-0">
                    <iframe class="first-iframe" src="https://buildingos.com/blocks/3ea7f48b901042068d496250628bfef5/" allowtransparency="true" frameborder="0" height="430"></iframe> <!-- width="520"-->
                </div>
                <div class="col-md-12 pr-0">
                    <iframe class="second-iframe" src="https://buildingos.com/blocks/28fbdab72c6440fba16a3a6c817e8b66/" allowtransparency="true" frameBorder=0 height="430"></iframe> <!-- width="520"-->
                </div>
                <div class="col-md-12 pr-0">
                    <iframe class="third-iframe" src="https://buildingos.com/blocks/d6105e422c9048fc816758193ca84b4f/" allowtransparency="true" frameBorder=0 height="1870"></iframe> <!-- width="1150"-->
                </div>
            </div>
            <div class="col-md-6 pl-0">
                <div class="col-md-12 pl-0">
                    <iframe class="first-iframe" src="https://buildingos.com/blocks/cb4f61797a6f4f8da12f096502552e24/" allowtransparency="true" frameBorder=0 height="430"></iframe>
                </div>
                <div class="col-md-12 pl-0">
                    <iframe class="second-iframe" src="https://buildingos.com/blocks/d2245845d2db4bfba8f97c019e580a73/" allowtransparency="true" frameBorder=0 height="430"></iframe>
                </div>
                <div class="col-md-12 pl-0">
                    <iframe src="https://buildingos.com/blocks/3f15739b3a594a5195b1a755d092a67d/" allowtransparency="true" scrolling="no" frameBorder=0 height="1870"></iframe> <!-- 1630 -->
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
    <?php include 'includes/resize-obersavable.js.php'; ?>
    <script>
        try {
            /* "#environmentaldashboard-ecolympics" */
            elementResizeObserver('body')
        } catch (error) {
            console.log(error);
        }
    </script>
</body>

</html>